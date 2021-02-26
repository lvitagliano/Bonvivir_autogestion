using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Contact
{
    public class ContactCreationRequestHandler : IRequestHandler<ContactCreationRequest, string>
    {
        private readonly IKiwiClient _kiwiClient;

        public ContactCreationRequestHandler(IKiwiClient kiwiClient)
        {
            _kiwiClient = kiwiClient;
        }

        public Task<string> Handle(ContactCreationRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.SaveContactAsync(request);
        }
    }
}
