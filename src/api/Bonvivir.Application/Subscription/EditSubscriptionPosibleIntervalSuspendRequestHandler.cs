using Bonvivir.Domain.Common;
using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Subscription
{
    public class EditSubscriptionPosibleIntervalSuspendRequestHandler : IRequestHandler<EditSubscriptionPosibleIntervalSuspendRequest, HandleResponse>
    {
        private readonly IKiwiClient _kiwiClient;

        public EditSubscriptionPosibleIntervalSuspendRequestHandler(IKiwiClient kiwiClient) => _kiwiClient = kiwiClient;

        public Task<HandleResponse> Handle(EditSubscriptionPosibleIntervalSuspendRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.GetPosibleIntervalSuspendAsync(request);
        }
    }
}
