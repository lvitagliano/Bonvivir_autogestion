using Newtonsoft.Json;

namespace Bonvivir.Domain.Entities
{
    public class AddressKiwi
    {
        #region Constructors
        public AddressKiwi() { }

        public AddressKiwi(Address address)
        {
            Street = address.Street;
            DoorNumber = address.DoorNumber;
            Floor = address.Floor;
            Apartment = address.Apartment;
            District = address.District;
            Zone = address.Zone;
            City = address.City;
            State = address.State;
            ZipCode = address.ZipCode;
            Comments = address.Comments;
        }
        #endregion

        #region Properties
        [JsonProperty(PropertyName = "street")]
        public string Street { get; set; }

        [JsonProperty(PropertyName = "doorNumber")]
        public string DoorNumber { get; set; }

        [JsonProperty(PropertyName = "floor")]
        public string Floor { get; set; }

        [JsonProperty(PropertyName = "apartment")]
        public string Apartment { get; set; }

        [JsonProperty(PropertyName = "district")]
        public string District { get; set; }

        [JsonProperty(PropertyName = "zone")]
        public string Zone { get; set; }

        [JsonProperty(PropertyName = "city")]
        public string City { get; set; }

        [JsonProperty(PropertyName = "state")]
        public string State { get; set; }

        [JsonProperty(PropertyName = "zipCode")]
        public string ZipCode { get; set; }

        [JsonProperty(PropertyName = "comments")]
        public string Comments { get; set; }
        #endregion
    }
}