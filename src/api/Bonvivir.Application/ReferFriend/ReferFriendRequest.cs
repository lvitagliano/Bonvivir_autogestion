using Bonvivir.Infrastructure.DTOs;
using MediatR;

namespace Bonvivir.Application.ReferFriend
{
    public class ReferFriendRequest : ReferFriendKiwiDTO, IRequest<string> { }
}
