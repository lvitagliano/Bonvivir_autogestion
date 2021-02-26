using Newtonsoft.Json.Converters;

namespace Bonvivir.Domain.Common
{
    public class DateFormatConverter : IsoDateTimeConverter
    {
        public DateFormatConverter(string format) => DateTimeFormat = format;
    }
}
