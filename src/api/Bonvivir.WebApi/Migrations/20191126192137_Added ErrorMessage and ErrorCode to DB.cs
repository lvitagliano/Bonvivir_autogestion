using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.WebApi.Migrations
{
    public partial class AddedErrorMessageandErrorCodetoDB : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "ErrorCode",
                table: "Subscriptions",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "ErrorMessage",
                table: "Subscriptions",
                nullable: true);

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 16, 21, 37, 620, DateTimeKind.Local).AddTicks(9522));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 16, 21, 37, 621, DateTimeKind.Local).AddTicks(27));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 16, 21, 37, 621, DateTimeKind.Local).AddTicks(34));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 16, 21, 37, 621, DateTimeKind.Local).AddTicks(36));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 16, 21, 37, 621, DateTimeKind.Local).AddTicks(38));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 16, 21, 37, 621, DateTimeKind.Local).AddTicks(39));
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "ErrorCode",
                table: "Subscriptions");

            migrationBuilder.DropColumn(
                name: "ErrorMessage",
                table: "Subscriptions");

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 5, 12, 34, 44, 206, DateTimeKind.Local).AddTicks(3605));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 5, 12, 34, 44, 206, DateTimeKind.Local).AddTicks(3868));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 5, 12, 34, 44, 206, DateTimeKind.Local).AddTicks(3873));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 5, 12, 34, 44, 206, DateTimeKind.Local).AddTicks(3874));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 5, 12, 34, 44, 206, DateTimeKind.Local).AddTicks(3875));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 5, 12, 34, 44, 206, DateTimeKind.Local).AddTicks(3876));
        }
    }
}
