using Newtonsoft.Json;
using System;

namespace Bonvivir.Domain.Entities
{
    public class SubscriptionForKiwi
    {
        public SubscriptionForKiwi() { }

        public SubscriptionForKiwi(Subscription subscription)
        {
            Name = subscription.Name;
            PromotionId = subscription.PromotionId;
            SchemaId = subscription.SchemaId;
            Customer = new CustomerKiwi(subscription);
            PaymentMethodId = subscription.PaymentMethodId;
            ExternalId = subscription.ExternalId;
            Address = new AddressKiwi(subscription.Address);
            CreditCard = new CreditCardKiwi(subscription);
            ClubLaNacionCard = subscription.ClubLaNacionCard;
        }

        [JsonProperty(PropertyName = "name")]
        public string Name { get; set; }

        [JsonProperty(PropertyName = "promotion")]
        public Guid PromotionId { get; set; }

        [JsonProperty(PropertyName = "schema")]
        public Guid SchemaId { get; set; }

        [JsonProperty(PropertyName = "customer")]
        public CustomerKiwi Customer { get; set; }

        [JsonProperty(PropertyName = "paymentMethod")]
        public Guid PaymentMethodId { get; set; }

        [JsonProperty(PropertyName = "externalId")]
        public string ExternalId { get; set; }

        [JsonProperty(PropertyName = "address")]
        public AddressKiwi Address { get; set; }

        [JsonProperty(PropertyName = "creditCard")]
        public CreditCardKiwi CreditCard { get; set; }

        [JsonProperty(PropertyName = "cln")]
        public string ClubLaNacionCard { get; set; }
    }
}
