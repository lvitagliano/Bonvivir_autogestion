using Newtonsoft.Json;
using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class CustomerKiwiDTO
    {
        [JsonProperty(PropertyName = "id")]
        public Guid Id { get; set; }


        [JsonProperty(PropertyName = "firstName")]
        public string FirstName { get; set; }


        [JsonProperty(PropertyName = "lastName")]
        public string LastName { get; set; }


        [JsonProperty(PropertyName = "birthDate")]
        public DateTime BirthDate { get; set; }


        [JsonProperty(PropertyName = "email")]
        public string Email { get; set; }


        [JsonProperty(PropertyName = "idType")]
        public string IdType { get; set; }


        [JsonProperty(PropertyName = "gender")]
        public string Gender { get; set; }


        [JsonProperty(PropertyName = "taxType")]
        public string TaxType { get; set; }


        [JsonProperty(PropertyName = "mainPhoneAreaCode")]
        public string MainPhoneAreaCode { get; set; }


        [JsonProperty(PropertyName = "mainPhoneNumber")]
        public string MainPhoneNumber { get; set; }

        [JsonProperty(PropertyName = "businessUnit")]
        public string BusinessUnit { get; set; }


        [JsonProperty(PropertyName = "mainAddressStreet")]
        public string MainAddressStreet { get; set; }


        [JsonProperty(PropertyName = "mainAddressDoorNumber")]
        public string MainAddressDoorNumber { get; set; }


        [JsonProperty(PropertyName = "mainAddressFloor")]
        public string MainAddressFloor { get; set; }


        [JsonProperty(PropertyName = "mainAddressApartment")]
        public string MainAddressApartment { get; set; }


        [JsonProperty(PropertyName = "mainAddressCity")]
        public string MainAddressCity { get; set; }


        [JsonProperty(PropertyName = "mainAddressState")]
        public string MainAddressState { get; set; }


        [JsonProperty(PropertyName = "mainAddressDistrict")]
        public string MainAddressDistrict { get; set; }


        [JsonProperty(PropertyName = "mainAddressZipCode")]
        public string MainAddressZipCode { get; set; }


        [JsonProperty(PropertyName = "mainAddressComments")]
        public string MainAddressComments { get; set; }


        [JsonProperty(PropertyName = "mainAddressCountry")]
        public string MainAddressCountry { get; set; }


        [JsonProperty(PropertyName = "mainAddressIsStandarized")]
        public string MainAddressIsStandarized { get; set; }
    }
}