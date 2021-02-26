using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Leads
{
    public class LeadCreationHandler : IRequestHandler<LeadCreationRequest, string>
    {
        private readonly IKiwiClient _kiwiClient;

        public LeadCreationHandler(IKiwiClient kiwiClient) => _kiwiClient = kiwiClient;

        public Task<string> Handle(LeadCreationRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.SaveLeadAsync(request);
        }
    }
}
