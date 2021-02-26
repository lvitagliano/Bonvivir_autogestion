using System;

namespace Bonvivir.Infrastructure.Exceptions
{
    public class KiwiApiException : Exception
    {
        public int StatusCode { get; set; }
        public string ReasonPhrase { get; set; }

        public string ValidationText { get; set; }

        public KiwiApiException(int statusCode, string reasonPhrase)
        {
            StatusCode = statusCode;
            ReasonPhrase = reasonPhrase;
        }

        public KiwiApiException(int statusCode, string reasonPhrase, string validationText)
        {
            StatusCode = statusCode;
            ReasonPhrase = reasonPhrase;
            ValidationText = validationText;
        }
    }
}
