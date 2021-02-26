using System.Linq;
using System.Threading;
using System.Threading.Tasks;
using Bonvivir.Persistance;
using MediatR;

namespace Bonvivir.Application.Offers
{
    public class OfferDeleteRequestHandler : IRequestHandler<OfferDeleteRequest, int>
    {
        private readonly BonvivirDbContext _context;

        public OfferDeleteRequestHandler(BonvivirDbContext context)
        {
            _context = context;
        }

        // Returns the id of the created Offer or -1 in case of error
        public async Task<int> Handle(OfferDeleteRequest request, CancellationToken cancellationToken)
        {
            var currentOffer = await _context.Offers.FindAsync(request.Id);
            
            _context.Offers.Remove(currentOffer);

            return await _context.SaveChangesAsync();
        }

        private bool ExistOrganicOffer()
        {
            return _context.Offers.Any(o => o.IsOrganic);
        }
    }
}
