using MediatR;

namespace Bonvivir.Application.ClnCard
{
    public class ClnCardValidationRequest : IRequest<bool>
    {
        public string CardNumber { get; }

        public ClnCardValidationRequest(string cardNumber)
        {
            this.CardNumber = cardNumber;
        }
    }
}
