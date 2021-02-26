using Newtonsoft.Json;
using System;

namespace Bonvivir.Domain.Entities
{
    public class Lead
    {
        public int Id { get; set; }

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

        public DateTime CreatedAt { get; set; } = DateTime.Now;

        public DateTime UpdatedAt { get; set; } = DateTime.Now;
    }
}