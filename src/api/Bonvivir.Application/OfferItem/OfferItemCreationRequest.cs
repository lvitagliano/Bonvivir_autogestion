namespace Bonvivir.Application.OfferItem
{
    using MediatR;

    public class OfferItemCreationRequest : Bonvivir.Domain.Entities.OfferItem, IRequest<OfferItemCreationResponse>
    {
    }
}
