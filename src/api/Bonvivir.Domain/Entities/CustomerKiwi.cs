using System;
using Newtonsoft.Json;

namespace Bonvivir.Domain.Entities
{
    public class CustomerKiwi
    {
        public CustomerKiwi(Subscription subscription)
        {
            FirstName = subscription.Customer.FirstName;
            LastName = subscription.Customer.LastName;
            IdNumber = subscription.Customer.IdNumber;
            BirthDate = subscription.Customer.BirthDate;
            Email = subscription.Customer.Email;
            IdType = subscription.Customer.IdType;
            Gender = subscription.Customer.Gender;
            TaxType = subscription.Customer.TaxType;
            Phone = new PhoneKiwi(subscription.Customer);
            BusinessUnit = subscription.Customer.BusinessUnit;
            Address = new AddressKiwi(subscription.Address);
        }

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

        [JsonProperty(PropertyName = "phone")]
        public PhoneKiwi Phone { get; set; }

        [JsonProperty(PropertyName = "businessUnit")]
        public string BusinessUnit { get; set; }

        [JsonProperty(PropertyName = "address")]
        public AddressKiwi Address { get; set; }
    }
}
