using MediatR;
using System.Collections.Generic;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionAgByCustomerIdRequest : IRequest<List<Domain.Entities.Subscription>>
    {
        public string Id { get; set; }

        public SubscriptionAgByCustomerIdRequest(string id) => Id = id;
    }
}
