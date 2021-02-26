using Bonvivir.Domain.Common;
using MediatR;

namespace Bonvivir.Application.Subscription
{
    public class SubscriptionSuspensionStatusByIdRequest : IRequest<HandleResponse>
    {
        public string Id { get; set; }

        public SubscriptionSuspensionStatusByIdRequest(string id)
        {
            this.Id = id;
        }
    }
}
