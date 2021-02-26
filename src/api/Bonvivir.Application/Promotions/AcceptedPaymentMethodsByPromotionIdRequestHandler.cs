using System.Collections.Generic;
using System.Threading;
using System.Threading.Tasks;
using Bonvivir.Infrastructure.Contracts;
using Bonvivir.Infrastructure.DTOs;
using MediatR;

namespace Bonvivir.Application.Promotions
{
    public class AcceptedPaymentMethodsByPromotionIdRequestHandler : IRequestHandler<AcceptedPaymentMethodsByPromotionIdRequest, List<KiwiPaymentMethodDto>>
    {
        private readonly IKiwiClient _kiwiClient;

        public List<string> AcceptedMethods { get; set; }

        public AcceptedPaymentMethodsByPromotionIdRequestHandler(IKiwiClient kiwiClient)
        {
            _kiwiClient = kiwiClient;
        }

        public async Task<List<KiwiPaymentMethodDto>> Handle(AcceptedPaymentMethodsByPromotionIdRequest request, CancellationToken cancellationToken)
        {
            return await _kiwiClient.GetPaymentMethodsByPromotionIdAsync(request.PromotionId);
        }
    }
}