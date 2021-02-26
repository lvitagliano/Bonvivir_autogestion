using System;
using System.Collections.Generic;
using System.Threading.Tasks;
using Bonvivir.Application.OfferItem;
using Bonvivir.Domain.Entities;
using Microsoft.AspNetCore.Authorization;
using Microsoft.AspNetCore.Mvc;

namespace Bonvivir.WebApi.Controllers
{
    [Route("api/[controller]")]
    public class OfferItemsController : BaseController
    {
        // POST: api/offeritems
        [HttpPost]
        [Authorize]
        public async Task<OfferItemCreationResponse> Post([FromBody] OfferItemCreationRequest offerItemCreationRequest)
        {
            return await Mediator.Send(offerItemCreationRequest);
        }

        // POST: api/offeritems/edit
        [HttpPost("edit")]
        [Authorize]
        public async Task<OfferItemEditResponse> Edit([FromBody] OfferItemEditRequest offerItemEditRequest)
        {
            return await Mediator.Send(offerItemEditRequest);
        }

        // POST: api/offeritems/delete
        [HttpPost("delete")]
        [Authorize]
        public async Task<OfferItemDeleteResponse> Delete([FromBody] OfferItemDeleteRequest offerItemDeleteRequest)
        {
            return await Mediator.Send(offerItemDeleteRequest);
        }

        [HttpGet("get/ag/{schemaId}")]
        public async Task<ActionResult<List<OfferItem>>> GetOfferItemsBySchemaId([FromRoute] Guid schemaId)
        {
            return Ok(await Mediator.Send(new OfferItemsBySchemaIdRequest(schemaId)));
        }
    }
}
