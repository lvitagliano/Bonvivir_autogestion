namespace Bonvivir.Infrastructure.Helpers
{
    using System;
    using System.Linq;
    using System.Text;

    public static class CreditCardEncodingHelper
    {
        private const byte SEED = 7;

        public static string Encode(string input)
        {
            string output = null;

            if (!string.IsNullOrEmpty(input))
            {
                output = Convert.ToBase64String(Encoding.ASCII.GetBytes(input).Select(b => (byte)(b ^ SEED)).ToArray());
            }

            return output;
        }
    }
}