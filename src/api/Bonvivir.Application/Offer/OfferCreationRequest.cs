using MediatR;

namespace Bonvivir.Application.Offers
{
    public class OfferCreationRequest : Bonvivir.Domain.Entities.Offer, IRequest<int>
    {
    }
}
