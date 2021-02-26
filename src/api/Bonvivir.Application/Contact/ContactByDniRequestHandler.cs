using Bonvivir.Infrastructure.Contracts;
using Bonvivir.Infrastructure.DTOs;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Contact
{
    public class ContactByDniRequestHandler : IRequestHandler<ContactByDniRequest, ContactKiwiDTO>
    {
        private readonly IKiwiClient _kiwiClient;

        public ContactByDniRequestHandler(IKiwiClient kiwiClient) => _kiwiClient = kiwiClient;

        public async Task<ContactKiwiDTO> Handle(ContactByDniRequest request, CancellationToken cancellationToken)
        {
            return await _kiwiClient.GetContactByDniAsync(request.dni);
        }
    }
}
