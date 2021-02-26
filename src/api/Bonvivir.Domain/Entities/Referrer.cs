using Newtonsoft.Json;

namespace Bonvivir.Domain.Entities
{
    public class Referrer
    {
        public int Id { get; set; }

        [JsonProperty(PropertyName = "referredId")]
        public string ReferredId { get; set; }

        [JsonProperty(PropertyName = "referredName")]
        public string ReferredName { get; set; }

        [JsonProperty(PropertyName = "referredEmail")]
        public string ReferredEmail { get; set; }

        [JsonProperty(PropertyName = "referrerId")]
        public string ReferrerId { get; set; }
    }
}
