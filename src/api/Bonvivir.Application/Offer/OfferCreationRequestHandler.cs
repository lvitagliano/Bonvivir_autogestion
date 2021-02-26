using System.Linq;
using System.Threading;
using System.Threading.Tasks;
using Bonvivir.Domain.Entities;
using Bonvivir.Persistance;
using MediatR;

namespace Bonvivir.Application.Offers
{
    public class OfferCreationRequestHandler : IRequestHandler<OfferCreationRequest, int>
    {
        private readonly BonvivirDbContext _context;

        public OfferCreationRequestHandler(BonvivirDbContext context)
        {
            _context = context;
        }

        // Returns the id of the created Offer or -1 in case of error
        public async Task<int> Handle(OfferCreationRequest request, CancellationToken cancellationToken)
        {
            int id = -1;

            bool organicExist = false;

            if (request.IsOrganic)
            {
                organicExist = _context.Offers.Any(o => ExistOrganicOffer(o));
            }

            if (!organicExist)
            {
                _context.Offers.Add(request);
            }

            await _context.SaveChangesAsync();

            id = request.Id;

            return id;
        }

        private bool ExistOrganicOffer(Offer o)
        {
            return o.IsOrganic;
        }
    }
}
