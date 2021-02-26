using Bonvivir.Persistance;
using MediatR;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Leads
{
    public class LeadSaveRequestHandler : IRequestHandler<LeadSaveRequest, int>
    {
        private readonly BonvivirDbContext _context;

        public LeadSaveRequestHandler(BonvivirDbContext context) => _context = context;

        // Returns the id of the created Offer or -1 in case of error
        public async Task<int> Handle(LeadSaveRequest request, CancellationToken cancellationToken)
        {
            _context.Leads.Add(request);

            await _context.SaveChangesAsync(cancellationToken);

            return request.Id;
        }
    }
}
