using Bonvivir.Persistance;
using MediatR;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.OfferItem
{
    public class OfferItemsBySchemaIdRequestHandler : IRequestHandler<OfferItemsBySchemaIdRequest, Domain.Entities.OfferItem>
    {
        private readonly BonvivirDbContext _context;

        public OfferItemsBySchemaIdRequestHandler(BonvivirDbContext context) => _context = context;

        public Task<Domain.Entities.OfferItem> Handle(OfferItemsBySchemaIdRequest request, CancellationToken cancellationToken)
        {
            return Task.FromResult(_context.OfferItems.Where(x => x.SchemaId == request.Id).FirstOrDefault());
        }
    }
}

