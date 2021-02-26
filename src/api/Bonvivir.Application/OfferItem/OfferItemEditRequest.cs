namespace Bonvivir.Application.OfferItem
{
    using MediatR;

    public class OfferItemEditRequest : Bonvivir.Domain.Entities.OfferItem, IRequest<OfferItemEditResponse>
    {
    }
}
