namespace Bonvivir.Application.Tests
{
    using Bonvivir.Application.Offers;
    using Entities = Bonvivir.Domain.Entities;
    using Shouldly;
    using System;
    using System.Linq;
    using System.Threading;
    using System.Threading.Tasks;
    using Xunit;

    [Collection("OffersCollection")]
    public class GetOffersTest : TestBase
    {
        [Fact]
        public async Task GetListTest()
        {
            var context = MySQLContext();

            Entities.Offer[] offers =
            {
                new Entities.Offer { Id = 1, Title = "Oferta 1", Description = "Oferta 1", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 2, Title = "Oferta 2", Description = "Oferta 2", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 3, Title = "Oferta 3", Description = "Oferta 3", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 4, Title = "Oferta 4", Description = "Oferta 4", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 5, Title = "Oferta 5", Description = "Oferta 5", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 6, Title = "Oferta 6 Exclusive Promo", Description = "Oferta 6", CreatedBy = "Seed", CreatedDate = DateTime.Now }
            };

            context.Offers.AddRange(offers);
            var offersRequest = new OffersRequest();
            var offersRequestHandler = new OffersRequestHandler(context);
            var result = await offersRequestHandler.Handle(offersRequest, CancellationToken.None);

            Assert.NotEmpty(result);

            result.ShouldBe(offers.OrderByDescending(o => o.CreatedDate));
        }
    }
}