using System.Threading;
using System.Threading.Tasks;
using Bonvivir.Infrastructure.Contracts;
using MediatR;

namespace Bonvivir.Application.ClnCard
{
    public class ClnCardRequestValidationHandler : IRequestHandler<ClnCardValidationRequest, bool>
    {
        private readonly IKiwiClient _kiwiClient;

        public ClnCardRequestValidationHandler(IKiwiClient kiwiClient)
        {
            _kiwiClient = kiwiClient;
        }

        public Task<bool> Handle(ClnCardValidationRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.ValidateCLNCardNumber(request.CardNumber);

        }
    }
}
