using System;

namespace Bonvivir.Domain.Entities
{
    public class SelectionDetail
    {
        public string Item { get; set; }

        public string CommonPrice { get; set; }

        public string ClubLaNacionPrice { get; set; }

        public Guid CampaignId { get; set; }

        public Guid PromotionId { get; set; }
    }
}
