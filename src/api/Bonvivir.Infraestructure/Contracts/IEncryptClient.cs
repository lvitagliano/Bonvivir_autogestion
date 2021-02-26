using System.Collections.Generic;
using System.Threading.Tasks;
using Bonvivir.Domain.Entities;
using Bonvivir.Infrastructure.DTOs;

namespace Bonvivir.Infrastructure.Contracts
{
    public interface IEncryptClient
    {
        Task<string> Encrypt(string textToEncrypt);
    }
}
