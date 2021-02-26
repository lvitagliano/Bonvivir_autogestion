using Newtonsoft.Json;
using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class CreditCardKiwiDTO
    {
        [JsonProperty(PropertyName = "id")]
        public Guid Id { get; set; }

        [JsonProperty(PropertyName = "issuer")]
        public string Issuer { get; set; }

        [JsonProperty(PropertyName = "lastDigits")]
        public string LastDigits { get; set; }

        [JsonProperty(PropertyName = "creditCardOwner")]
        public string CreditCardOwner { get; set; }
    }
}