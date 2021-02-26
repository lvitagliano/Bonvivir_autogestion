using Bonvivir.Domain.Entities;
using Newtonsoft.Json;
using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class EditSubscriptionCreditCardKiwiDTO
    {
        [JsonProperty(PropertyName = "subscriptionId")]
        public Guid SubscriptionId { get; set; }

        [JsonProperty(PropertyName = "creditCard")]
        public CreditCardKiwi CreditCard { get; set; }
    }
}
