using Bonvivir.Domain.Entities;
using Bonvivir.Persistance;
using MediatR;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.Contact
{
    public class CustomerByDniRequestHandler : IRequestHandler<CustomerByDniRequest, Customer>
    {
        private readonly BonvivirDbContext _context;

        public CustomerByDniRequestHandler(BonvivirDbContext context) => _context = context;

        public Task<Customer> Handle(CustomerByDniRequest request, CancellationToken cancellationToken)
        {
            return Task.FromResult(_context.Customers.Where(c => c.IdNumber == request.dni).FirstOrDefault());
        }
    }
}
