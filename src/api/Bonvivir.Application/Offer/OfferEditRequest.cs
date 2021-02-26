using MediatR;

namespace Bonvivir.Application.Offers
{
    public class OfferEditRequest : Bonvivir.Domain.Entities.Offer, IRequest<int>
    {
    }
}
