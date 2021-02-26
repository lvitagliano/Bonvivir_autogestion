using Bonvivir.Application.Subscription;
using Bonvivir.Domain.Common;
using Bonvivir.Domain.Entities;
using Bonvivir.Infrastructure.DTOs;
using Microsoft.AspNetCore.Mvc;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace Bonvivir.WebApi.Controllers
{
    [Route("api/[controller]")]
    [ApiController]
    public class SubscriptionController : BaseController
    {
        // POST api/subscription
        [HttpPost]
        public async Task<ActionResult<string>> CreateSubscription([FromBody] SubscriptionRequest subscription)
        {
            return Ok(await Mediator.Send(subscription));
        }

        [HttpGet("get/kw/{customerId}")]
        public async Task<ActionResult<List<SubscriptionKiwiDTO>>> GetSubscriptions([FromRoute] string customerId)
        {
            return Ok(await Mediator.Send(new SubscriptionByCustomerIdRequest(customerId)));
        }

        [HttpGet("get/ag/{dni}")]
        public async Task<ActionResult<List<Subscription>>> GetSubscriptionsAg([FromRoute] string dni)
        {
            return Ok(await Mediator.Send(new SubscriptionAgByCustomerIdRequest(dni)));
        }

        [HttpPatch("creditcard")]
        public async Task<ActionResult<HandleResponse>> EditCreditCard([FromBody] EditSubscriptionCreditCardRequest creditCardRequest)
        {
            return Ok(await Mediator.Send(creditCardRequest));
        }

        [HttpPatch("address")]
        public async Task<ActionResult<HandleResponse>> EditAddress([FromBody] EditSubscriptionAddressRequest addressRequest)
        {
            return Ok(await Mediator.Send(addressRequest));
        }

        [HttpPost("suspension")]
        public async Task<ActionResult<HandleResponse>> GetPosibleSuspendedIntervals([FromBody] EditSubscriptionPosibleIntervalSuspendRequest request)
        {
            return Ok(await Mediator.Send(request));
        }

        [HttpPost("suspend")]
        public async Task<ActionResult<List<SubscriptionKiwiDTO>>> Suspend([FromBody] EditSubscriptionSuspendRequest request)
        {
            return Ok(await Mediator.Send(request));
        }

        [HttpGet("{subscriptionId}/suspension")]
        public async Task<ActionResult<HandleResponse>> GetStatus([FromRoute] string subscriptionId)
        {
            return Ok(await Mediator.Send(new SubscriptionSuspensionStatusByIdRequest(subscriptionId)));
        }

        [HttpGet("{subscriptionId}")]
        public async Task<ActionResult<HandleResponse>> GetSubscriptionById([FromRoute] string subscriptionId)
        {
            return Ok(await Mediator.Send(new SubscriptionByIdRequest(subscriptionId)));
        }
    }
}