using Microsoft.EntityFrameworkCore;
using Bonvivir.Domain.Entities;
using Bonvivir.Persistence.Seed;
using Microsoft.AspNetCore.Identity.EntityFrameworkCore;

namespace Bonvivir.Persistance
{
    public class BonvivirDbContext : IdentityDbContext
    {
        public DbSet<Offer> Offers { get; set; }

        public DbSet<Subscription> Subscriptions { get; set; }

        public DbSet<Customer> Customers { get; set; }

        public DbSet<Address> Addresses { get; set; }

        public DbSet<OfferItem> OfferItems { get; set; }

        public DbSet<Lead> Leads { get; set; }

        public new DbSet<User> Users { get; set; }

        public DbSet<Referrer> Referrers { get; set; }

        public BonvivirDbContext(DbContextOptions<BonvivirDbContext> options)
            : base(options)
        {
        }

        protected override void OnModelCreating(ModelBuilder modelBuilder)
        {
            base.OnModelCreating(modelBuilder);

            modelBuilder.Entity<Offer>()
                  .Property(p => p.IsOrganic)
                  .HasColumnType("bit");

            modelBuilder.Entity<Subscription>()
                  .Property(p => p.Retry)
                  .HasColumnType("bit");

            modelBuilder.SeedAll();

            modelBuilder.ApplyConfigurationsFromAssembly(typeof(BonvivirDbContext).Assembly);
        }

    }
}