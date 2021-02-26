using Bonvivir.Domain.Entities;
using MediatR;
using System.Collections.Generic;

namespace Bonvivir.Application.Order
{
    public class OrdersBySubscriptionIdRequest : IRequest<List<OrderKiwi>>
    {
        public string Id { get; set; }
        
        public OrdersBySubscriptionIdRequest(string id) => this.Id = id;
    }
}
