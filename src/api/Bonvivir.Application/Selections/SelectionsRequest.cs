using System;
using System.Text;
using System.Collections.Generic;
using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Selections
{
    public class SelectionsRequest : IRequest<List<Selection>>
    {
    }
}
