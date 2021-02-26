using System.IO;
using MediatR;

namespace Bonvivir.Application.ErrorSubscription
{
    public class ExportToExcelErrorSubscriptionRequest : IRequest<Stream>
    {
        public string ErrorCode;
    }
}