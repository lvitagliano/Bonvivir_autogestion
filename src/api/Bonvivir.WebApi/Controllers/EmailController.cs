using System;
using System.Threading.Tasks;
using Bonvivir.Application.Helpers;
using Microsoft.AspNetCore.Mvc;

namespace Bonvivir.WebApi.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class EmailController : BaseController
    {
        [HttpPost("send")]
        public async Task<IActionResult> SendMail([FromBody] EmailRequest request)
        {
            try
            {
                return Ok(await Mediator.Send(request));
            }
            catch (Exception ex)
            {
                throw ex;
            }
        }
    }
}
