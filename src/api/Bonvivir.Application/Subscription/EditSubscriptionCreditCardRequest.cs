using Bonvivir.Domain.Common;
using Bonvivir.Infrastructure.DTOs;
using MediatR;

namespace Bonvivir.Application.Subscription
{
    public class EditSubscriptionCreditCardRequest : EditSubscriptionCreditCardKiwiDTO, IRequest<HandleResponse> { }       
}
