using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.ReferFriend
{
    public class ReferFriendSaveRequest : Referrer, IRequest<string> { }
}
