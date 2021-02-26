using Newtonsoft.Json;
using System;
using System.ComponentModel.DataAnnotations.Schema;

namespace Bonvivir.Domain.Entities
{
    public class Subscription
    {
        public int Id { get; set; }

        [JsonProperty(PropertyName = "name")]
        public string Name { get; set; }

        [JsonProperty(PropertyName = "promotion")]
        public Guid PromotionId { get; set; }

        [JsonProperty(PropertyName = "schema")]
        public Guid SchemaId { get; set; }

        [JsonProperty(PropertyName = "customer")]
        public Customer Customer { get; set; }

        [JsonProperty(PropertyName = "paymentMethod")]
        public Guid PaymentMethodId { get; set; }

        [JsonProperty(PropertyName = "externalId")]
        public string ExternalId { get; set; }

        [JsonProperty(PropertyName = "address")]
        public Address Address { get; set; }

        [JsonProperty(PropertyName = "creditCard")]
        public string CreditCard { get; set; }

        [NotMapped]
        [JsonProperty(PropertyName = "creditCardInfo")]
        public CreditCard CreditCardInfo { get; set; }

        [JsonProperty(PropertyName = "cln")]
        public string ClubLaNacionCard { get; set; }

        public string JsonRequest { get; set; }

        public bool Retry { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.Now;

        public DateTime UpdatedAt { get; set; } = DateTime.Now;

        public string ErrorCode { get; set; }

        public string ErrorMessage { get; set; }
    }
}
