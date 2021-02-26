using Bonvivir.Infrastructure.DTOs;
using MediatR;

namespace Bonvivir.Application.Contact
{
    public class ContactByDniRequest : IRequest<ContactKiwiDTO>
    {
        public string dni { get; }

        public ContactByDniRequest(string paramDni) => dni = paramDni;
    }
}
