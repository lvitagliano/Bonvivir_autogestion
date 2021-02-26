using Newtonsoft.Json;

namespace Bonvivir.Domain.Entities
{
    public class PhoneKiwi
    {
        public PhoneKiwi(Customer customer)
        {
            AreaCode = customer.AreaCode;
            Number = customer.PhoneNumber;
        }

        [JsonProperty(PropertyName = "areaCode")]
        public string AreaCode { get; set; }

        [JsonProperty(PropertyName = "number")]
        public string Number { get; set; }
    }
}
