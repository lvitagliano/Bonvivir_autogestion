using System;

namespace Bonvivir.Domain.Entities
{
    public class Auditable
    {
        public DateTime CreatedDate { get; set; } = DateTime.Now;

        public DateTime? ModifiedDate { get; set; }

        public string CreatedBy { get; set; }

        public string ModifiedBy { get; set; }
    }
}