using MediatR;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionEditRequest : Domain.Entities.Subscription, IRequest<int>
    {
    }
}
