using Bonvivir.Domain.Entities;
using Bonvivir.Infrastructure.Contracts;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Invoice
{
    public class InvoiceRequestHandler : IRequestHandler<InvoiceRequest, InvoiceKiwi>
    {
        private readonly IKiwiClient _kiwiClient;

        public InvoiceRequestHandler(IKiwiClient kiwiClient) => _kiwiClient = kiwiClient;

        public Task<InvoiceKiwi> Handle(InvoiceRequest request, CancellationToken cancellationToken)
        {
            return _kiwiClient.GetInvoiceByYearAndId(request.Year, request.Id);
        }
    }
}
