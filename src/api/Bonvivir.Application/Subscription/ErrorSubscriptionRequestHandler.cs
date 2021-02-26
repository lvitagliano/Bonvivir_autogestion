using Bonvivir.Infrastructure.Exceptions;
using Bonvivir.Persistance;
using MediatR;
using Microsoft.EntityFrameworkCore;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.ErrorSubscription
{
    public class ErrorSubscriptionRequestHandler : IRequestHandler<ErrorSubscriptionRequest, ErrorSubscriptionResponse>
    {
        private readonly BonvivirDbContext _context;

        public ErrorSubscriptionRequestHandler(BonvivirDbContext context)
        {
            _context = context;
        }

        public async Task<ErrorSubscriptionResponse> Handle(ErrorSubscriptionRequest request, CancellationToken cancellationToken)
        {
            if (request.Page != null && request.Page < 1)
                throw new ErrorSubscriptionPageIsLowerThan0Exception("Page number must be greater than 0");

            IQueryable<Bonvivir.Domain.Entities.Subscription> query = _context.Subscriptions;

            if (request.ErrorCode != null && request.ErrorCode != string.Empty)
                query = query.Where(d => d.ErrorCode != null && d.ErrorCode.Contains(request.ErrorCode)).OrderBy(x => x.Id);

            if (request.Retry.HasValue)
                query = query.Where(x => x.Retry == request.Retry);

            var filteredItems = query
                .Include(d => d.Customer)
                .Include(d => d.Address)
                .AsQueryable();

            return await Task.FromResult(new ErrorSubscriptionResponse
            {
                Subscriptions = filteredItems.ToList(),
                TotalItems = filteredItems.Count()
            });
        }
    }
}
