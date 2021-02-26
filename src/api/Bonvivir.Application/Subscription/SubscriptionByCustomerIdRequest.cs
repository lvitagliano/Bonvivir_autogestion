using Bonvivir.Infrastructure.DTOs;
using MediatR;
using System.Collections.Generic;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionByCustomerIdRequest : IRequest<List<SubscriptionKiwiDTO>>
    {
        public string Id { get; set; }

        public SubscriptionByCustomerIdRequest(string id) => Id = id;
    }
}
