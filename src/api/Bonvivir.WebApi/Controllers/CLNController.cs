﻿// <auto-generated />

namespace Bonvivir.WebApi.Controllers
{
    using System.Threading.Tasks;
    using Bonvivir.Application.ClnCard;
    using Bonvivir.Infrastructure.Contracts;
    using Bonvivir.Infrastructure.Exceptions;
    using Microsoft.AspNetCore.Mvc;

    [Route("api/[controller]")]
    [ApiController]
    public class CLNController : BaseController
    {
        private readonly IKiwiClient _kiwiClient;

        public CLNController(IKiwiClient kiwiClient)
        {
            _kiwiClient = kiwiClient;
        }

        // POST api/CLN/validateCardNumber
        [HttpPost("validateCardNumber")]
        public async Task<ActionResult<string>> ValidateCardNumber([FromBody] ClnCardValidationRequest clnCard)
        {
            try
            {
                return Ok(await Mediator.Send(clnCard));
            }
            catch (KiwiApiException ex) 
            {
                return StatusCode(ex.StatusCode, ex.ReasonPhrase);
            }      
        }
    }
}