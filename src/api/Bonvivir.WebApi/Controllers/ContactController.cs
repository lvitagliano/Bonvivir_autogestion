using Bonvivir.Application.Contact;
using Bonvivir.Domain.Entities;
using Bonvivir.Infrastructure.DTOs;
using Bonvivir.Infrastructure.Exceptions;
using Microsoft.AspNetCore.Mvc;
using System.Threading.Tasks;

namespace Bonvivir.WebApi.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class ContactController : BaseController
    {
        [HttpGet("GetContact/{dni}")]
        public async Task<ActionResult<ContactKiwiDTO>> GetContact([FromRoute] string dni)
        {
            return Ok(await Mediator.Send(new ContactByDniRequest(dni)));
        }

        [HttpPost("Create")]
        public async Task<ActionResult<string>> Create([FromBody] ContactCreationRequest contactRequest)
        {
            try
            {
                return Ok(await Mediator.Send(contactRequest));
            }
            catch (KiwiApiException ex)
            {
                return StatusCode(ex.StatusCode, ex.ReasonPhrase);
            }
        }

        [HttpGet("GetCustomer/{dni}")]
        public async Task<ActionResult<Customer>> Get([FromRoute] string dni)
        {
            return Ok(await Mediator.Send(new CustomerByDniRequest(dni)));
        }
    }
}
