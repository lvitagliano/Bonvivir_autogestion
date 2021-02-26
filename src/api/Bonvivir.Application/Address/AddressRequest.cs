using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Address
{
    public class AddressRequest : Bonvivir.Domain.Entities.Address, IRequest<Bonvivir.Domain.Entities.Address>
    {
    }
}
