using System;
using Bonvivir.Domain.Enum;
using Microsoft.EntityFrameworkCore;
using Entities = Bonvivir.Domain.Entities;

namespace Bonvivir.Persistence.Seed
{
    public static class SeedUser
    {
        public static void Seed(ModelBuilder modelBuilder)
        {
            modelBuilder.Entity<Entities.User>().HasData(GetUser());
        }

        private static Entities.User[] GetUser()
        {
            return new Entities.User[] 
            {
                new Entities.User { Id = "1", Username = "admin", Password = "sQDDb3f8Y7iB4OsAYCtSnMFWTxu7/Drq4iaUpVXbqwo="},
            };
        }
    }
}
