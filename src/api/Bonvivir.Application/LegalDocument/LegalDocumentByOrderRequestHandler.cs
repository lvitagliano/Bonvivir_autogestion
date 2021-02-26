using Bonvivir.Domain.Entities;
using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Collections.Generic;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.LegalDocument
{
    public class LegalDocumentByOrderRequestHandler : IRequestHandler<LegalDocumentByOrderRequest, List<LegalDocumentKiwi>>
    {
        private readonly IKiwiClient _kiwiClient;

        public LegalDocumentByOrderRequestHandler(IKiwiClient kiwiClient) => _kiwiClient = kiwiClient;

        public Task<List<LegalDocumentKiwi>> Handle(LegalDocumentByOrderRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.GetLegalDocumentByOrderId(request.OrderId);
        }
    }
}
