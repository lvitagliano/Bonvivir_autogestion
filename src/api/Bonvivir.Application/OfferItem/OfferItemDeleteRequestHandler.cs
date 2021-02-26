namespace Bonvivir.Application.OfferItem
{
    using Bonvivir.Persistance;
    using MediatR;
    using Microsoft.EntityFrameworkCore;
    using System;
    using System.Linq;
    using System.Threading;
    using System.Threading.Tasks;

    class OfferItemDeleteRequestHandler : IRequestHandler<OfferItemDeleteRequest, OfferItemDeleteResponse>
    {
        private readonly BonvivirDbContext _context;

        public OfferItemDeleteRequestHandler(BonvivirDbContext context)
        {
            _context = context;
        }

        public async Task<OfferItemDeleteResponse> Handle(OfferItemDeleteRequest request, CancellationToken cancellationToken)
        {
            var currentOfferItem = await _context.OfferItems.FindAsync(request.Id);
            
            _context.OfferItems.Remove(currentOfferItem);

            await _context.SaveChangesAsync(cancellationToken);

            return new OfferItemDeleteResponse { Success = true };
        }
    }
}