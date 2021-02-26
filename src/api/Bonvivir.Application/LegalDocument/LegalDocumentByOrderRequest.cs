using Bonvivir.Domain.Entities;
using MediatR;
using System;
using System.Collections.Generic;

namespace Bonvivir.Application.LegalDocument
{
    public class LegalDocumentByOrderRequest : IRequest<List<LegalDocumentKiwi>>
    {
        public string OrderId { get; set; }

        public LegalDocumentByOrderRequest(string orderId) => OrderId = orderId;
    }
}
