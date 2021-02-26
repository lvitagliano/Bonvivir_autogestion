using Bonvivir.Domain.Common;
using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Subscription
{
    public class EditSubscriptionSuspendRequestHandler : IRequestHandler<EditSubscriptionSuspendRequest, HandleResponse>
    {
        private readonly IKiwiClient _kiwiClient;

        public EditSubscriptionSuspendRequestHandler(IKiwiClient kiwiClient) => _kiwiClient = kiwiClient;

        public Task<HandleResponse> Handle(EditSubscriptionSuspendRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.SubscriptionSuspendAsync(request);
        }
    }
}
