using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Leads
{
    public class LeadSaveRequest : Lead, IRequest<int> { }
}
