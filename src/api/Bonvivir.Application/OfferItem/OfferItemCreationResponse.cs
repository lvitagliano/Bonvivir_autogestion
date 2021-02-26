using System;
using System.Collections.Generic;
using System.Text;

namespace Bonvivir.Application.OfferItem
{
    public class OfferItemCreationResponse
    {
        public bool Success { get; set; }
        public int CreatedItemId { get; set; }
        public string Message { get; set; }
    }
}
