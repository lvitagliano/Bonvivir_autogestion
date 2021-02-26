using MediatR;
using System;

namespace Bonvivir.Application.OfferItem
{
    public class OfferItemsBySchemaIdRequest : IRequest<Domain.Entities.OfferItem>
    {
        public Guid Id { get; }

        public OfferItemsBySchemaIdRequest(Guid id) => Id = id;
    }
}