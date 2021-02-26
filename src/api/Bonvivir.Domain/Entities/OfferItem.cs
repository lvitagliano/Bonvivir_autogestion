using System;
using System.Collections.Generic;
using System.Text;

namespace Bonvivir.Domain.Entities
{
    public class OfferItem
    {
        public int Id { get; set; }

        public int OfferId { get; set; }

        public Enum.Selection Selection { get; set; }

        public string Title { get; set; }

        public string Description { get; set; }

        public byte[] DesktopImage { get; set; }

        public byte[] MobileImage { get; set; }

        public Guid BasePriceId { get; set; }

        public decimal BasePrice { get; set; }

        public Guid ClubLaNacionId { get; set; }

        public decimal ClubLaNacionPrice { get; set; }

        public Guid TierraDelFuegoId { get; set; }

        public decimal TierraDelFuegoPrice { get; set; }

        public Guid SchemaId { get; set; }

        public DateTime CreatedAt { get; set; } = DateTime.Now;

        public DateTime UpdatedAt { get; set; } = DateTime.Now;
    }
}
