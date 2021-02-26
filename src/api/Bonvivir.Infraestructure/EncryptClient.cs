using System;
using System.IO;
using System.Net.Http;
using System.Threading.Tasks;
using Bonvivir.Infrastructure.Contracts;

namespace Bonvivir.Infraestructure
{
    public class EncryptClient : IEncryptClient
    {
        public HttpClient Client { get; private set; }

        public EncryptClient(HttpClient httpClient)
        {
            //string encryptServiceName = Environment.GetEnvironmentVariable("ENCRYPT_SERVICE_NAME");
            httpClient.BaseAddress = new Uri($"http://localhost:4000");
            Client = httpClient;
        }

        public async Task<string> Encrypt(string textToEncrypt)
        {
            var requestMessage = new HttpRequestMessage(HttpMethod.Get, $"encrypt/{textToEncrypt}");

            string response = await GetRequestAsync(requestMessage);

            return response;
        }

        private async Task<string> GetRequestAsync(HttpRequestMessage requestMessage)
        {
            string response = null;

            HttpResponseMessage responseMsg = await Client.SendAsync(requestMessage);

            try
            {
                // Get the response content
                HttpContent responseContent = responseMsg.Content;

                // Get the stream of the content
                using (var reader = new StreamReader(await responseContent.ReadAsStreamAsync()))
                {
                    response = await reader.ReadToEndAsync();
                }
            }
            catch (Exception e)
            {
                throw e;
            }

            return response;
        }
    }
}