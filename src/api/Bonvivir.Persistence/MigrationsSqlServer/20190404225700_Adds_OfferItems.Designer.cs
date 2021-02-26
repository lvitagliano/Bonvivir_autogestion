﻿// <auto-generated />
using System;
using Bonvivir.Persistance;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Migrations;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;

namespace Bonvivir.Persistence.Migrations
{
    [DbContext(typeof(BonvivirDbContext))]
    [Migration("20190404225700_Adds_OfferItems")]
    partial class Adds_OfferItems
    {
        protected override void BuildTargetModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder
                .HasAnnotation("ProductVersion", "2.2.2-servicing-10034")
                .HasAnnotation("Relational:MaxIdentifierLength", 128)
                .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

            modelBuilder.Entity("Bonvivir.Domain.Entities.Address", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("Apartment");

                    b.Property<string>("City");

                    b.Property<string>("District");

                    b.Property<string>("DoorNumber");

                    b.Property<string>("Floor");

                    b.Property<string>("State");

                    b.Property<string>("Street");

                    b.Property<string>("ZipCode");

                    b.Property<string>("Zone");

                    b.HasKey("Id");

                    b.ToTable("Addresses");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.Customer", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<DateTime>("BirthDate");

                    b.Property<Guid>("BonvivirId");

                    b.Property<string>("Email");

                    b.Property<string>("FirstName");

                    b.Property<string>("IdNumber");

                    b.Property<string>("LastName");

                    b.HasKey("Id");

                    b.ToTable("Customers");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.Offer", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<string>("CreatedBy");

                    b.Property<DateTime>("CreatedDate");

                    b.Property<string>("Description")
                        .IsRequired();

                    b.Property<bool>("IsOrganic");

                    b.Property<string>("ModifiedBy");

                    b.Property<DateTime?>("ModifiedDate");

                    b.Property<string>("Title")
                        .IsRequired();

                    b.HasKey("Id");

                    b.ToTable("Offers");

                    b.HasData(
                        new
                        {
                            Id = 1,
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9068),
                            Description = "Oferta 1",
                            IsOrganic = false,
                            Title = "Oferta 1"
                        },
                        new
                        {
                            Id = 2,
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9770),
                            Description = "Oferta 2",
                            IsOrganic = false,
                            Title = "Oferta 2"
                        },
                        new
                        {
                            Id = 3,
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9777),
                            Description = "Oferta 3",
                            IsOrganic = false,
                            Title = "Oferta 3"
                        },
                        new
                        {
                            Id = 4,
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9777),
                            Description = "Oferta 4",
                            IsOrganic = false,
                            Title = "Oferta 4"
                        },
                        new
                        {
                            Id = 5,
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9777),
                            Description = "Oferta 5",
                            IsOrganic = false,
                            Title = "Oferta 5"
                        },
                        new
                        {
                            Id = 6,
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9780),
                            Description = "Oferta 6",
                            IsOrganic = false,
                            Title = "Oferta 6 Exclusive Promo"
                        });
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.OfferItem", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<decimal>("BasePrice");

                    b.Property<Guid>("BasePriceId");

                    b.Property<Guid>("ClubLaNacionId");

                    b.Property<decimal>("ClubLaNacionPrice");

                    b.Property<string>("Description");

                    b.Property<byte[]>("DesktopImage");

                    b.Property<byte[]>("MobileImage");

                    b.Property<int?>("OfferId");

                    b.Property<Guid>("SchemaId");

                    b.Property<int>("Selection");

                    b.Property<Guid>("TierraDelFuegoId");

                    b.Property<decimal>("TierraDelFuegoPrice");

                    b.Property<string>("Title");

                    b.HasKey("Id");

                    b.HasIndex("OfferId");

                    b.ToTable("OfferItems");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.Subscription", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd()
                        .HasAnnotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn);

                    b.Property<int?>("AddressId");

                    b.Property<string>("ClubLaNacionCard");

                    b.Property<string>("CreditCard");

                    b.Property<int?>("CustomerId");

                    b.Property<string>("ExternalId");

                    b.Property<string>("Name");

                    b.Property<Guid>("PaymentMethodId");

                    b.Property<Guid>("PromotionId");

                    b.Property<Guid>("SchemaId");

                    b.HasKey("Id");

                    b.HasIndex("AddressId");

                    b.HasIndex("CustomerId");

                    b.ToTable("Subscriptions");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.OfferItem", b =>
                {
                    b.HasOne("Bonvivir.Domain.Entities.Offer")
                        .WithMany("Items")
                        .HasForeignKey("OfferId");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.Subscription", b =>
                {
                    b.HasOne("Bonvivir.Domain.Entities.Address", "Address")
                        .WithMany()
                        .HasForeignKey("AddressId");

                    b.HasOne("Bonvivir.Domain.Entities.Customer", "Customer")
                        .WithMany()
                        .HasForeignKey("CustomerId");
                });
#pragma warning restore 612, 618
        }
    }
}