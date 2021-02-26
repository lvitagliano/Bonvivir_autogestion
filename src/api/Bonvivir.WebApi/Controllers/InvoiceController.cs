using Bonvivir.Application.Invoice;
using Bonvivir.Domain.Entities;
using Microsoft.AspNetCore.Mvc;
using System.Threading.Tasks;

namespace Bonvivir.WebApi.Controllers
{
    public class InvoiceController : BaseController
    {
        [HttpGet("Get/year/{year}/{id}")]
        public async Task<ActionResult<InvoiceKiwi>> GetInvoice([FromRoute] string year, string id)
        {
            return Ok(await Mediator.Send(new InvoiceRequest(year, id)));
        }
    }
}
