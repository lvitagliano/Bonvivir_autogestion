using Newtonsoft.Json;
using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class EditSubscriptionIntervalSuspendKiwiDTO
    {
        [JsonProperty(PropertyName = "suspendFrom")]
        public DateTime SuspendFrom { get; set; }

        [JsonProperty(PropertyName = "interval")]
        public int Interval { get; set; }
    }
}
