using Bonvivir.Domain.Common;
using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Subscription
{
    public class EditSubscriptionCreditCardRequestHandler : IRequestHandler<EditSubscriptionCreditCardRequest, HandleResponse>
    {
        private readonly IKiwiClient _kiwiClient;
        private readonly IEncryptClient _encryptClient;
        public EditSubscriptionCreditCardRequestHandler(IKiwiClient kiwiClient, IEncryptClient encryptClient)
        { 
            _kiwiClient = kiwiClient;
            _encryptClient = encryptClient;
        }

        public async Task<HandleResponse> Handle(EditSubscriptionCreditCardRequest request, CancellationToken cancellationToken)
        {
            try
            {
                request.CreditCard.IdNumber = await _encryptClient.Encrypt(request.CreditCard.IdNumber);
            }
            catch (Exception e)
            {
                throw e;
            }

            return await _kiwiClient.EditCardAsync(request);
        }
    }
}
