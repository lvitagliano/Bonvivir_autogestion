using Bonvivir.Domain.Entities;
using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Collections.Generic;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Order
{
    public class OrdersBySubscriptionIdRequestHandler : IRequestHandler<OrdersBySubscriptionIdRequest, List<OrderKiwi>>
    {
        private readonly IKiwiClient _kiwiClient;

        public OrdersBySubscriptionIdRequestHandler(IKiwiClient kiwiClient) => _kiwiClient = kiwiClient;

        public Task<List<OrderKiwi>> Handle(OrdersBySubscriptionIdRequest request, CancellationToken cancellationToken) => _kiwiClient.GetOrdersBySubscriptionId(request.Id);
    }
}
