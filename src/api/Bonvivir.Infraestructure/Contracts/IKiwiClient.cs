using Bonvivir.Domain.Common;
using Bonvivir.Domain.Entities;
using Bonvivir.Infrastructure.DTOs;
using System.Collections.Generic;
using System.Threading.Tasks;

namespace Bonvivir.Infrastructure.Contracts
{
    public interface IKiwiClient
    {
        Task<string> SaveLeadAsync(LeadKiwi newLead);

        Task<string> SendSubscriptionAsync(SubscriptionForKiwi subscription);

        Task<string> SendSubscriptionAsync(string subscription);

        Task<List<KiwiPaymentMethodDto>> GetPaymentMethodsByPromotionIdAsync(string promotionId);

        Task<bool> ValidateCLNCardNumber(string cardNumber);

        Task<Address> StandardizeAdrress(Address basicAddress);
        
        Task<Customer> GetContactByIdNumberAsync(string idNumber);
        
        Task<ContactKiwiDTO> GetContactByDniAsync(string dni);

        Task<string> SaveContactAsync(ContactKiwi contact);

        Task<string> ReferenceAsync(ReferFriendKiwiDTO reference);

        Task<List<SubscriptionKiwiDTO>> GetSubscriptionsByCustomerId(string customerId);

        Task<List<OrderKiwi>> GetOrdersBySubscriptionId(string id);

        Task<List<LegalDocumentKiwi>> GetLegalDocumentByOrderId(string orderId);

        Task<InvoiceKiwi> GetInvoiceByYearAndId(string year, string id);

        Task<HandleResponse> EditCardAsync(EditSubscriptionCreditCardKiwiDTO request);

        Task<HandleResponse> EditAddressAsync(EditSubscriptionAddressKiwiDTO request);

        Task<HandleResponse> GetPosibleIntervalSuspendAsync(EditSubscriptionIntervalSuspendKiwiDTO request);

        Task<HandleResponse> SubscriptionSuspendAsync(EditSubscriptionSuspendKiwiDTO request);

        Task<HandleResponse> GetSuspensionStatusByIdAsync(string id);

        Task<GetSubscriptionKiwiDTO> GetSubscriptionsById(string id);
    }
}
