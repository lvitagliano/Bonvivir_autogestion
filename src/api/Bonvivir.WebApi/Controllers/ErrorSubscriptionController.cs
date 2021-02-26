namespace Bonvivir.WebApi.Controllers
{
    using Bonvivir.Application;
    using Bonvivir.Application.ErrorSubscription;
    using Bonvivir.Infrastructure.Exceptions;
    using Microsoft.AspNetCore.Mvc;
    using System;
    using System.IO;
    using System.Threading.Tasks;

    [Route("api/[controller]")]
    [ApiController]
    public class ErrorSubscriptionController : BaseController
    {
        // POST api/errorsubscription
        [HttpPost]
        public async Task<ActionResult<ErrorSubscriptionResponse>> GetErrorSubscription([FromBody] ErrorSubscriptionRequest request)
        {
            ErrorSubscriptionResponse response;
            try
            {
                response = await Mediator.Send(request);
            }
            catch (ErrorSubscriptionPageIsLowerThan0Exception e)
            {
                return BadRequest(new { e.Message });
            }

            return Ok(response);
        }

        // GET api/errorSubscription/exportToExcel
        [HttpGet("exportToExcel")]
        public async Task<FileStreamResult> ExportToExcel([FromQuery] ExportToExcelErrorSubscriptionRequest request)
        {
            Stream ms = await Mediator.Send(request);

            return new FileStreamResult(ms, "application/vnd.ms-excel")
            {
                FileDownloadName = "Suscripciones" + DateTime.Now.ToString("yyyyMMdd-HHmmss") + ".xlsx",
            };
        }
    }
}