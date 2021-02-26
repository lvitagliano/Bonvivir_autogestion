using System;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;
using Bonvivir.Persistance;
using MediatR;

namespace Bonvivir.Application.Offers
{
    public class OfferEditRequestHandler : IRequestHandler<OfferEditRequest, int>
    {
        private readonly BonvivirDbContext _context;

        public OfferEditRequestHandler(BonvivirDbContext context)
        {
            _context = context;
        }

        // Returns the id of the created Offer or -1 in case of error
        public async Task<int> Handle(OfferEditRequest request, CancellationToken cancellationToken)
        {
            var result = _context.Offers.Find(request.Id);
            
            result.ModifiedDate = DateTime.Now;
            result.Title = request.Title;
            result.Description = request.Description;

            return await _context.SaveChangesAsync();
        }

        private bool ExistOrganicOffer()
        {
            return _context.Offers.Any(o => o.IsOrganic);
        }
    }
}
