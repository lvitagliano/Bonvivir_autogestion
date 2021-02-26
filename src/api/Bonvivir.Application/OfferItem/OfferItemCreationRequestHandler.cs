namespace Bonvivir.Application.OfferItem
{
    using Bonvivir.Persistance;
    using MediatR;
    using Microsoft.EntityFrameworkCore;
    using System;
    using System.Linq;
    using System.Threading;
    using System.Threading.Tasks;

    class OfferItemCreationRequestHandler : IRequestHandler<OfferItemCreationRequest, OfferItemCreationResponse>
    {
        private readonly BonvivirDbContext _context;

        public OfferItemCreationRequestHandler(BonvivirDbContext context)
        {
            _context = context;
        }

        public async Task<OfferItemCreationResponse> Handle(OfferItemCreationRequest request, CancellationToken cancellationToken)
        {
            var offer = await _context.Offers.Include(o => o.Items).FirstOrDefaultAsync(o => o.Id == request.OfferId);

            if (offer.Items.Any(oi => oi.Selection == request.Selection))
            {
                return new OfferItemCreationResponse { Success = false, Message = "Esta oferta ya posee un ítem para la 'Selección' indicada." };
            }

            offer.Items.Add(request);

            await _context.SaveChangesAsync(cancellationToken);

            return new OfferItemCreationResponse { Success = true, CreatedItemId = request.Id };
        }
    }
}