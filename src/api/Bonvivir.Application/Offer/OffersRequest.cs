using System;
using System.Collections.Generic;
using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Offers
{
    public class OffersRequest : IRequest<List<Domain.Entities.Offer>>
    {
    }
}
