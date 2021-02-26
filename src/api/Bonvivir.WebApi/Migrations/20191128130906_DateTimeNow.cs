using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.WebApi.Migrations
{
    public partial class DateTimeNow : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
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

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(1755), new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2094), new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2099), new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2101), new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2102), new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified) });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                columns: new[] { "CreatedAt", "CreatedDate", "UpdatedAt" },
                values: new object[] { new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2104), new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified) });

            migrationBuilder.UpdateData(
                table: "Users",
                keyColumn: "Id",
                keyValue: "1",
                columns: new[] { "CreatedAt", "UpdatedAt" },
                values: new object[] { new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified), new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified) });
        }
    }
}
