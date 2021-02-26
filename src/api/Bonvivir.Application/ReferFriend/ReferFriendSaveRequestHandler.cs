using Bonvivir.Persistance;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.ReferFriend
{
    public class ReferFriendSaveRequestHandler : IRequestHandler<ReferFriendSaveRequest, string>
    {
        private readonly BonvivirDbContext _context;

        public ReferFriendSaveRequestHandler(BonvivirDbContext context) => _context = context;

        public async Task<string> Handle(ReferFriendSaveRequest request, CancellationToken cancellationToken)
        {
            _context.Referrers.Add(request);

            await _context.SaveChangesAsync(cancellationToken);

            return request.Id.ToString();
        }
    }
}
