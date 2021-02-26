using Newtonsoft.Json;
using System;
using System.Collections.Generic;

namespace Bonvivir.Domain.Entities
{
    public class OrderKiwi
    {
        #region Properties
        [JsonProperty(PropertyName = "id")]
        public Guid Id { get; set; }

        [JsonProperty(PropertyName = "promotion")]
        public Guid PromotionId { get; set; }

        [JsonProperty(PropertyName = "subscription")]
        public Guid SubscriptionId { get; set; }

        [JsonProperty(PropertyName = "type")]
        public string Type { get; set; }

        [JsonProperty(PropertyName = "customer")]
        public ContactKiwi Customer { get; set; }

        [JsonProperty(PropertyName = "paymentMethod")]
        public string PaymentMethod { get; set; }

        [JsonProperty(PropertyName = "installments")]
        public int Installments { get; set; }

        [JsonProperty(PropertyName = "installmentAmount")]
        public decimal? InstallmentAmount { get; set; }

        [JsonProperty(PropertyName = "creditCard")]
        public CreditCardKiwi CreditCard { get; set; }

        [JsonProperty(PropertyName = "description")]
        public string Description { get; set; }

        [JsonProperty(PropertyName = "notes")]
        public string Notes { get; set; }

        [JsonProperty(PropertyName = "orderNumber")]
        public string OrderNumber { get; set; }

        [JsonProperty(PropertyName = "freight")]
        public string Freight { get; set; }

        [JsonProperty(PropertyName = "deliveryStatus")]
        public string DeliveryStatus { get; set; }

        [JsonProperty(PropertyName = "documentStatus")]
        public string DocumentStatus { get; set; }

        [JsonProperty(PropertyName = "trackingNumber")]
        public string TrackingNumber { get; set; }

        [JsonProperty(PropertyName = "createdAt")]
        public DateTime CreatedAt { get; set; }

        [JsonProperty(PropertyName = "updatedAt")]
        public DateTime UpdatedAt { get; set; }

        [JsonProperty(PropertyName = "status")]
        public string Status { get; set; }

        [JsonProperty(PropertyName = "statusReason")]
        public string StatusReason { get; set; }

        [JsonProperty(PropertyName = "totalWithoutDiscount")]
        public string TotalWithoutDiscount { get; set; }

        [JsonProperty(PropertyName = "totalAmount")]
        public double? TotalAmount { get; set; }

        [JsonProperty(PropertyName = "businessUnit")]
        public Guid BusinessUnitId { get; set; }

        [JsonProperty(PropertyName = "priceList")]
        public Guid PriceListId { get; set; }

        [JsonProperty(PropertyName = "paymentCoupon")]
        public string PaymentCoupon { get; set; }

        [JsonProperty(PropertyName = "shipToName")]
        public string ShipToName { get; set; }

        [JsonProperty(PropertyName = "nroTrackingHop")]
        public string NroTrackingHop { get; set; }

        [JsonProperty(PropertyName = "urlEtiquetaHop")]
        public string UrlEtiquetaHop { get; set; }

        [JsonProperty(PropertyName = "tipoDireccionEnvio")]
        public string TipoDireccionEnvio { get; set; }

        [JsonProperty(PropertyName = "items")]
        public List<KiwiItems> Items { get; set; }

        [JsonProperty(PropertyName = "payments")]
        public List<KiwiPayments> Payments { get; set; }

        [JsonProperty(PropertyName = "legalDocuments")]
        public List<LegalDocumentKiwi> LegalDocuments { get; set; }
        
        [JsonProperty(PropertyName = "address")]
        public AddressKiwi Address { get; set; }
        #endregion
    }
}
