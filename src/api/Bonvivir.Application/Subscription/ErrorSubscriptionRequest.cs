using MediatR;


namespace Bonvivir.Application.ErrorSubscription
{
    public class ErrorSubscriptionRequest : IRequest<ErrorSubscriptionResponse>
    {
        public string ErrorCode;
        public string ErrorMessage;
        public int? QuantityPerPage;
        public int? Page;
        public bool? Retry;
    }
}
