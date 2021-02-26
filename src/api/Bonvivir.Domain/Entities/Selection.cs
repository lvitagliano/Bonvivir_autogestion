using System;
using System.Collections.Generic;
using System.Text;

namespace Bonvivir.Domain.Entities
{
    public class Selection
    {
        public string Title { get; set; }

        public string Subtitle { get; set; }

        public string TableTitle { get; set; }

        public List<SelectionDetail> SelectionDetails { get; set; }

        public string ImagePath { get; set; }

        public string ImagePathMobile { get; set; }

        public string ImagePathDetail { get; set; }
    }
}
