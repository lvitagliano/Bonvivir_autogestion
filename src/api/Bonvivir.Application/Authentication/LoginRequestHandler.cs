namespace Bonvivir.Application.Authentication
{
    using System.Threading;
    using System.Threading.Tasks;
    using MediatR;
    using Microsoft.Extensions.Options;
    using System.Linq;
    using Microsoft.IdentityModel.Tokens;
    using System.Text;
    using System.Security.Claims;
    using System;
    using System.IdentityModel.Tokens.Jwt;
    using Bonvivir.Domain.Helpers;
    using Bonvivir.Persistance;
    using System.Security.Authentication;
    using Microsoft.AspNetCore.Cryptography.KeyDerivation;

    public class User
    {
        public int Id;
        public string Username;
        public string Password;
        public string Token;

    }

    public class LoginRequestHandler : IRequestHandler<LoginRequest, User>
    {
        private readonly BonvivirDbContext _context;

        public LoginRequestHandler(IOptions<AppSettings> appSettings, BonvivirDbContext context)
        {
            _context = context;
            _appSettings = appSettings.Value;
        }

        private readonly AppSettings _appSettings;

        public async Task<User> Handle(LoginRequest request, CancellationToken cancellationToken)
        {

            var userInfo = _context.Users.SingleOrDefault(x => x.Username == request.Username);

            if (userInfo == null)
                return null;


            if (userInfo.Username != request.Username)
            {
                throw new AuthenticationException();
            }

            if (!ComparePasswords(userInfo.Password, request.Password))
            {
                throw new AuthenticationException();
            }

            var tokenHandler = new JwtSecurityTokenHandler();
            var key = Encoding.ASCII.GetBytes(_appSettings.Secret);

            var tokenDescriptor = new SecurityTokenDescriptor
            {
                Subject = new ClaimsIdentity(new Claim[]
                {
                    new Claim(ClaimTypes.Name, userInfo.Id.ToString())
                }),
                SigningCredentials = new SigningCredentials(new SymmetricSecurityKey(key), SecurityAlgorithms.HmacSha256Signature)
            };

            var user = new User() { Username = userInfo.Username, Password = userInfo.Password };

            var token = tokenHandler.CreateToken(tokenDescriptor);
            user.Token = tokenHandler.WriteToken(token);

            user.Password = string.Empty;

            return await Task.FromResult(user);
        }

        public bool ComparePasswords(string passFromDB, string passFromInput)
        {
            // generate a 128-bit salt using a secure PRNG
            var hashSecret = Environment.GetEnvironmentVariable("HASH_SECRET") ?? "SecretOrKey";

            byte[] salt = Encoding.ASCII.GetBytes(hashSecret);

            // derive a 256-bit subkey (use HMACSHA1 with 10,000 iterations)
            string hashed = Convert.ToBase64String(KeyDerivation.Pbkdf2(
                password: passFromInput,
                salt: salt,
                prf: KeyDerivationPrf.HMACSHA1,
                iterationCount: 10000,
                numBytesRequested: 256 / 8));

            return hashed == passFromDB;
        }
    }
}
