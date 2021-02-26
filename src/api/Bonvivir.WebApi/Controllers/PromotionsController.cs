using Bonvivir.Application.Promotions;
using Bonvivir.Infrastructure.DTOs;
using Microsoft.AspNetCore.Mvc;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace Bonvivir.WebApi.Controllers
{
    [Route("api/[controller]")]
    public class PromotionsController : BaseController
    {
        [HttpGet("GetAcceptedPaymentMethods/{promotionId}")]
        public async Task<ActionResult<IList<KiwiPaymentMethodDto>>> GetAcceptedPaymentMethodsByPromotionId([FromRoute] string promotionId)
        {
            return Ok(await Mediator.Send(new AcceptedPaymentMethodsByPromotionIdRequest(promotionId)));
        }
    }
}
