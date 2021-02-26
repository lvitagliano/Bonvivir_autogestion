using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.WebApi.Migrations
{
    public partial class decimalToString : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 10, 7, 12, 12, 10, 840, DateTimeKind.Local).AddTicks(226));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 10, 7, 12, 12, 10, 840, DateTimeKind.Local).AddTicks(497));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 10, 7, 12, 12, 10, 840, DateTimeKind.Local).AddTicks(503));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 10, 7, 12, 12, 10, 840, DateTimeKind.Local).AddTicks(504));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 10, 7, 12, 12, 10, 840, DateTimeKind.Local).AddTicks(505));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 10, 7, 12, 12, 10, 840, DateTimeKind.Local).AddTicks(506));
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8701));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8989));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8994));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8995));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8997));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8998));
        }
    }
}
