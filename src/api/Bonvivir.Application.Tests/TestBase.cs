using System;
using Microsoft.EntityFrameworkCore;
using Bonvivir.Persistance;

namespace Bonvivir.Application.Tests
{
    public class TestBase
    {
        public BonvivirDbContext MySQLContext() 
        {
            var builder = new DbContextOptionsBuilder<BonvivirDbContext>();
           
            builder.UseInMemoryDatabase(Guid.NewGuid().ToString());
            
            var dbContext = new BonvivirDbContext(builder.Options);

            dbContext.Database.EnsureCreated();

            return dbContext;
        }
    }
}