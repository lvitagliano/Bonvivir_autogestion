using Bonvivir.Domain.Entities;
using Newtonsoft.Json;
using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class GetSubscriptionKiwiDTO
    {
        [JsonProperty(PropertyName = "id")]
        public Guid Id { get; set; }

        [JsonProperty(PropertyName = "promotion")]
        public Guid Promotion { get; set; }


        [JsonProperty(PropertyName = "schema")]
        public SchemaKiwiDTO Schema { get; set; }


        [JsonProperty(PropertyName = "customer")]
        public CustomerKiwiDTO Customer { get; set; }


        [JsonProperty(PropertyName = "creditCard")]
        public CreditCardKiwiDTO CreditCard { get; set; }


        [JsonProperty(PropertyName = "status")]
        public string Status { get; set; }


        [JsonProperty(PropertyName = "statusReason")]
        public string StatusReason { get; set; }


        [JsonProperty(PropertyName = "address")]
        public AddressKiwi Address { get; set; }
    }
}
