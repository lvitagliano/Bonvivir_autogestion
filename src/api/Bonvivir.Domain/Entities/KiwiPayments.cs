using Newtonsoft.Json;

namespace Bonvivir.Domain.Entities
{
    public class KiwiPayments
    {
        #region Properties
        [JsonProperty(PropertyName = "amount")]
        public double Amount { get; set; }

        [JsonProperty(PropertyName = "gateway")]
        public string Gateway { get; set; }

        [JsonProperty(PropertyName = "paymentStatus")]
        public string PaymentStatus { get; set; }

        [JsonProperty(PropertyName = "name")]
        public string Name { get; set; }

        [JsonProperty(PropertyName = "description")]
        public string Description { get; set; }
        #endregion
    }
}