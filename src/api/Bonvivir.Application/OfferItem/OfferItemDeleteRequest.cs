namespace Bonvivir.Application.OfferItem
{
    using MediatR;

    public class OfferItemDeleteRequest : Bonvivir.Domain.Entities.OfferItem, IRequest<OfferItemDeleteResponse>
    {
    }
}
