using System;
using System.Collections.Generic;
using System.Text;

namespace Bonvivir.Infrastructure.DTOs
{
    public class KiwiPaymentMethodDto
    {
        public Guid Id { get; set; }
        public Guid IssuerId { get; set; }
    }
}
