using Bonvivir.Infrastructure.Contracts;
using Bonvivir.Infrastructure.DTOs;
using Bonvivir.Persistance;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionByIdRequestHandler : IRequestHandler<SubscriptionByIdRequest, GetSubscriptionKiwiDTO>
    {
        private readonly IKiwiClient _kiwiClient;

        public SubscriptionByIdRequestHandler(IKiwiClient kiwiClient, BonvivirDbContext context)
        {
            _kiwiClient = kiwiClient;
        }

        public async Task<GetSubscriptionKiwiDTO> Handle(SubscriptionByIdRequest request, CancellationToken cancellationToken)
        {
            return await _kiwiClient.GetSubscriptionsById(request.Id);
        }
    }
}
