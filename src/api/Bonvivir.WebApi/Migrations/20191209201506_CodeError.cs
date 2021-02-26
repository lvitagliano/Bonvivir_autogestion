using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.WebApi.Migrations
{
    public partial class CodeError : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
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

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 11, 28, 10, 9, 5, 614, DateTimeKind.Local).AddTicks(3862), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(402), new DateTime(2019, 11, 28, 10, 9, 5, 614, DateTimeKind.Local).AddTicks(8858) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(670), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(691), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(671) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(695), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(697), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(695) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(697), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(699), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(698) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(699), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(701), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(700) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(701), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(703), new DateTime(2019, 11, 28, 10, 9, 5, 615, DateTimeKind.Local).AddTicks(702) });

            migrationBuilder.UpdateData(
                table: "Users",
                keyColumn: "Id",
                keyValue: "1",
                columns: new[] { "CreatedAt", "UpdatedAt" },
                values: new object[] { new DateTime(2019, 11, 28, 10, 9, 5, 616, DateTimeKind.Local).AddTicks(5098), new DateTime(2019, 11, 28, 10, 9, 5, 616, DateTimeKind.Local).AddTicks(5102) });
        }
    }
}
