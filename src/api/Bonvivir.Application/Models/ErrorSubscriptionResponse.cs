using System.Collections.Generic;

namespace Bonvivir.Application
{
    public class ErrorSubscriptionResponse
    {
        public List<Bonvivir.Domain.Entities.Subscription> Subscriptions;
        public int TotalItems;
    }
}