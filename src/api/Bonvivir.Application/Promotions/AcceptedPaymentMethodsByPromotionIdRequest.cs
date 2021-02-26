using Bonvivir.Infrastructure.DTOs;
using MediatR;
using System.Collections.Generic;

namespace Bonvivir.Application.Promotions
{
    public class AcceptedPaymentMethodsByPromotionIdRequest : IRequest<List<KiwiPaymentMethodDto>>
    {
        public string PromotionId { get; }

        public AcceptedPaymentMethodsByPromotionIdRequest(string promotionId)
        {
            this.PromotionId = promotionId;
        }
    }
}