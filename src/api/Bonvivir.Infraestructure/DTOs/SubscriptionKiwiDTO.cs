using Bonvivir.Domain.Entities;
using Newtonsoft.Json;
using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class SubscriptionKiwiDTO
    {
        public Guid Id { get; set; }

        [JsonProperty(PropertyName = "customer")]
        public Guid CustomerId { get; set; }

        [JsonProperty(PropertyName = "schema")]
        public Guid SchemaId { get; set; }

        [JsonProperty(PropertyName = "status")]
        public string Status { get; set; }

        [JsonProperty(PropertyName = "statusReason")]
        public string StatusReason { get; set; }

        public OfferItem OfferItem { get; set; }
    }
}
