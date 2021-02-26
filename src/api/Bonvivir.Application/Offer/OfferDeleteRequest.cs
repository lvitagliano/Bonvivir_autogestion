using MediatR;

namespace Bonvivir.Application.Offers
{
    public class OfferDeleteRequest : Bonvivir.Domain.Entities.Offer, IRequest<int>
    {
    }
}
