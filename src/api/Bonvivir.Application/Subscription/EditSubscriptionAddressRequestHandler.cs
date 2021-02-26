using Bonvivir.Domain.Common;
using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Subscription
{
    public class EditSubscriptionAddressRequestHandler : IRequestHandler<EditSubscriptionAddressRequest, HandleResponse>
    {
        private readonly IKiwiClient _kiwiClient;

        public EditSubscriptionAddressRequestHandler(IKiwiClient kiwiClient) => _kiwiClient = kiwiClient;

        public Task<HandleResponse> Handle(EditSubscriptionAddressRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.EditAddressAsync(request);
        }
    }
}
