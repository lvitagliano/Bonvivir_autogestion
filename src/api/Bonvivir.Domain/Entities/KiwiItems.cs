using Newtonsoft.Json;

namespace Bonvivir.Domain.Entities
{
    public class KiwiItems
    {
        #region Properties
        [JsonProperty(PropertyName = "quantity")]
        public int Quantity { get; set; }

        [JsonProperty(PropertyName = "product")]
        public string Product { get; set; }

        [JsonProperty(PropertyName = "financialCoefficient")]
        public string FinancialCoefficient { get; set; }

        [JsonProperty(PropertyName = "pricePerUnit")]
        public double PricePerUnit { get; set; }

        [JsonProperty(PropertyName = "rowTotal")]
        public double RowTotal { get; set; }
        #endregion
    }
}