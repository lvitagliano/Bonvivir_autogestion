using System;

namespace Bonvivir.Infrastructure.Exceptions
{
    public class ErrorSubscriptionPageIsLowerThan0Exception : Exception
    {
        public ErrorSubscriptionPageIsLowerThan0Exception() : base() {}

        public ErrorSubscriptionPageIsLowerThan0Exception(string message) : base(message) {}

        public ErrorSubscriptionPageIsLowerThan0Exception(string message, Exception innerException) : base(message, innerException) {}
    }
}
