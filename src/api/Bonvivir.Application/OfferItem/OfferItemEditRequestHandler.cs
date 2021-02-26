namespace Bonvivir.Application.OfferItem
{
    using System.Linq;
    using System.Threading.Tasks;
    using System.Threading;
    using System;
    using Bonvivir.Persistance;
    using MediatR;
    using Microsoft.EntityFrameworkCore;

    class OfferItemEditRequestHandler : IRequestHandler<OfferItemEditRequest, OfferItemEditResponse>
    {
        private readonly BonvivirDbContext _context;

        public OfferItemEditRequestHandler(BonvivirDbContext context)
        {
            _context = context;
        }

        public async Task<OfferItemEditResponse> Handle(OfferItemEditRequest request, CancellationToken cancellationToken)
        {
            var result = _context.OfferItems.Find(request.Id);

            result.Selection = request.Selection;
            result.Title = request.Title;
            result.Description = request.Description;

            if (request.DesktopImage != null)
            {
                result.DesktopImage = request.DesktopImage;
            }

            if (request.MobileImage != null)
            {
                result.MobileImage = request.MobileImage;
            }

            result.BasePriceId = request.BasePriceId;
            result.BasePrice = request.BasePrice;
            result.ClubLaNacionId = request.ClubLaNacionId;
            result.ClubLaNacionPrice = request.ClubLaNacionPrice;
            result.TierraDelFuegoId = request.TierraDelFuegoId;
            result.TierraDelFuegoPrice = request.TierraDelFuegoPrice;
            result.SchemaId = request.SchemaId;

            try
            {
                var affectedRows = await _context.SaveChangesAsync(cancellationToken);

                if (affectedRows <= 0)
                {
                    return new OfferItemEditResponse { Success = true, EditedItemId = request.Id, Message = "Ningun item afectado" };
                }
                else
                {
                    return new OfferItemEditResponse { Success = true, EditedItemId = request.Id };
                }
            }
            catch (Exception error)
            {
                return new OfferItemEditResponse { Success = false, EditedItemId = request.Id, Message = error.Message };
            }

        }
    }
}