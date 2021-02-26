using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.WebApi.Migrations
{
    public partial class InitialMySql : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "Addresses",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("MySQL:AutoIncrement", true),
                    Street = table.Column<string>(nullable: true),
                    DoorNumber = table.Column<string>(nullable: true),
                    Floor = table.Column<string>(nullable: true),
                    Apartment = table.Column<string>(nullable: true),
                    District = table.Column<string>(nullable: true),
                    Zone = table.Column<string>(nullable: true),
                    City = table.Column<string>(nullable: true),
                    State = table.Column<string>(nullable: true),
                    ZipCode = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Addresses", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "AspNetRoles",
                columns: table => new
                {
                    Id = table.Column<string>(nullable: false),
                    Name = table.Column<string>(maxLength: 256, nullable: true),
                    NormalizedName = table.Column<string>(maxLength: 256, nullable: true),
                    ConcurrencyStamp = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetRoles", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUsers",
                columns: table => new
                {
                    Id = table.Column<string>(nullable: false),
                    UserName = table.Column<string>(maxLength: 256, nullable: true),
                    NormalizedUserName = table.Column<string>(maxLength: 256, nullable: true),
                    Email = table.Column<string>(maxLength: 256, nullable: true),
                    NormalizedEmail = table.Column<string>(maxLength: 256, nullable: true),
                    EmailConfirmed = table.Column<short>(nullable: false),
                    PasswordHash = table.Column<string>(nullable: true),
                    SecurityStamp = table.Column<string>(nullable: true),
                    ConcurrencyStamp = table.Column<string>(nullable: true),
                    PhoneNumber = table.Column<string>(nullable: true),
                    PhoneNumberConfirmed = table.Column<short>(nullable: false),
                    TwoFactorEnabled = table.Column<short>(nullable: false),
                    LockoutEnd = table.Column<DateTimeOffset>(nullable: true),
                    LockoutEnabled = table.Column<short>(nullable: false),
                    AccessFailedCount = table.Column<int>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUsers", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Customers",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("MySQL:AutoIncrement", true),
                    BonvivirId = table.Column<byte[]>(nullable: false),
                    FirstName = table.Column<string>(nullable: true),
                    LastName = table.Column<string>(nullable: true),
                    IdNumber = table.Column<string>(nullable: true),
                    BirthDate = table.Column<DateTime>(nullable: false),
                    Email = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Customers", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Leads",
                columns: table => new
                {
                    Id = table.Column<string>(nullable: false),
                    FirstName = table.Column<string>(nullable: true),
                    LastName = table.Column<string>(nullable: true),
                    Email = table.Column<string>(nullable: true),
                    PhoneNumber = table.Column<string>(nullable: true),
                    MobileNumber = table.Column<string>(nullable: true),
                    Campaign = table.Column<byte[]>(nullable: false),
                    Subject = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Leads", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Offers",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("MySQL:AutoIncrement", true),
                    CreatedDate = table.Column<DateTime>(nullable: false),
                    ModifiedDate = table.Column<DateTime>(nullable: true),
                    CreatedBy = table.Column<string>(nullable: true),
                    ModifiedBy = table.Column<string>(nullable: true),
                    Title = table.Column<string>(nullable: false),
                    Description = table.Column<string>(nullable: false),
                    IsOrganic = table.Column<int>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Offers", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Users",
                columns: table => new
                {
                    Id = table.Column<string>(nullable: false),
                    Username = table.Column<string>(nullable: true),
                    Password = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Users", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "AspNetRoleClaims",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("MySQL:AutoIncrement", true),
                    RoleId = table.Column<string>(nullable: false),
                    ClaimType = table.Column<string>(nullable: true),
                    ClaimValue = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetRoleClaims", x => x.Id);
                    table.ForeignKey(
                        name: "FK_AspNetRoleClaims_AspNetRoles_RoleId",
                        column: x => x.RoleId,
                        principalTable: "AspNetRoles",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUserClaims",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("MySQL:AutoIncrement", true),
                    UserId = table.Column<string>(nullable: false),
                    ClaimType = table.Column<string>(nullable: true),
                    ClaimValue = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUserClaims", x => x.Id);
                    table.ForeignKey(
                        name: "FK_AspNetUserClaims_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUserLogins",
                columns: table => new
                {
                    LoginProvider = table.Column<string>(maxLength: 128, nullable: false),
                    ProviderKey = table.Column<string>(maxLength: 128, nullable: false),
                    ProviderDisplayName = table.Column<string>(nullable: true),
                    UserId = table.Column<string>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUserLogins", x => new { x.LoginProvider, x.ProviderKey });
                    table.ForeignKey(
                        name: "FK_AspNetUserLogins_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUserRoles",
                columns: table => new
                {
                    UserId = table.Column<string>(nullable: false),
                    RoleId = table.Column<string>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUserRoles", x => new { x.UserId, x.RoleId });
                    table.ForeignKey(
                        name: "FK_AspNetUserRoles_AspNetRoles_RoleId",
                        column: x => x.RoleId,
                        principalTable: "AspNetRoles",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                    table.ForeignKey(
                        name: "FK_AspNetUserRoles_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "AspNetUserTokens",
                columns: table => new
                {
                    UserId = table.Column<string>(nullable: false),
                    LoginProvider = table.Column<string>(maxLength: 128, nullable: false),
                    Name = table.Column<string>(maxLength: 128, nullable: false),
                    Value = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_AspNetUserTokens", x => new { x.UserId, x.LoginProvider, x.Name });
                    table.ForeignKey(
                        name: "FK_AspNetUserTokens_AspNetUsers_UserId",
                        column: x => x.UserId,
                        principalTable: "AspNetUsers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.CreateTable(
                name: "Subscriptions",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("MySQL:AutoIncrement", true),
                    Name = table.Column<string>(nullable: true),
                    PromotionId = table.Column<byte[]>(nullable: false),
                    SchemaId = table.Column<byte[]>(nullable: false),
                    CustomerId = table.Column<int>(nullable: true),
                    PaymentMethodId = table.Column<byte[]>(nullable: false),
                    ExternalId = table.Column<string>(nullable: true),
                    AddressId = table.Column<int>(nullable: true),
                    CreditCard = table.Column<string>(nullable: true),
                    ClubLaNacionCard = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Subscriptions", x => x.Id);
                    table.ForeignKey(
                        name: "FK_Subscriptions_Addresses_AddressId",
                        column: x => x.AddressId,
                        principalTable: "Addresses",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Restrict);
                    table.ForeignKey(
                        name: "FK_Subscriptions_Customers_CustomerId",
                        column: x => x.CustomerId,
                        principalTable: "Customers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Restrict);
                });

            migrationBuilder.CreateTable(
                name: "OfferItems",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("MySQL:AutoIncrement", true),
                    OfferId = table.Column<int>(nullable: false),
                    Selection = table.Column<int>(nullable: false),
                    Title = table.Column<string>(nullable: true),
                    Description = table.Column<string>(nullable: true),
                    DesktopImage = table.Column<byte[]>(nullable: true),
                    MobileImage = table.Column<byte[]>(nullable: true),
                    BasePriceId = table.Column<byte[]>(nullable: false),
                    BasePrice = table.Column<decimal>(nullable: false),
                    ClubLaNacionId = table.Column<byte[]>(nullable: false),
                    ClubLaNacionPrice = table.Column<decimal>(nullable: false),
                    TierraDelFuegoId = table.Column<byte[]>(nullable: false),
                    TierraDelFuegoPrice = table.Column<decimal>(nullable: false),
                    SchemaId = table.Column<byte[]>(nullable: false)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_OfferItems", x => x.Id);
                    table.ForeignKey(
                        name: "FK_OfferItems_Offers_OfferId",
                        column: x => x.OfferId,
                        principalTable: "Offers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Cascade);
                });

            migrationBuilder.InsertData(
                table: "Offers",
                columns: new[] { "Id", "CreatedBy", "CreatedDate", "Description", "IsOrganic", "ModifiedBy", "ModifiedDate", "Title" },
                values: new object[,]
                {
                    { 1, "Seed", new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(8760), "Oferta 1", 0, null, null, "Oferta 1" },
                    { 2, "Seed", new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9040), "Oferta 2", 0, null, null, "Oferta 2" },
                    { 3, "Seed", new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9045), "Oferta 3", 0, null, null, "Oferta 3" },
                    { 4, "Seed", new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9047), "Oferta 4", 0, null, null, "Oferta 4" },
                    { 5, "Seed", new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9048), "Oferta 5", 0, null, null, "Oferta 5" },
                    { 6, "Seed", new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9049), "Oferta 6", 0, null, null, "Oferta 6 Exclusive Promo" }
                });

            migrationBuilder.CreateIndex(
                name: "IX_AspNetRoleClaims_RoleId",
                table: "AspNetRoleClaims",
                column: "RoleId");

            migrationBuilder.CreateIndex(
                name: "RoleNameIndex",
                table: "AspNetRoles",
                column: "NormalizedName",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_AspNetUserClaims_UserId",
                table: "AspNetUserClaims",
                column: "UserId");

            migrationBuilder.CreateIndex(
                name: "IX_AspNetUserLogins_UserId",
                table: "AspNetUserLogins",
                column: "UserId");

            migrationBuilder.CreateIndex(
                name: "IX_AspNetUserRoles_RoleId",
                table: "AspNetUserRoles",
                column: "RoleId");

            migrationBuilder.CreateIndex(
                name: "EmailIndex",
                table: "AspNetUsers",
                column: "NormalizedEmail");

            migrationBuilder.CreateIndex(
                name: "UserNameIndex",
                table: "AspNetUsers",
                column: "NormalizedUserName",
                unique: true);

            migrationBuilder.CreateIndex(
                name: "IX_OfferItems_OfferId",
                table: "OfferItems",
                column: "OfferId");

            migrationBuilder.CreateIndex(
                name: "IX_Subscriptions_AddressId",
                table: "Subscriptions",
                column: "AddressId");

            migrationBuilder.CreateIndex(
                name: "IX_Subscriptions_CustomerId",
                table: "Subscriptions",
                column: "CustomerId");

                 migrationBuilder.AlterColumn<byte[]> (
                name: "MobileImage",
                table: "OfferItems",
                type: "MediumBlob",
                nullable : true,
                oldClrType : typeof (byte[]),
                oldNullable : true);

            migrationBuilder.AlterColumn<byte[]> (
                name: "DesktopImage",
                table: "OfferItems",
                type: "MediumBlob",
                nullable : true,
                oldClrType : typeof (byte[]),
                oldNullable : true);

        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "AspNetRoleClaims");

            migrationBuilder.DropTable(
                name: "AspNetUserClaims");

            migrationBuilder.DropTable(
                name: "AspNetUserLogins");

            migrationBuilder.DropTable(
                name: "AspNetUserRoles");

            migrationBuilder.DropTable(
                name: "AspNetUserTokens");

            migrationBuilder.DropTable(
                name: "Leads");

            migrationBuilder.DropTable(
                name: "OfferItems");

            migrationBuilder.DropTable(
                name: "Subscriptions");

            migrationBuilder.DropTable(
                name: "Users");

            migrationBuilder.DropTable(
                name: "AspNetRoles");

            migrationBuilder.DropTable(
                name: "AspNetUsers");

            migrationBuilder.DropTable(
                name: "Offers");

            migrationBuilder.DropTable(
                name: "Addresses");

            migrationBuilder.DropTable(
                name: "Customers");
        }
    }
}
