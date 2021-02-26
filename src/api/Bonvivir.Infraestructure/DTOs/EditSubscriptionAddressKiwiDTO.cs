using Bonvivir.Domain.Entities;
using Newtonsoft.Json;
using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class EditSubscriptionAddressKiwiDTO
    {
        [JsonProperty(PropertyName = "subscriptionId")]
        public Guid SubscriptionId { get; set; }

        [JsonProperty(PropertyName = "address")]
        public AddressKiwi Address { get; set; }
    }
}
