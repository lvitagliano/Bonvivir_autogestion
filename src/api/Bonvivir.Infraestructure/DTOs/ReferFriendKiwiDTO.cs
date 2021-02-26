using Newtonsoft.Json;

namespace Bonvivir.Infrastructure.DTOs
{
    public class ReferFriendKiwiDTO
    {
        [JsonProperty(PropertyName = "referred")]
        public string ReferredId { get; set; }

        [JsonProperty(PropertyName = "referrer")]
        public string ReferrerId { get; set; }

        [JsonProperty(PropertyName = "businessUnit")]
        public string BusinessUnit { get; set; }
    }
}
