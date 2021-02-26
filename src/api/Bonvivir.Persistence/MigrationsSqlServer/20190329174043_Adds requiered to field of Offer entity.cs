using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.Persistence.Migrations
{
    public partial class AddsrequieredtofieldofOfferentity : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AlterColumn<string>(
                name: "Title",
                table: "Offers",
                nullable: false,
                oldClrType: typeof(string),
                oldNullable: true);

            migrationBuilder.AlterColumn<string>(
                name: "Description",
                table: "Offers",
                nullable: false,
                oldClrType: typeof(string),
                oldNullable: true);

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 14, 40, 43, 581, DateTimeKind.Local).AddTicks(920));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 14, 40, 43, 581, DateTimeKind.Local).AddTicks(1943));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 14, 40, 43, 581, DateTimeKind.Local).AddTicks(1950));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 14, 40, 43, 581, DateTimeKind.Local).AddTicks(1957));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 14, 40, 43, 581, DateTimeKind.Local).AddTicks(1964));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 14, 40, 43, 581, DateTimeKind.Local).AddTicks(1971));
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AlterColumn<string>(
                name: "Title",
                table: "Offers",
                nullable: true,
                oldClrType: typeof(string));

            migrationBuilder.AlterColumn<string>(
                name: "Description",
                table: "Offers",
                nullable: true,
                oldClrType: typeof(string));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(204));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(870));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(877));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(881));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(884));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 3, 29, 12, 34, 57, 905, DateTimeKind.Local).AddTicks(888));
        }
    }
}
