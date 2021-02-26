using Bonvivir.Application.LegalDocument;
using Bonvivir.Domain.Entities;
using Microsoft.AspNetCore.Mvc;
using System.Threading.Tasks;

namespace Bonvivir.WebApi.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class LegalDocumentController : BaseController
    {
        [HttpGet("Get/{orderId}")]
        public async Task<ActionResult<LegalDocumentKiwi>> GetDocuments([FromRoute] string orderId)
        {
            return Ok(await Mediator.Send(new LegalDocumentByOrderRequest(orderId)));
        }
    }
}
