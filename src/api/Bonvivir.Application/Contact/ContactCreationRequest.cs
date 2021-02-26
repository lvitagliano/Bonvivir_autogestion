using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Contact
{
    public class ContactCreationRequest : ContactKiwi, IRequest<string> { }
}
