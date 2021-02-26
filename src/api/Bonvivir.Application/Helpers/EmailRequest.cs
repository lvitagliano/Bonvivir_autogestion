using MediatR;

namespace Bonvivir.Application.Helpers
{
    public class EmailRequest : EmailDTO, IRequest<Unit> { }
}
