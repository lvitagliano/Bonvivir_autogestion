using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.Persistence.Migrations
{
    public partial class SeedOffers : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.InsertData(
                table: "Offers",
                columns: new[] { "ID", "CreatedBy", "CreatedDate", "Description", "ModifiedBy", "ModifiedDate", "Price", "Selection", "Title" },
                values: new object[,]
                {
                    { 1, "Seed", new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(2724), null, null, null, 890m, 0, "Oferta 1" },
                    { 2, "Seed", new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4198), null, null, null, 1659m, 1, "Oferta 2" },
                    { 3, "Seed", new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4209), null, null, null, 1659m, 2, "Oferta 3" },
                    { 4, "Seed", new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4213), null, null, null, 1110m, 3, "Oferta 4" },
                    { 5, "Seed", new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4216), null, null, null, 2125m, 4, "Oferta 5" },
                    { 6, "Seed", new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4220), null, null, null, 790m, 0, "Oferta 6 Exclusive Promo" }
                });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DeleteData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 1);

            migrationBuilder.DeleteData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 2);

            migrationBuilder.DeleteData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 3);

            migrationBuilder.DeleteData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 4);

            migrationBuilder.DeleteData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 5);

            migrationBuilder.DeleteData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 6);
        }
    }
}
