using System;
using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.Persistence.Migrations
{
    public partial class AddsSubscriptionAddressandCustomerentities : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<int>(
                name: "BottlesQuantity",
                table: "Offers",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AddColumn<string>(
                name: "Code",
                table: "Offers",
                nullable: true);

            migrationBuilder.CreateTable(
                name: "Addresses",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
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
                name: "Customers",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    FirstName = table.Column<string>(nullable: true),
                    LastName = table.Column<string>(nullable: true),
                    IdNumber = table.Column<string>(nullable: true),
                    BirthDate = table.Column<string>(nullable: true),
                    Email = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Customers", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Subscriptions",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    Name = table.Column<string>(nullable: true),
                    PromotionId = table.Column<string>(nullable: true),
                    SchemaId = table.Column<string>(nullable: true),
                    CustomerId = table.Column<int>(nullable: true),
                    PaymentMethodId = table.Column<string>(nullable: true),
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

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(1855));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2257));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2260));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2264));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2267));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2271));

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
                name: "Subscriptions");

            migrationBuilder.DropTable(
                name: "Addresses");

            migrationBuilder.DropTable(
                name: "Customers");

            migrationBuilder.DropColumn(
                name: "BottlesQuantity",
                table: "Offers");

            migrationBuilder.DropColumn(
                name: "Code",
                table: "Offers");

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 8, 12, 7, 53, 978, DateTimeKind.Local).AddTicks(4607));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 8, 12, 7, 53, 978, DateTimeKind.Local).AddTicks(5393));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 8, 12, 7, 53, 978, DateTimeKind.Local).AddTicks(5400));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 8, 12, 7, 53, 978, DateTimeKind.Local).AddTicks(5404));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 8, 12, 7, 53, 978, DateTimeKind.Local).AddTicks(5404));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 8, 12, 7, 53, 978, DateTimeKind.Local).AddTicks(5407));
        }
    }
}
