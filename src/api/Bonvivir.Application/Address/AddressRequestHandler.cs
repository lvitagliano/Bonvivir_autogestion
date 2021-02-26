namespace Bonvivir.Application.Address
{
    using System.Collections.Generic;
    using System.Threading;
    using System.Threading.Tasks;
    using Bonvivir.Domain.Entities;
    using Bonvivir.Infrastructure.Contracts;
    using MediatR;

    public class AddressRequestHandler : IRequestHandler<AddressRequest, Address>
    {
        private readonly IKiwiClient _kiwiClient;

        public AddressRequestHandler(IKiwiClient kiwiClient)
        {
            _kiwiClient = kiwiClient;
        }

        public async Task<Address> Handle(AddressRequest request, CancellationToken cancellationToken)
        {
            return await _kiwiClient.StandardizeAdrress(new Address { Street = request.Street, DoorNumber = request.DoorNumber, ZipCode = request.ZipCode });
        }
    }
}
