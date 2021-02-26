using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Authentication
{
    public class LoginRequest : User, IRequest<User>
    {
    }
}
