using System;
using System.Collections.Generic;
using System.Text;

namespace Bonvivir.Domain.Entities
{
    public class User
    {
        
        public string Id { get;  set; }

        public string Username { get; set; }

        public string Password { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.Now;

        public DateTime UpdatedAt { get; set; } = DateTime.Now;
    }
}
