using Bonvivir.Application.ReferFriend;
using Microsoft.AspNetCore.Mvc;
using System.Threading.Tasks;

namespace Bonvivir.WebApi.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ReferFriendController : BaseController
    {
        [HttpPost("reference")]
        public async Task<ActionResult<string>> ReferFriend([FromBody] ReferFriendRequest request)
        {
            return Ok(await Mediator.Send(request));
        }

        [HttpPost("save")]
        public async Task<ActionResult<string>> SaveRefered([FromBody] ReferFriendSaveRequest request)
        {
            return Ok(await Mediator.Send(request));
        }
    }
}
