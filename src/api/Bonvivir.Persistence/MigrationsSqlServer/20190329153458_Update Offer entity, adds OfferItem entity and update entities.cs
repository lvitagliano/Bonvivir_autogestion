using System;
using Microsoft.EntityFrameworkCore.Metadata;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.Persistence.Migrations
{
    public partial class UpdateOfferentityaddsOfferItementityandupdateentities : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "BottlesQuantity",
                table: "Offers");

            migrationBuilder.DropColumn(
                name: "Code",
                table: "Offers");

            migrationBuilder.DropColumn(
                name: "Price",
                table: "Offers");

            migrationBuilder.DropColumn(
                name: "Selection",
                table: "Offers");

            migrationBuilder.DropColumn(
                name: "Source",
                table: "Offers");

            migrationBuilder.RenameColumn(
                name: "ID",
                table: "Offers",
                newName: "Id");

            migrationBuilder.AlterColumn<Guid>(
                name: "SchemaId",
                table: "Subscriptions",
                nullable: false,
                oldClrType: typeof(string),
                oldNullable: true);

            migrationBuilder.AlterColumn<Guid>(
                name: "PromotionId",
                table: "Subscriptions",
                nullable: false,
                oldClrType: typeof(string),
                oldNullable: true);

            migrationBuilder.AlterColumn<Guid>(
                name: "PaymentMethodId",
                table: "Subscriptions",
                nullable: false,
                oldClrType: typeof(string),
                oldNullable: true);

            migrationBuilder.AddColumn<bool>(
                name: "IsOrganic",
                table: "Offers",
                nullable: false,
                defaultValue: false);

            migrationBuilder.AlterColumn<DateTime>(
                name: "BirthDate",
                table: "Customers",
                nullable: false,
                oldClrType: typeof(string),
                oldNullable: true);

            migrationBuilder.AddColumn<Guid>(
                name: "BonvivirId",
                table: "Customers",
                nullable: false,
                defaultValue: new Guid("00000000-0000-0000-0000-000000000000"));

            migrationBuilder.CreateTable(
                name: "OfferItem",
                columns: table => new
                {
                    Id = table.Column<int>(nullable: false)
                        .Annotation("SqlServer:ValueGenerationStrategy", SqlServerValueGenerationStrategy.IdentityColumn),
                    Selection = table.Column<int>(nullable: false),
                    Title = table.Column<string>(nullable: true),
                    Description = table.Column<string>(nullable: true),
                    DesktopImage = table.Column<byte[]>(nullable: true),
                    MobileImage = table.Column<byte[]>(nullable: true),
                    Guid = table.Column<Guid>(nullable: false),
                    Price = table.Column<decimal>(nullable: false),
                    ClubLaNacionId = table.Column<Guid>(nullable: false),
                    ClubLaNacionPrice = table.Column<decimal>(nullable: false),
                    TierraDelFuegoId = table.Column<Guid>(nullable: false),
                    TierraDelFuegoPrice = table.Column<decimal>(nullable: false),
                    SchemaId = table.Column<Guid>(nullable: false),
                    OfferId = table.Column<int>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_OfferItem", x => x.Id);
                    table.ForeignKey(
                        name: "FK_OfferItem_Offers_OfferId",
                        column: x => x.OfferId,
                        principalTable: "Offers",
                        principalColumn: "Id",
                        onDelete: ReferentialAction.Restrict);
                });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                columns: new[] { "CreatedDate", "Description" },
                values: new object[] { new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(204), "Oferta 1" });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                columns: new[] { "CreatedDate", "Description" },
                values: new object[] { new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(870), "Oferta 2" });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                columns: new[] { "CreatedDate", "Description" },
                values: new object[] { new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(877), "Oferta 3" });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                columns: new[] { "CreatedDate", "Description" },
                values: new object[] { new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(881), "Oferta 4" });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                columns: new[] { "CreatedDate", "Description" },
                values: new object[] { new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(884), "Oferta 5" });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                columns: new[] { "CreatedDate", "Description" },
                values: new object[] { new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(888), "Oferta 6" });

            migrationBuilder.CreateIndex(
                name: "IX_OfferItem_OfferId",
                table: "OfferItem",
                column: "OfferId");
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "OfferItem");

            migrationBuilder.DropColumn(
                name: "IsOrganic",
                table: "Offers");

            migrationBuilder.DropColumn(
                name: "BonvivirId",
                table: "Customers");

            migrationBuilder.RenameColumn(
                name: "Id",
                table: "Offers",
                newName: "ID");

            migrationBuilder.AlterColumn<string>(
                name: "SchemaId",
                table: "Subscriptions",
                nullable: true,
                oldClrType: typeof(Guid));

            migrationBuilder.AlterColumn<string>(
                name: "PromotionId",
                table: "Subscriptions",
                nullable: true,
                oldClrType: typeof(Guid));

            migrationBuilder.AlterColumn<string>(
                name: "PaymentMethodId",
                table: "Subscriptions",
                nullable: true,
                oldClrType: typeof(Guid));

            migrationBuilder.AddColumn<int>(
                name: "BottlesQuantity",
                table: "Offers",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AddColumn<string>(
                name: "Code",
                table: "Offers",
                nullable: true);

            migrationBuilder.AddColumn<decimal>(
                name: "Price",
                table: "Offers",
                nullable: false,
                defaultValue: 0m);

            migrationBuilder.AddColumn<int>(
                name: "Selection",
                table: "Offers",
                nullable: false,
                defaultValue: 0);

            migrationBuilder.AddColumn<string>(
                name: "Source",
                table: "Offers",
                nullable: true);

            migrationBuilder.AlterColumn<string>(
                name: "BirthDate",
                table: "Customers",
                nullable: true,
                oldClrType: typeof(DateTime));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 1,
                columns: new[] { "CreatedDate", "Description", "Price" },
                values: new object[] { new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(1855), null, 890m });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 2,
                columns: new[] { "CreatedDate", "Description", "Price", "Selection" },
                values: new object[] { new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2257), null, 1659m, 1 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 3,
                columns: new[] { "CreatedDate", "Description", "Price", "Selection" },
                values: new object[] { new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2260), null, 1659m, 2 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 4,
                columns: new[] { "CreatedDate", "Description", "Price", "Selection" },
                values: new object[] { new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2264), null, 1110m, 3 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 5,
                columns: new[] { "CreatedDate", "Description", "Price", "Selection" },
                values: new object[] { new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2267), null, 2125m, 4 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 6,
                columns: new[] { "CreatedDate", "Description", "Price" },
                values: new object[] { new DateTime(2019, 3, 28, 12, 51, 43, 142, DateTimeKind.Local).AddTicks(2271), null, 790m });
        }
    }
}
