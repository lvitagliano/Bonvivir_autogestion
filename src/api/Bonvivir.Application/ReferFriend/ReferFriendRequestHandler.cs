using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.ReferFriend
{
    public class ReferFriendRequestHandler : IRequestHandler<ReferFriendRequest, string>
    {
        private readonly IKiwiClient _kiwiClient;

        public ReferFriendRequestHandler(IKiwiClient kiwiClient)
        {
            _kiwiClient = kiwiClient;
        }

        public Task<string> Handle(ReferFriendRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.ReferenceAsync(request);
        }
    }
}
