using Bonvivir.Infrastructure.Contracts;
using Bonvivir.Infrastructure.DTOs;
using Bonvivir.Persistance;
using MediatR;
using System.Collections.Generic;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionByCustomerIdRequestHandler : IRequestHandler<SubscriptionByCustomerIdRequest, List<SubscriptionKiwiDTO>>
    {
        private readonly IKiwiClient _kiwiClient;

        private readonly BonvivirDbContext _context;

        public SubscriptionByCustomerIdRequestHandler(IKiwiClient kiwiClient, BonvivirDbContext context)
        {
            _kiwiClient = kiwiClient;
            _context = context;
        }

        public async Task<List<SubscriptionKiwiDTO>> Handle(SubscriptionByCustomerIdRequest request, CancellationToken cancellationToken)
        {
            var subscriptions = await _kiwiClient.GetSubscriptionsByCustomerId(request.Id);

            foreach (var item in subscriptions)
            {
                var offerItem = _context.OfferItems.Where(x => x.SchemaId == item.SchemaId).FirstOrDefault();
                item.OfferItem = offerItem;
            }

            return subscriptions;
        }
    }
}
