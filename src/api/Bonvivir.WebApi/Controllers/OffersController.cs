// <copyright file="OffersController.cs" company="PlaceholderCompany">
// Copyright (c) PlaceholderCompany. All rights reserved.
// </copyright>

namespace Bonvivir.WebApi.Controllers
{
    using System.Collections.Generic;
    using System.Threading.Tasks;
    using Bonvivir.Application.Offers;
    using Bonvivir.Domain.Entities;
    using Microsoft.AspNetCore.Authorization;
    using Microsoft.AspNetCore.Mvc;

    [Route("api/[controller]")]
    public class OffersController : BaseController
    {
        // GET: api/<controller>
        [HttpGet]
        public async Task<ActionResult<List<Offer>>> Get()
        {
            return Ok(await Mediator.Send(new OffersRequest()));
        }

        // POST: api/<controller>
        [HttpPost]
        [Authorize]
        public async Task<ActionResult<List<Offer>>> Post([FromBody] OfferCreationRequest offerCreationRequest)
        {
            int id = await Mediator.Send(offerCreationRequest);

            if (id > 0)
            {
                return Ok(id);
            }
            else
            {
                // Return 400, because there is already an organic offer
                return StatusCode(400);
            }
        }

        // POST: api/<controller>/delete
        [HttpPost("delete")]
        [Authorize]
        public async Task<ActionResult<List<Offer>>> Delete([FromBody] OfferDeleteRequest offerDeleteRequest)
        {
            int result = await Mediator.Send(offerDeleteRequest);

            if (result > 0)
            {
                return Ok();
            }
            else
            {
                // Return 400, because there is already an organic offer
                return StatusCode(400);
            }
        }

        // POST: api/<controller>/edit
        [HttpPost("edit")]
        [Authorize]
        public async Task<ActionResult<List<Offer>>> Edit([FromBody] OfferEditRequest offerEditRequest)
        {
            int result = await Mediator.Send(offerEditRequest);

            if (result > 0)
            {
                return Ok();
            }
            else
            {
                // Return 400, because there is already an organic offer
                return StatusCode(400);
            }
        }
    }
}
