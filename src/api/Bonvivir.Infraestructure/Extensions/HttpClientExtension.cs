using Newtonsoft.Json;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Threading.Tasks;

namespace Bonvivir.Infrastructure.Extensions
{
    public static class HttpClientExtensions
    {
        public static Task<HttpResponseMessage> ExecuteAsJsonAsync<T>(
            this HttpClient client, HttpMethod method, string url, T data)
        {
            string dataAsString;

            if (IsJson(data.ToString()))
                dataAsString = data.ToString();
            else
                dataAsString = JsonConvert.SerializeObject(data);

            var content = new StringContent(dataAsString);
            content.Headers.ContentType = new MediaTypeHeaderValue("application/json");

            switch (method)
            {
                case HttpMethod m when m == HttpMethod.Post:
                    return client.PostAsync(url, content);
                case HttpMethod m when m == HttpMethod.Patch:
                    return client.PatchAsync(url, content);
                default:
                    return client.PostAsync(url, content);
            }
        }

        public static bool IsJson(string input)
        {
            input = input.Trim();
            return input.StartsWith("{") && input.EndsWith("}")
                   || input.StartsWith("[") && input.EndsWith("]");
        }

        public static async Task<T> ReadAsJsonAsync<T>(this HttpContent content)
        {
            var dataAsString = await content.ReadAsStringAsync();
            return JsonConvert.DeserializeObject<T>(dataAsString);
        }
    }
}
