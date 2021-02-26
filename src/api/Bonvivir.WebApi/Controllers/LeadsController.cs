namespace Bonvivir.WebApi.Controllers
{
    using Bonvivir.Application.Leads;
    using Microsoft.AspNetCore.Mvc;
    using System.Threading.Tasks;

    [Route("api/[controller]")]
    [ApiController]
    public class LeadsController : BaseController
    {
        // POST KW api/leads
        [HttpPost]
        public async Task<ActionResult<string>> CreateLead([FromBody] LeadCreationRequest newLead)
        {
            return Ok(await Mediator.Send(newLead));
        }

        // POST AG api/leads/save
        [HttpPost("save")]
        public async Task<ActionResult<string>> Save([FromBody] LeadSaveRequest saveLead)
        {
            return Ok(await Mediator.Send(saveLead));
        }
    }
}
