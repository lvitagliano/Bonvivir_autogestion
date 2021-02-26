using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;

namespace Bonvivir.Domain.Entities
{
    public class Offer : Auditable
    {
        public int Id { get; set; }

        [Required]
        public string Title { get; set; }

        [Required]
        public string Description { get; set; }

        public bool IsOrganic { get; set; }

        public List<OfferItem> Items { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.Now;

        public DateTime UpdatedAt { get; set; } = DateTime.Now;
    }
}
