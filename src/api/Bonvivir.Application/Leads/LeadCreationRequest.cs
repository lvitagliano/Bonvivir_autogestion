using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Leads
{
    public class LeadCreationRequest : LeadKiwi, IRequest<string> { }
}
