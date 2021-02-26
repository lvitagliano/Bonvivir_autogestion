using Bonvivir.Persistance;
using MediatR;
using System;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Subscription
{
    class SubscriptionEditRequestHandler : IRequestHandler<SubscriptionEditRequest, int>
    {
        private readonly BonvivirDbContext Context;

        public SubscriptionEditRequestHandler(BonvivirDbContext context)
        {
            Context = context;
        }

        public async Task<int> Handle(SubscriptionEditRequest request, CancellationToken cancellationToken)
        {
            var result = Context.Subscriptions.Find(request.Id);

            result.UpdatedAt = DateTime.Now;
            result.Retry = request.Retry;
            result.ErrorCode = request.ErrorCode;
            result.ErrorMessage = request.ErrorMessage;

            return await Context.SaveChangesAsync();
        }
    }
}
