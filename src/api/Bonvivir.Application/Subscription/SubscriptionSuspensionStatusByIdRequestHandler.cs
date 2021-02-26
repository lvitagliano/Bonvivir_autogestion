using Bonvivir.Domain.Common;
using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionSuspensionStatusByIdRequestHandler : IRequestHandler<SubscriptionSuspensionStatusByIdRequest, HandleResponse>
    {
        private readonly IKiwiClient _kiwiClient;

        public SubscriptionSuspensionStatusByIdRequestHandler(IKiwiClient kiwiClient)
        {
            _kiwiClient = kiwiClient;
        }

        public Task<HandleResponse> Handle(SubscriptionSuspensionStatusByIdRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.GetSuspensionStatusByIdAsync(request.Id);
        }
    }
}
