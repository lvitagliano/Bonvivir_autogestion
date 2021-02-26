using MediatR;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionRequest : Domain.Entities.Subscription, IRequest<string> { }
}
