using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.WebApi.Migrations
{
    public partial class AddedDefaultUser : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "Address",
                table: "Customers",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "BusinessUnit",
                table: "Customers",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "Gender",
                table: "Customers",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "IdType",
                table: "Customers",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "Phone",
                table: "Customers",
                nullable: true);

            migrationBuilder.AddColumn<string>(
                name: "TaxType",
                table: "Customers",
                nullable: true);

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

            migrationBuilder.InsertData(
                table: "Users",
                columns: new[] { "Id", "Password", "Username" },
                values: new object[] { "1", "sQDDb3f8Y7iB4OsAYCtSnMFWTxu7/Drq4iaUpVXbqwo=", "admin" });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DeleteData(
                table: "Users",
                keyColumn: "Id",
                keyValue: "1");

            migrationBuilder.DropColumn(
                name: "Address",
                table: "Customers");

            migrationBuilder.DropColumn(
                name: "BusinessUnit",
                table: "Customers");

            migrationBuilder.DropColumn(
                name: "Gender",
                table: "Customers");

            migrationBuilder.DropColumn(
                name: "IdType",
                table: "Customers");

            migrationBuilder.DropColumn(
                name: "Phone",
                table: "Customers");

            migrationBuilder.DropColumn(
                name: "TaxType",
                table: "Customers");

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
    }
}
