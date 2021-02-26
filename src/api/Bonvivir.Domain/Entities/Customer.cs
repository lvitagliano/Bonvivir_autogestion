namespace Bonvivir.Domain.Entities
{
    using System;
    using System.ComponentModel.DataAnnotations.Schema;
    using Newtonsoft.Json;

    public class Customer
    {
        public int Id { get; set; }

        public Guid BonvivirId { get; set; }

        [JsonProperty(PropertyName = "firstName")]
        public string FirstName { get; set; }

        [JsonProperty(PropertyName = "lastName")]
        public string LastName { get; set; }

        [JsonProperty(PropertyName = "idNumber")]
        public string IdNumber { get; set; }

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

        [JsonProperty(PropertyName = "phoneNumber")]
        public string PhoneNumber { get; set; }

        [JsonProperty(PropertyName = "areaCode")]
        public string AreaCode { get; set; }

        [JsonProperty(PropertyName = "businessUnit")]
        public string BusinessUnit { get; set; }

        [NotMapped]
        [JsonProperty(PropertyName = "address")]
        public Address Address { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.Now;

        public DateTime UpdatedAt { get; set; } = DateTime.Now;

    }
}
