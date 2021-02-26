using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using Bonvivir.Persistance;
using Microsoft.EntityFrameworkCore;

namespace Bonvivir.Persistence.Seed
{
    public static class SeedInit
    {
        public static void SeedAll(this ModelBuilder modelBuilder)
        {
             SeedOffers.Seed(modelBuilder);
             SeedUser.Seed(modelBuilder);
        }
    }
}
