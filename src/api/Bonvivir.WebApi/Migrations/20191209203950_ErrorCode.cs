using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.WebApi.Migrations
{
    public partial class ErrorCode : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 39, 50, 440, DateTimeKind.Local).AddTicks(8712), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5558), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(4122) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5790), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5808), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5791) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5811), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5813), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5812) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5813), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5815), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5814) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5815), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5817), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5816) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5817), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5820), new DateTime(2019, 12, 9, 17, 39, 50, 441, DateTimeKind.Local).AddTicks(5818) });

            migrationBuilder.UpdateData(
                table: "Users",
                keyColumn: "Id",
                keyValue: "1",
                columns: new[] { "CreatedAt", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 39, 50, 442, DateTimeKind.Local).AddTicks(8627), new DateTime(2019, 12, 9, 17, 39, 50, 442, DateTimeKind.Local).AddTicks(8630) });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 15, 5, 615, DateTimeKind.Local).AddTicks(7107), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6462), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(4934) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6708), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6728), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6709) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6732), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6733), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6732) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6734), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6735), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6734) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6736), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6737), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6736) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6738), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6739), new DateTime(2019, 12, 9, 17, 15, 5, 616, DateTimeKind.Local).AddTicks(6738) });

            migrationBuilder.UpdateData(
                table: "Users",
                keyColumn: "Id",
                keyValue: "1",
                columns: new[] { "CreatedAt", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 12, 9, 17, 15, 5, 617, DateTimeKind.Local).AddTicks(9780), new DateTime(2019, 12, 9, 17, 15, 5, 617, DateTimeKind.Local).AddTicks(9783) });
        }
    }
}
