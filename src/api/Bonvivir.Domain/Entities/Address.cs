using System;
using System.Collections.Generic;
using Newtonsoft.Json;

namespace Bonvivir.Domain.Entities
{
    public class Address
    {
        public int Id { get; set; }

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

        public DateTime CreatedAt { get; set; } = DateTime.Now;

        public DateTime UpdatedAt { get; set; } = DateTime.Now;
    }
}