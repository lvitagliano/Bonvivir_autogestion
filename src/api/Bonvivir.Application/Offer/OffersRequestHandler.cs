namespace Bonvivir.Application.Offers
{
    using Bonvivir.Persistance;
    using Bonvivir.Domain.Entities;
    using Microsoft.EntityFrameworkCore;
    using MediatR;
    using System.Collections.Generic;
    using System.Linq;
    using System.Threading.Tasks;
    using System.Threading;

    public class OffersRequestHandler : IRequestHandler<OffersRequest, List<Offer>>
    {
        private readonly BonvivirDbContext _context;

        public OffersRequestHandler(BonvivirDbContext context)
        {
            _context = context;
        }

        public async Task<List<Offer>> Handle(OffersRequest request, CancellationToken cancellationToken)
        {
            var offers = _context.Offers.Include(o => o.Items).OrderByDescending(o => o.CreatedDate);

            return await offers.ToListAsync(cancellationToken);
        }
    }
}