using Bonvivir.Domain.Common;
using Newtonsoft.Json;
using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class EditSubscriptionSuspendKiwiDTO
    {
        [JsonProperty(PropertyName = "subscriptionId")]
        public Guid SubscriptionId { get; set; }

        [JsonProperty(PropertyName = "suspendFrom")]
        [JsonConverter(typeof(DateFormatConverter), "yyyy-MM-dd")]
        public DateTime SuspendFrom { get; set; }

        [JsonProperty(PropertyName = "interval")]
        public int Interval { get; set; }
    }
}
