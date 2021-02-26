using System.Threading;
using System.Threading.Tasks;
using Bonvivir.Infrastructure.Contracts;
using MediatR;

namespace Bonvivir.Application.Helpers
{
    public class EmailRequestHandler : IRequestHandler<EmailRequest>
    {
        private readonly IEmailClient _emailClient;

        public EmailRequestHandler(IEmailClient emailClient) => _emailClient = emailClient;

        public async Task<Unit> Handle(EmailRequest request, CancellationToken cancellationToken)
        {
            await _emailClient.SendSubscriptionEmailAsync(request);
            return Unit.Value;
        }
    }
}