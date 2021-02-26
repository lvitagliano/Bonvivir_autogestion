using Newtonsoft.Json;
using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class SchemaKiwiDTO
    {
        [JsonProperty(PropertyName = "id")]
        public Guid Id { get; set; }

        [JsonProperty(PropertyName = "name")]
        public string Name { get; set; }
    }
}