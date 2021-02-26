using Newtonsoft.Json;
using System;

namespace Bonvivir.Domain.Entities
{
    public class LegalDocumentKiwi
    {
        #region Properties
        [JsonProperty(PropertyName = "id")]
        public Guid Id { get; set; }

        [JsonProperty(PropertyName = "date")]
        public DateTime Date { get; set; }

        [JsonProperty(PropertyName = "number")]
        public string Number { get; set; }

        [JsonProperty(PropertyName = "amount")]
        public decimal Amount { get; set; }

        [JsonProperty(PropertyName = "link")]
        public string Link { get; set; }

        [JsonProperty(PropertyName = "order")]
        public Guid OrderId { get; set; }

        [JsonProperty(PropertyName = "type")]
        public string Type { get; set; }
        #endregion
    }
}
