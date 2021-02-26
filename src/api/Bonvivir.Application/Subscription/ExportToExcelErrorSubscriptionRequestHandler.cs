using Bonvivir.Application.Helpers;
using Bonvivir.Persistance;
using MediatR;
using Microsoft.EntityFrameworkCore;
using System.Collections.Generic;
using System.IO;
using System.Linq;
using System.Threading;
using System.Threading.Tasks;

namespace Bonvivir.Application.ErrorSubscription
{
    public class ExportToExcelErrorSubscriptionRequestHandler : IRequestHandler<ExportToExcelErrorSubscriptionRequest, Stream>
    {
        private readonly BonvivirDbContext _context;

        public ExportToExcelErrorSubscriptionRequestHandler(BonvivirDbContext context)
        {
            _context = context;
        }

        public Task<Stream> Handle(ExportToExcelErrorSubscriptionRequest request, CancellationToken cancellationToken)
        {
            var headers = new List<string>
            {
                "ID de Suscripción",
                "Nombre",
                "ID de Promoción",
                "ID de Esquema",
                "ID Método de pago",
                "ID externa",
                "Tarjeta de crédito",
                "Tarjeta CLN",
                "Fecha de creación",
                "Fecha de modificación",
                "Código de error",
                "Mensaje de error",
                "ID de Cliente",
                "Bonvivir ID",
                "Nombre",
                "Apellido",
                "Fecha de nacimiento",
                "E-mail",
                "Tipo documento",
                "Nro. documento",
                "Género",
                "Tipo de comprobante",
                "Código de área",
                "Teléfono",
                "Unidad de Negocio",
                "ID Dirección",
                "Calle",
                "Altura",
                "Piso",
                "Departamento",
                "Distrito",
                "Zona",
                "Ciudad",
                "Provincia",
                "Código Postal"
            };

            List<Domain.Entities.Subscription> subscriptionsWithError = _context.Subscriptions
                .Include(s => s.Customer)
                .Include(s => s.Address)
                .Where(s => s.ErrorCode != null && s.ErrorCode.StartsWith(request.ErrorCode))
                .ToList();

            var data = subscriptionsWithError.Select(swe => new
            {
                swe.Id,
                swe.Name,
                swe.PromotionId,
                swe.SchemaId,
                swe.PaymentMethodId,
                swe.ExternalId,
                swe.CreditCard,
                ClubLaNacionCard = swe.ClubLaNacionCard.ToString(),
                CreatedAt = swe.CreatedAt.ToString("DD/MM/YYYY HH:mm"),
                UpdatedAt = swe.UpdatedAt.ToString("DD/MM/YYYY HH:mm"),
                swe.ErrorCode,
                swe.ErrorMessage,
                CustomerId = swe.Customer.Id,
                swe.Customer.BonvivirId,
                swe.Customer.FirstName,
                swe.Customer.LastName,
                BirthDate = swe.Customer.BirthDate.ToString("DD/MM/YYYY"),
                swe.Customer.Email,
                swe.Customer.IdType,
                swe.Customer.IdNumber,
                swe.Customer.Gender,
                swe.Customer.TaxType,
                swe.Customer.AreaCode,
                swe.Customer.PhoneNumber,
                swe.Customer.BusinessUnit,
                addressId = swe.Address.Id,
                swe.Address.Street,
                swe.Address.DoorNumber,
                swe.Address.Floor,
                swe.Address.Apartment,
                swe.Address.District,
                swe.Address.Zone,
                swe.Address.City,
                swe.Address.State,
                swe.Address.ZipCode
            }).ToList();

            return Task.FromResult(ExportToExcelHelper.Export(headers, data, "Suscripciones"));
        }
    }
}
