using System;
using System.Collections.Generic;
using System.Text;

namespace Bonvivir.Application.OfferItem
{
    public class OfferItemEditResponse
    {
        public bool Success { get; set; }
        public int EditedItemId { get; set; }
        public string Message { get; set; }
    }
}
