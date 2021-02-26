namespace Bonvivir.WebApi.Services
{
    using Bonvivir.Application.ErrorSubscription;
    using Bonvivir.Application.Subscription;
    using Bonvivir.Infrastructure.Contracts;
    using Bonvivir.Infrastructure.Exceptions;
    using MediatR;
    using Microsoft.Extensions.DependencyInjection;
    using Microsoft.Extensions.Logging;
    using System;
    using System.Collections.Generic;
    using System.Linq;
    using System.Threading;
    using System.Threading.Tasks;

    public class RetrySubscriptionCronJob : CronJobService
    {
        private readonly ILogger<RetrySubscriptionCronJob> _logger;

        private readonly IServiceProvider _serviceProvider;

        private readonly IKiwiClient _kiwiClient;

        public RetrySubscriptionCronJob(IScheduleConfig<RetrySubscriptionCronJob> config, ILogger<RetrySubscriptionCronJob> logger, IServiceProvider serviceProvider, IKiwiClient kiwiClient)
            : base(config.CronExpression, config.TimeZoneInfo)
        {
            _logger = logger;
            _serviceProvider = serviceProvider;
            _kiwiClient = kiwiClient;
        }

        public override Task StartAsync(CancellationToken cancellationToken)
        {
            _logger.LogDebug("RetrySubscriptionCronJob starts.");

            return base.StartAsync(cancellationToken);
        }

        public override Task DoWork(CancellationToken cancellationToken)
        {
            _logger.LogDebug($"{DateTime.Now:hh:mm:ss} RetrySubscriptionCronJob is working.");

            _logger.LogInformation("Creating scope and getting Service IMediator");

            using IServiceScope scope = _serviceProvider.CreateScope();

            IMediator svc = scope.ServiceProvider.GetRequiredService<IMediator>();

            ErrorSubscriptionRequest request = new ErrorSubscriptionRequest() { ErrorCode = "500", Retry = false };

            _logger.LogInformation("RetrySubscriptionCronJob getting Subscriptions to process: ErrorCode = {0} - Retry = {1}", request.ErrorCode, request.Retry);

            Application.ErrorSubscriptionResponse subscriptionsError = svc.Send(request).Result;

            _logger.LogInformation("RetrySubscriptionCronJob Subscriptions to process: {0}", subscriptionsError.Subscriptions.Count);

            List<KeyValuePair<int, string>> subscriptions = subscriptionsError?.Subscriptions?.ToDictionary(x => x.Id, x => x.JsonRequest).ToList();

            foreach (KeyValuePair<int, string> item in subscriptions)
            {
                try
                {
                    Task<string> task = Task.Run(async () => await _kiwiClient.SendSubscriptionAsync(item.Value));

                    _logger.LogInformation("Subcription GUID KIWI: ", task.Result);

                    request.ErrorCode = request.ErrorMessage = null;
                }
                catch (AggregateException ex)
                {
                    KiwiApiException exc = (KiwiApiException)ex.Flatten().InnerException;

                    _logger.LogError("An error occurred sending the subscription to KIWI - Status Code {0}", exc.StatusCode, exc.Message, exc.ValidationText);

                    request.ErrorCode = exc.StatusCode.ToString();

                    request.ErrorMessage = exc.StatusCode != 500 ? exc.ValidationText : null;
                }
                finally
                {
                    _logger.LogInformation("RetrySubscriptionCronJob updating Subscription Id = {0} ErrorCode = {1} - ErrorMessage = {2} Retry = {3}", item.Key, request.ErrorCode, request.ErrorMessage, request.Retry);

                    int result = svc.Send(new SubscriptionEditRequest() { Id = item.Key, Retry = true, ErrorCode = request.ErrorCode, ErrorMessage = request.ErrorMessage }).Result;

                    _logger.LogInformation(result < 0 ? "Error updating the subscription" : "Subscription updated successfully");
                }
            }

            _logger.LogInformation($"{DateTime.Now:hh:mm:ss} RetrySubscriptionCronJob work finished.");

            return Task.CompletedTask;
        }

        public override Task StopAsync(CancellationToken cancellationToken)
        {
            _logger.LogDebug("RetrySubscriptionCronJob is stopping.");

            return base.StopAsync(cancellationToken);
        }
    }
}
