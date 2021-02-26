using Bonvivir.Application.Order;
using Bonvivir.Domain.Entities;
using Microsoft.AspNetCore.Mvc;
using System.Threading.Tasks;

namespace Bonvivir.WebApi.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class OrderController : BaseController
    {
        [HttpGet("Get/{id}")]
        public async Task<ActionResult<OrderKiwi>> GetOrders([FromRoute] string id) => Ok(await Mediator.Send(new OrdersBySubscriptionIdRequest(id)));
    }
}
