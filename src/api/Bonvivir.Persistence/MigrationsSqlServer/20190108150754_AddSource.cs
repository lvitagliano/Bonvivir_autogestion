using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.Persistence.Migrations
{
    public partial class AddSource : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<string>(
                name: "Source",
                table: "Offers",
                nullable: true);

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

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "Source",
                table: "Offers");

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(2724));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4198));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4209));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4213));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4216));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "ID",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 1, 7, 18, 3, 23, 582, DateTimeKind.Local).AddTicks(4220));
        }
    }
}
