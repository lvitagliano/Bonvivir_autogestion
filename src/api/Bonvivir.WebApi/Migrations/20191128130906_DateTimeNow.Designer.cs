﻿// <auto-generated />
using System;
using Bonvivir.Persistance;
using Microsoft.EntityFrameworkCore;
using Microsoft.EntityFrameworkCore.Infrastructure;
using Microsoft.EntityFrameworkCore.Migrations;
using Microsoft.EntityFrameworkCore.Storage.ValueConversion;

namespace Bonvivir.WebApi.Migrations
{
    [DbContext(typeof(BonvivirDbContext))]
    [Migration("20191128130906_DateTimeNow")]
    partial class DateTimeNow
    {
        protected override void BuildTargetModel(ModelBuilder modelBuilder)
        {
#pragma warning disable 612, 618
            modelBuilder
                .HasAnnotation("ProductVersion", "2.2.6-servicing-10079");

            modelBuilder.Entity("Bonvivir.Domain.Entities.Address", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<string>("Apartment");

                    b.Property<string>("City");

                    b.Property<DateTime>("CreatedAt");

                    b.Property<string>("District");

                    b.Property<string>("DoorNumber");

                    b.Property<string>("Floor");

                    b.Property<string>("State");

                    b.Property<string>("Street");

                    b.Property<DateTime>("UpdatedAt");

                    b.Property<string>("ZipCode");

                    b.Property<string>("Zone");

                    b.HasKey("Id");

                    b.ToTable("Addresses");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.Customer", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<string>("Address");

                    b.Property<DateTime>("BirthDate");

                    b.Property<byte[]>("BonvivirId")
                        .IsRequired()
                        .HasConversion(new ValueConverter<byte[], byte[]>(v => default(byte[]), v => default(byte[]), new ConverterMappingHints(size: 16)));

                    b.Property<string>("BusinessUnit");

                    b.Property<DateTime>("CreatedAt");

                    b.Property<string>("Email");

                    b.Property<string>("FirstName");

                    b.Property<string>("Gender");

                    b.Property<string>("IdNumber");

                    b.Property<string>("IdType");

                    b.Property<string>("LastName");

                    b.Property<string>("Phone");

                    b.Property<string>("TaxType");

                    b.Property<DateTime>("UpdatedAt");

                    b.HasKey("Id");

                    b.ToTable("Customers");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.Lead", b =>
                {
                    b.Property<string>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<byte[]>("Campaign")
                        .IsRequired()
                        .HasConversion(new ValueConverter<byte[], byte[]>(v => default(byte[]), v => default(byte[]), new ConverterMappingHints(size: 16)));

                    b.Property<DateTime>("CreatedAt");

                    b.Property<string>("Email");

                    b.Property<string>("FirstName");

                    b.Property<string>("LastName");

                    b.Property<string>("MobileNumber");

                    b.Property<string>("PhoneNumber");

                    b.Property<string>("Subject");

                    b.Property<DateTime>("UpdatedAt");

                    b.HasKey("Id");

                    b.ToTable("Leads");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.Offer", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<DateTime>("CreatedAt");

                    b.Property<string>("CreatedBy");

                    b.Property<DateTime>("CreatedDate");

                    b.Property<string>("Description")
                        .IsRequired();

                    b.Property<short>("IsOrganic")
                        .HasColumnType("bit");

                    b.Property<string>("ModifiedBy");

                    b.Property<DateTime?>("ModifiedDate");

                    b.Property<string>("Title")
                        .IsRequired();

                    b.Property<DateTime>("UpdatedAt");

                    b.HasKey("Id");

                    b.ToTable("Offers");

                    b.HasData(
                        new
                        {
                            Id = 1,
                            CreatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 614, DateTimeKind.Local).AddTicks(3862),
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(402),
                            Description = "Oferta 1",
                            IsOrganic = (short)0,
                            Title = "Oferta 1",
                            UpdatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 614, DateTimeKind.Local).AddTicks(8858)
                        },
                        new
                        {
                            Id = 2,
                            CreatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(670),
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(691),
                            Description = "Oferta 2",
                            IsOrganic = (short)0,
                            Title = "Oferta 2",
                            UpdatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(671)
                        },
                        new
                        {
                            Id = 3,
                            CreatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(695),
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(697),
                            Description = "Oferta 3",
                            IsOrganic = (short)0,
                            Title = "Oferta 3",
                            UpdatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(695)
                        },
                        new
                        {
                            Id = 4,
                            CreatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(697),
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(699),
                            Description = "Oferta 4",
                            IsOrganic = (short)0,
                            Title = "Oferta 4",
                            UpdatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(698)
                        },
                        new
                        {
                            Id = 5,
                            CreatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(699),
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(701),
                            Description = "Oferta 5",
                            IsOrganic = (short)0,
                            Title = "Oferta 5",
                            UpdatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(700)
                        },
                        new
                        {
                            Id = 6,
                            CreatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(701),
                            CreatedBy = "Seed",
                            CreatedDate = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(703),
                            Description = "Oferta 6",
                            IsOrganic = (short)0,
                            Title = "Oferta 6 Exclusive Promo",
                            UpdatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(702)
                        });
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.OfferItem", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<decimal>("BasePrice");

                    b.Property<byte[]>("BasePriceId")
                        .IsRequired()
                        .HasConversion(new ValueConverter<byte[], byte[]>(v => default(byte[]), v => default(byte[]), new ConverterMappingHints(size: 16)));

                    b.Property<byte[]>("ClubLaNacionId")
                        .IsRequired()
                        .HasConversion(new ValueConverter<byte[], byte[]>(v => default(byte[]), v => default(byte[]), new ConverterMappingHints(size: 16)));

                    b.Property<decimal>("ClubLaNacionPrice");

                    b.Property<DateTime>("CreatedAt");

                    b.Property<string>("Description");

                    b.Property<byte[]>("DesktopImage");

                    b.Property<byte[]>("MobileImage");

                    b.Property<int>("OfferId");

                    b.Property<byte[]>("SchemaId")
                        .IsRequired()
                        .HasConversion(new ValueConverter<byte[], byte[]>(v => default(byte[]), v => default(byte[]), new ConverterMappingHints(size: 16)));

                    b.Property<int>("Selection");

                    b.Property<byte[]>("TierraDelFuegoId")
                        .IsRequired()
                        .HasConversion(new ValueConverter<byte[], byte[]>(v => default(byte[]), v => default(byte[]), new ConverterMappingHints(size: 16)));

                    b.Property<decimal>("TierraDelFuegoPrice");

                    b.Property<string>("Title");

                    b.Property<DateTime>("UpdatedAt");

                    b.HasKey("Id");

                    b.HasIndex("OfferId");

                    b.ToTable("OfferItems");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.Subscription", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<int?>("AddressId");

                    b.Property<string>("ClubLaNacionCard");

                    b.Property<DateTime>("CreatedAt");

                    b.Property<string>("CreditCard");

                    b.Property<int?>("CustomerId");

                    b.Property<string>("ExternalId");

                    b.Property<string>("Name");

                    b.Property<byte[]>("PaymentMethodId")
                        .IsRequired()
                        .HasConversion(new ValueConverter<byte[], byte[]>(v => default(byte[]), v => default(byte[]), new ConverterMappingHints(size: 16)));

                    b.Property<byte[]>("PromotionId")
                        .IsRequired()
                        .HasConversion(new ValueConverter<byte[], byte[]>(v => default(byte[]), v => default(byte[]), new ConverterMappingHints(size: 16)));

                    b.Property<byte[]>("SchemaId")
                        .IsRequired()
                        .HasConversion(new ValueConverter<byte[], byte[]>(v => default(byte[]), v => default(byte[]), new ConverterMappingHints(size: 16)));

                    b.Property<DateTime>("UpdatedAt");

                    b.HasKey("Id");

                    b.HasIndex("AddressId");

                    b.HasIndex("CustomerId");

                    b.ToTable("Subscriptions");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.User", b =>
                {
                    b.Property<string>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<DateTime>("CreatedAt");

                    b.Property<string>("Password");

                    b.Property<DateTime>("UpdatedAt");

                    b.Property<string>("Username");

                    b.HasKey("Id");

                    b.ToTable("Users");

                    b.HasData(
                        new
                        {
                            Id = "1",
                            CreatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 616, DateTimeKind.Local).AddTicks(5098),
                            Password = "sQDDb3f8Y7iB4OsAYCtSnMFWTxu7/Drq4iaUpVXbqwo=",
                            UpdatedAt = new DateTime(2019, 11, 28, 10, 9, 5, 616, DateTimeKind.Local).AddTicks(5102),
                            Username = "admin"
                        });
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityRole", b =>
                {
                    b.Property<string>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<string>("ConcurrencyStamp")
                        .IsConcurrencyToken();

                    b.Property<string>("Name")
                        .HasMaxLength(256);

                    b.Property<string>("NormalizedName")
                        .HasMaxLength(256);

                    b.HasKey("Id");

                    b.HasIndex("NormalizedName")
                        .IsUnique()
                        .HasName("RoleNameIndex");

                    b.ToTable("AspNetRoles");
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityRoleClaim<string>", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<string>("ClaimType");

                    b.Property<string>("ClaimValue");

                    b.Property<string>("RoleId")
                        .IsRequired();

                    b.HasKey("Id");

                    b.HasIndex("RoleId");

                    b.ToTable("AspNetRoleClaims");
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityUser", b =>
                {
                    b.Property<string>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<int>("AccessFailedCount");

                    b.Property<string>("ConcurrencyStamp")
                        .IsConcurrencyToken();

                    b.Property<string>("Email")
                        .HasMaxLength(256);

                    b.Property<bool>("EmailConfirmed");

                    b.Property<bool>("LockoutEnabled");

                    b.Property<DateTimeOffset?>("LockoutEnd");

                    b.Property<string>("NormalizedEmail")
                        .HasMaxLength(256);

                    b.Property<string>("NormalizedUserName")
                        .HasMaxLength(256);

                    b.Property<string>("PasswordHash");

                    b.Property<string>("PhoneNumber");

                    b.Property<bool>("PhoneNumberConfirmed");

                    b.Property<string>("SecurityStamp");

                    b.Property<bool>("TwoFactorEnabled");

                    b.Property<string>("UserName")
                        .HasMaxLength(256);

                    b.HasKey("Id");

                    b.HasIndex("NormalizedEmail")
                        .HasName("EmailIndex");

                    b.HasIndex("NormalizedUserName")
                        .IsUnique()
                        .HasName("UserNameIndex");

                    b.ToTable("AspNetUsers");
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityUserClaim<string>", b =>
                {
                    b.Property<int>("Id")
                        .ValueGeneratedOnAdd();

                    b.Property<string>("ClaimType");

                    b.Property<string>("ClaimValue");

                    b.Property<string>("UserId")
                        .IsRequired();

                    b.HasKey("Id");

                    b.HasIndex("UserId");

                    b.ToTable("AspNetUserClaims");
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityUserLogin<string>", b =>
                {
                    b.Property<string>("LoginProvider")
                        .HasMaxLength(128);

                    b.Property<string>("ProviderKey")
                        .HasMaxLength(128);

                    b.Property<string>("ProviderDisplayName");

                    b.Property<string>("UserId")
                        .IsRequired();

                    b.HasKey("LoginProvider", "ProviderKey");

                    b.HasIndex("UserId");

                    b.ToTable("AspNetUserLogins");
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityUserRole<string>", b =>
                {
                    b.Property<string>("UserId");

                    b.Property<string>("RoleId");

                    b.HasKey("UserId", "RoleId");

                    b.HasIndex("RoleId");

                    b.ToTable("AspNetUserRoles");
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityUserToken<string>", b =>
                {
                    b.Property<string>("UserId");

                    b.Property<string>("LoginProvider")
                        .HasMaxLength(128);

                    b.Property<string>("Name")
                        .HasMaxLength(128);

                    b.Property<string>("Value");

                    b.HasKey("UserId", "LoginProvider", "Name");

                    b.ToTable("AspNetUserTokens");
                });

            modelBuilder.Entity("Bonvivir.Domain.Entities.OfferItem", b =>
                {
                    b.HasOne("Bonvivir.Domain.Entities.Offer")
                        .WithMany("Items")
                        .HasForeignKey("OfferId")
                        .OnDelete(DeleteBehavior.Cascade);
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

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityRoleClaim<string>", b =>
                {
                    b.HasOne("Microsoft.AspNetCore.Identity.IdentityRole")
                        .WithMany()
                        .HasForeignKey("RoleId")
                        .OnDelete(DeleteBehavior.Cascade);
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityUserClaim<string>", b =>
                {
                    b.HasOne("Microsoft.AspNetCore.Identity.IdentityUser")
                        .WithMany()
                        .HasForeignKey("UserId")
                        .OnDelete(DeleteBehavior.Cascade);
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityUserLogin<string>", b =>
                {
                    b.HasOne("Microsoft.AspNetCore.Identity.IdentityUser")
                        .WithMany()
                        .HasForeignKey("UserId")
                        .OnDelete(DeleteBehavior.Cascade);
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityUserRole<string>", b =>
                {
                    b.HasOne("Microsoft.AspNetCore.Identity.IdentityRole")
                        .WithMany()
                        .HasForeignKey("RoleId")
                        .OnDelete(DeleteBehavior.Cascade);

                    b.HasOne("Microsoft.AspNetCore.Identity.IdentityUser")
                        .WithMany()
                        .HasForeignKey("UserId")
                        .OnDelete(DeleteBehavior.Cascade);
                });

            modelBuilder.Entity("Microsoft.AspNetCore.Identity.IdentityUserToken<string>", b =>
                {
                    b.HasOne("Microsoft.AspNetCore.Identity.IdentityUser")
                        .WithMany()
                        .HasForeignKey("UserId")
                        .OnDelete(DeleteBehavior.Cascade);
                });
#pragma warning restore 612, 618
        }
    }
}
