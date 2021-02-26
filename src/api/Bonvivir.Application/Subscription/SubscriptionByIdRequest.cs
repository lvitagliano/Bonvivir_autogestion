using Bonvivir.Infrastructure.DTOs;
using MediatR;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionByIdRequest : IRequest<GetSubscriptionKiwiDTO>
    {
        public string Id { get; set; }

        public SubscriptionByIdRequest(string id) => Id = id;
    }
}
