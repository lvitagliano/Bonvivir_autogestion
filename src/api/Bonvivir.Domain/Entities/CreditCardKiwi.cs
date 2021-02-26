using Newtonsoft.Json;
using System;

namespace Bonvivir.Domain.Entities
{
    public class CreditCardKiwi
    {
        #region  Constructors
        public CreditCardKiwi() { }

        public CreditCardKiwi(Subscription subscription)
        {
            IdNumber = subscription.CreditCardInfo.IdNumber;
            CardOwner = subscription.CreditCardInfo.CardOwner;
        }
        #endregion

        #region Properties
        [JsonProperty(PropertyName = "idNumber")]
        public string IdNumber { get; set; }

        [JsonProperty(PropertyName = "creditCardOwner")]
        public string CardOwner { get; set; }

        #endregion
    }
}
