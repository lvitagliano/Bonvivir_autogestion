using Newtonsoft.Json;
using System.ComponentModel.DataAnnotations.Schema;

namespace Bonvivir.Domain.Entities
{
    [NotMapped]
    public class CreditCard
    {
        [JsonProperty(PropertyName = "idNumber")]
        public string IdNumber { get; set; }

        [JsonProperty(PropertyName = "cardOwner")]
        public string CardOwner { get; set; }
    }
}
