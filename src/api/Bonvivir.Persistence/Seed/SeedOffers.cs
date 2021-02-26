using System;
using Bonvivir.Domain.Enum;
using Microsoft.EntityFrameworkCore;
using Entities = Bonvivir.Domain.Entities;

namespace Bonvivir.Persistence.Seed
{
    public static class SeedOffers
    {
        public static void Seed(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Entities.Offer>().HasData(GetOffers());
        }

        private static Entities.Offer[] GetOffers()
        {
            return new Entities.Offer[] 
            {
                new Entities.Offer { Id = 1, Title = "Oferta 1", Description = "Oferta 1", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 2, Title = "Oferta 2", Description = "Oferta 2", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 3, Title = "Oferta 3", Description = "Oferta 3", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 4, Title = "Oferta 4", Description = "Oferta 4", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 5, Title = "Oferta 5", Description = "Oferta 5", CreatedBy = "Seed", CreatedDate = DateTime.Now },
                new Entities.Offer { Id = 6, Title = "Oferta 6 Exclusive Promo", Description = "Oferta 6", CreatedBy = "Seed", CreatedDate = DateTime.Now }
            };
        }
    }
}
