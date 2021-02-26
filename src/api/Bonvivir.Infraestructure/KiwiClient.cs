using Bonvivir.Domain.Common;
using Bonvivir.Domain.Entities;
using Bonvivir.Infrastructure.Contracts;
using Bonvivir.Infrastructure.DTOs;
using Bonvivir.Infrastructure.Exceptions;
using Bonvivir.Infrastructure.Extensions;
using Newtonsoft.Json;
using Newtonsoft.Json.Linq;
using System;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Net.Http;
using System.Net.Http.Headers;
using System.Threading.Tasks;

namespace Bonvivir.Infraestructure
{
    public class KiwiClient : IKiwiClient
    {
        #region Properties
        public HttpClient Client { get; private set; }
        #endregion

        #region Construsctors
        public KiwiClient(HttpClient httpClient)
        {
            httpClient.BaseAddress = new Uri(Environment.GetEnvironmentVariable("KIWI_URL"));
            Client = httpClient;
        }
        #endregion

        #region Public Methos
        public async Task<string> SaveLeadAsync(LeadKiwi newLead) => await ExecuteRequestAsync(HttpMethod.Post, "lead.json", newLead);

        public async Task<string> SendSubscriptionAsync(SubscriptionForKiwi subscription) => await ExecuteRequestAsync(HttpMethod.Post, "subscription.json", subscription);

        public async Task<string> SendSubscriptionAsync(string subscription)
        {
            string response;

            string authToken = await GetAuthenticationToken();
            Client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", authToken);

            HttpResponseMessage responseMsg = await Client.ExecuteAsJsonAsync(HttpMethod.Post, "subscription.json", subscription);

            if (responseMsg.IsSuccessStatusCode)
            {
                HttpContent responseContent = responseMsg.Content;

                using (StreamReader reader = new StreamReader(await responseContent.ReadAsStreamAsync()))
                {
                    response = await reader.ReadToEndAsync();
                }
            }
            else
            {
                HttpContent responseContent = responseMsg.Content;

                using (StreamReader reader = new StreamReader(await responseContent.ReadAsStreamAsync()))
                {
                    response = await reader.ReadToEndAsync();
                }

                throw new KiwiApiException((int)responseMsg.StatusCode, responseMsg.ReasonPhrase, response);
            }

            return response;
        }

        public async Task<List<KiwiPaymentMethodDto>> GetPaymentMethodsByPromotionIdAsync(string promotionId)
        {
            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, $"promotion/{promotionId}/payment_methods.json?page=1&limit=1000");

            string response = await GetRequestAsync(requestMessage);

            List<JObject> jsonResponse = JArray.Parse(response).ToObject<List<JObject>>();

            return jsonResponse.Select(j => new KiwiPaymentMethodDto
            {
                Id = Guid.Parse(((JProperty)j.First).Value.ToString()),
                IssuerId = Guid.Parse(j["issuer"]["id"].ToString())
            }).ToList();
        }

        public async Task<ContactKiwiDTO> GetContactByDniAsync(string dni)
        {
            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, $"contact.json?page=1&limit=10&idNumber={dni}");

            string response = await GetRequestAsync(requestMessage);

            ContactKiwiDTO result = JsonConvert.DeserializeObject<List<ContactKiwiDTO>>(response).FirstOrDefault();

            return result;
        }

        public async Task<bool> ValidateCLNCardNumber(string cardNumber)
        {
            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, $"cln/user.json?cardNumber={cardNumber}");

            string response = await GetRequestAsync(requestMessage);

            return response.Length > 0;
        }

        public async Task<Address> StandardizeAdrress(Address basicAddress)
        {
            string queryString = $"street={basicAddress.Street}&doorNumber={basicAddress.DoorNumber}&zipCode={basicAddress.ZipCode}";
            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, $"/standarized/address.json?{queryString}");

            string response = await GetRequestAsync(requestMessage);

            return JObject.Parse(response).ToObject<Address>();
        }

        public async Task<Customer> GetContactByIdNumberAsync(string idNumber)
        {
            Customer existingCustomer = null;
            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, $"/contact.json?idNumber={idNumber}&page=1&limit=1000");

            try
            {
                string response = await GetRequestAsync(requestMessage);

                List<JObject> jsonResponse = JArray.Parse(response).ToObject<List<JObject>>();

                if (jsonResponse.Count > 0)
                {
                    existingCustomer = new Customer
                    {
                        BonvivirId = Guid.Parse(jsonResponse[0]["id"]?.ToString()),
                        FirstName = jsonResponse[0]["firstName"]?.ToString(),
                        LastName = jsonResponse[0]["lastName"]?.ToString(),
                        Email = jsonResponse[0]["email"]?.ToString(),
                    };
                }

                return existingCustomer;
            }
            catch (KiwiApiException)
            {
                return existingCustomer;
            }
        }

        public async Task<string> SaveContactAsync(ContactKiwi contact)
        {
            return await ExecuteRequestAsync(HttpMethod.Post, "contact.json", contact);
        }

        public async Task<string> ReferenceAsync(ReferFriendKiwiDTO reference)
        {
            return await ExecuteRequestAsync(HttpMethod.Post, "reference.json", reference);
        }

        public async Task<List<SubscriptionKiwiDTO>> GetSubscriptionsByCustomerId(string customerId)
        {
            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, $"subscription.json?page=1&limit=1000&customer={customerId}");

            string response = await GetRequestAsync(requestMessage);

            List<SubscriptionKiwiDTO> result = JsonConvert.DeserializeObject<List<SubscriptionKiwiDTO>>(response);

            return result;
        }

        public async Task<HandleResponse> EditCardAsync(EditSubscriptionCreditCardKiwiDTO request)
        {
            string jsonResponse = await ExecuteRequestAsync(HttpMethod.Patch, "subscription/creditcard", request);

            return JsonConvert.DeserializeObject<HandleResponse>(jsonResponse);
        }

        public async Task<HandleResponse> EditAddressAsync(EditSubscriptionAddressKiwiDTO request)
        {
            string jsonResponse = await ExecuteRequestAsync(HttpMethod.Patch, "subscription/address", request);

            return JsonConvert.DeserializeObject<HandleResponse>(jsonResponse);
        }

        public async Task<HandleResponse> GetPosibleIntervalSuspendAsync(EditSubscriptionIntervalSuspendKiwiDTO request)
        {
            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, $"suspension?suspendFrom={request.SuspendFrom}&interval={request.Interval}");

            string response = await GetRequestAsync(requestMessage);

            HandleResponse result = JsonConvert.DeserializeObject<HandleResponse>(response);

            return result;
        }

        public async Task<HandleResponse> SubscriptionSuspendAsync(EditSubscriptionSuspendKiwiDTO request)
        {
            string response = await ExecuteRequestAsync(HttpMethod.Post, "subscription/suspend", request);

            HandleResponse result = JsonConvert.DeserializeObject<HandleResponse>(response);

            return result;
        }

        public async Task<HandleResponse> GetSuspensionStatusByIdAsync(string id)
        {
            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, $"subscription/{id}/suspension?_format=json");

            string response = await GetRequestAsync(requestMessage);

            HandleResponse result = JsonConvert.DeserializeObject<HandleResponse>(response);

            return result;
        }

        /// <summary>
        /// Make an HttpRequestMessage to order with its page, limit and subscriptionId parameters. Deserialize Object RequestMessage and returns a list of OrderKiwi
        /// </summary>
        public async Task<List<OrderKiwi>> GetOrdersBySubscriptionId(string id) => await Task.Run(async () => JsonConvert.DeserializeObject<List<OrderKiwi>>(await GetRequestAsync(new HttpRequestMessage(HttpMethod.Get, $"order.json?page=1&limit=10&subscription={id}"))));

        public async Task<List<LegalDocumentKiwi>> GetLegalDocumentByOrderId(string orderId)
        {
            string parameters = $"legaldocument.json?page=1&limit=1000&type=Factura&order={orderId}";

            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, parameters);

            string response = await GetRequestAsync(requestMessage);

            List<LegalDocumentKiwi> result = JsonConvert.DeserializeObject<List<LegalDocumentKiwi>>(response);

            return result;
        }

        public async Task<InvoiceKiwi> GetInvoiceByYearAndId(string year, string id)
        {
            string parameters = $"invoice.json?year={year}&invoice={id}";

            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, parameters);

            string response = await GetRequestAsync(requestMessage);

            InvoiceKiwi result = JsonConvert.DeserializeObject<InvoiceKiwi>(response);

            return result;
        }

        public async Task<GetSubscriptionKiwiDTO> GetSubscriptionsById(string id)
        {
            HttpRequestMessage requestMessage = new HttpRequestMessage(HttpMethod.Get, $"subscription/{id}.json");

            string response = await GetRequestAsync(requestMessage);

            GetSubscriptionKiwiDTO result = JsonConvert.DeserializeObject<GetSubscriptionKiwiDTO>(response);

            return result;
        }
        #endregion

        #region Private Methods
        private async Task<string> GetRequestAsync(HttpRequestMessage requestMessage)
        {
            Client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", await GetAuthenticationToken());
            HttpResponseMessage responseMsg = await Client.SendAsync(requestMessage);
            string response;

            if (responseMsg.IsSuccessStatusCode)
            {
                HttpContent responseContent = responseMsg.Content;
                using (StreamReader reader = new StreamReader(await responseContent.ReadAsStreamAsync()))
                {
                    response = await reader.ReadToEndAsync();
                }
            }
            else
                throw new KiwiApiException((int)responseMsg.StatusCode, responseMsg.ReasonPhrase, response = null);

            return response;
        }

        private async Task<string> ExecuteRequestAsync(HttpMethod method, string url, object requestContent)
        {
            string response = null;

            string authToken = await GetAuthenticationToken();
            Client.DefaultRequestHeaders.Authorization = new AuthenticationHeaderValue("Bearer", authToken);

            HttpResponseMessage responseMsg = await Client.ExecuteAsJsonAsync(method, url, requestContent);

            if (responseMsg.IsSuccessStatusCode)
            {
                HttpContent responseContent = responseMsg.Content;

                using (StreamReader reader = new StreamReader(await responseContent.ReadAsStreamAsync()))
                {
                    response = await reader.ReadToEndAsync();
                }
            }
            else
            {
                HttpContent responseContent = responseMsg.Content;

                using (StreamReader reader = new StreamReader(await responseContent.ReadAsStreamAsync()))
                {
                    response = await reader.ReadToEndAsync();
                }

                throw new KiwiApiException((int)responseMsg.StatusCode, responseMsg.ReasonPhrase, response);
            }

            return response;
        }

        private async Task<string> GetAuthenticationToken()
        {
            string authenticationToken = string.Empty;

            FormUrlEncodedContent requestContent = new FormUrlEncodedContent(new[] {
                    new KeyValuePair<string, string>("_username", Environment.GetEnvironmentVariable("KIWI_USERNAME")),
                    new KeyValuePair<string, string>("_password", Environment.GetEnvironmentVariable("KIWI_PASSWORD"))
                });

            HttpResponseMessage responseMsg = await Client.PostAsync("login_check", requestContent);

            if (responseMsg.IsSuccessStatusCode)
            {
                HttpContent responseContent = responseMsg.Content;

                using (StreamReader reader = new StreamReader(await responseContent.ReadAsStreamAsync()))
                {
                    string stringResult = await reader.ReadToEndAsync();
                    authenticationToken = ((JProperty)JObject.Parse(stringResult).First).Value.ToString();
                }
            }
            else
            {
                throw new KiwiApiException((int)responseMsg.StatusCode, responseMsg.ReasonPhrase);
            }

            return authenticationToken;
        }


        #endregion
    }
}