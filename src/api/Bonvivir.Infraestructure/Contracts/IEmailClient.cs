using System.Threading.Tasks;

namespace Bonvivir.Infrastructure.Contracts
{
    public interface IEmailClient
    {
        Task SendSubscriptionEmailAsync(EmailDTO mailRequest);
    }
}