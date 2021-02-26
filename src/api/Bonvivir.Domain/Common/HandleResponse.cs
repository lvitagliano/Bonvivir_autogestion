namespace Bonvivir.Domain.Common
{
    public class HandleResponse
    {
        public int? Code { get; set; }
        public object Message { get; set; } = null;
        public bool Success { get; set; } = false;
        public object Data { get; set; } = null;
    }
}
