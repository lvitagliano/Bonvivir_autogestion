using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Contact
{
    public class CustomerByDniRequest : IRequest<Customer>
    {
        public string dni { get; }

        public CustomerByDniRequest(string paramDni) => dni = paramDni;
    }
}