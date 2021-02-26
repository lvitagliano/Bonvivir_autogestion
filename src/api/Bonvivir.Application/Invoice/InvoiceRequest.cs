using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Invoice
{
    public class InvoiceRequest : IRequest<InvoiceKiwi>
    {
        public string Year { get; set; }
        public string Id { get; set; }

        public InvoiceRequest(string year, string id)
        {
            Year = year;
            Id = id;
        }
    }
}
