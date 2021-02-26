using Newtonsoft.Json;
using System;

namespace Bonvivir.Domain.Entities
{
    public class ContactKiwi
    {
        #region Properties

        [JsonProperty(PropertyName = "firstName")]
        public string FirstName { get; set; }
        
        [JsonProperty(PropertyName = "lastName")]
        public string LastName { get; set; }

        [JsonProperty(PropertyName = "email")]
        public string Email { get; set; }

        [JsonProperty(PropertyName = "idNumber")]
        public string IdNumber { get; set; }

        [JsonProperty(PropertyName = "idType")]
        public string IdType { get; set; }

        [JsonProperty(PropertyName = "gender")]
        public string Gender { get; set; }

        [JsonProperty(PropertyName = "taxType")]
        public string TaxType { get; set; }

        [JsonProperty(PropertyName = "maritalStatus")]
        public string MaritalStatus { get; set; }

        [JsonProperty(PropertyName = "birthDate")]
        public string BirthDate { get; set; }

        [JsonProperty(PropertyName = "phone")]
        public string Phone { get; set; }

        [JsonProperty(PropertyName = "altPhoneNumber")]
        public string AltPhoneNumber { get; set; }

        [JsonProperty(PropertyName = "address")]
        public AddressKiwi Address { get; set; }

        [JsonProperty(PropertyName = "businessUnit")]
        public string BusinessUnit { get; set; }
        #endregion
    }
}
