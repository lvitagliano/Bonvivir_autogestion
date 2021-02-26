using System;

namespace Bonvivir.Infrastructure.DTOs
{
    public class ContactKiwiDTO
    {
        public Guid Id { get; set; }
        public string FirstName { get; set; }
        public string LastName { get; set; }
        public string IdNumber { get; set; }
        public string IdType { get; set; }
        public string Gender { get; set; }
        public string Email { get; set; }
        public string Status { get; set; }
    }
}
