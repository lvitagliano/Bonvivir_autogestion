using Bonvivir.Domain.Entities;
using Bonvivir.Infrastructure.Contracts;
using Bonvivir.Infrastructure.Exceptions;
using Bonvivir.Persistance;
using MediatR;
using Microsoft.Extensions.Logging;
using Newtonsoft.Json;
using Newtonsoft.Json.Linq;
using System;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionRequestHandler : IRequestHandler<SubscriptionRequest, string>
    {
        private readonly BonvivirDbContext _context;

        private readonly IKiwiClient _kiwiClient;

        private readonly IEncryptClient _encryptClient;

        private readonly IEmailClient _emailClient;

        private readonly ILogger<SubscriptionRequestHandler> _logger;

        private const string CUIT = "C.U.I.T.";

        public SubscriptionRequestHandler(
            BonvivirDbContext context,
            IKiwiClient kiwiClient,
            IEncryptClient encryptClient,
            IEmailClient emailClient,
            ILogger<SubscriptionRequestHandler> logger)
        {
            _context = context;
            _kiwiClient = kiwiClient;
            _encryptClient = encryptClient;
            _emailClient = emailClient;
            _logger = logger;
        }

        public async Task<string> Handle(SubscriptionRequest request, CancellationToken cancellationToken)
        {
            _logger.LogInformation("SubscriptionRequestHandler - Execute Handle");
            var email = new EmailDTO();
            var res = string.Empty;
            var lastDigitsCreditCard = request.CreditCard.Substring(request.CreditCard.Length - 4);

            try
            {
                _logger.LogInformation("SubscriptionRequestHandler - Encrypting credit card");
                request.CreditCard = await _encryptClient.Encrypt(request.CreditCard);
                request.CreditCardInfo.IdNumber = request.CreditCard;
            }
            catch (Exception e)
            {
                _logger.LogError("SubscriptionRequestHandler - Error: ", e);
                request.ErrorMessage = e.Message;

                return res;
            }

            SubscriptionForKiwi subscriptionForKiwi = new SubscriptionForKiwi(request);

            if (subscriptionForKiwi.Customer.IdType == CUIT)
                subscriptionForKiwi.Customer.IdNumber = subscriptionForKiwi.Customer.IdNumber.Replace("-", string.Empty);

            var genderCapitalized = subscriptionForKiwi.Customer.Gender.ToLowerInvariant();
            genderCapitalized = genderCapitalized.First().ToString().ToUpper() + genderCapitalized.Substring(1);
            subscriptionForKiwi.Customer.Gender = genderCapitalized;

            request.JsonRequest = JsonConvert.SerializeObject(subscriptionForKiwi);

            try
            {
                _logger.LogCritical("SubscriptionRequestHandler - Send Subscription Kiwi - ", request.JsonRequest);
                res = await _kiwiClient.SendSubscriptionAsync(subscriptionForKiwi);
                _logger.LogCritical("SubscriptionRequestHandler - SSendSubscriptionAsync Result: ", res);

                email.Subscription = subscriptionForKiwi;
                email.Subscription.CreditCard.IdNumber = $"XXXX XXXX XXXX {lastDigitsCreditCard}";
            }
            catch (KiwiApiException e)
            {
                _logger.LogError("SubscriptionRequestHandler - Error:", e);
                res = e.Message;

                var json = JObject.Parse(e.ValidationText);

                request.ErrorCode = json["code"].Value<int>().ToString();

                if (request.ErrorCode != "500")
                {
                    request.ErrorMessage = e.ValidationText;
                }
            }
            finally
            {

                _context.Subscriptions.Add(request);

                _logger.LogInformation("SubscriptionRequestHandler - Saving Changes DB");
                await _context.SaveChangesAsync();

                _logger.LogInformation("SubscriptionRequestHandler - Sending Email");
                await _emailClient.SendSubscriptionEmailAsync(email);
            }

            _logger.LogInformation("SubscriptionRequestHandler - Result: ", res);
            return res;
        }
    }
}
