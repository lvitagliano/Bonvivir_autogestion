using Newtonsoft.Json;
using System;

namespace Bonvivir.Domain.Entities
{
    public class LeadKiwi
    {
        public LeadKiwi(Lead lead)
        {
            FirstName = lead.FirstName;
            LastName = lead.LastName;
            Email = lead.Email;
            PhoneNumber = lead.PhoneNumber;
            MobileNumber = lead.MobileNumber;
            Campaign = lead.Campaign;
            Subject = lead.Subject;
        }

        public LeadKiwi() { }

        [JsonProperty(PropertyName = "firstName")]
        public string FirstName { get; set; }

        [JsonProperty(PropertyName = "lastName")]
        public string LastName { get; set; }

        [JsonProperty(PropertyName = "email")]
        public string Email { get; set; }

        [JsonProperty(PropertyName = "phone")]
        public string PhoneNumber { get; set; }

        [JsonProperty(PropertyName = "mobile")]
        public string MobileNumber { get; set; }

        [JsonProperty(PropertyName = "campaign")]
        public Guid Campaign { get; set; }

        [JsonProperty(PropertyName = "subject")]
        public string Subject { get; set; }

        [JsonProperty(PropertyName = "utms")]
        public string UTMS { get; set; }
    }
}
