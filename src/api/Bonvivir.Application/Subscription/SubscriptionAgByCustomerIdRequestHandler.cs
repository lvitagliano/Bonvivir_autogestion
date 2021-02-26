using Bonvivir.Persistance;
using MediatR;
using System.Collections.Generic;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;
using Microsoft.EntityFrameworkCore;

namespace Bonvivir.Application.Subscription
{
    class SubscriptionAgByCustomerIdRequestHandler : IRequestHandler<SubscriptionAgByCustomerIdRequest, List<Domain.Entities.Subscription>>
    {
        private readonly BonvivirDbContext _context;

        public SubscriptionAgByCustomerIdRequestHandler(BonvivirDbContext context) => _context = context;

        public Task<List<Domain.Entities.Subscription>> Handle(SubscriptionAgByCustomerIdRequest request, CancellationToken cancellationToken)
        {
            return Task.FromResult(_context.Subscriptions.Include(s => s.Address).Where(s => s.Customer.IdNumber == request.Id).ToList());
        }
    }
}
