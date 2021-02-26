using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.Persistence.Migrations
{
    public partial class LeadsAndUser : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.CreateTable(
                name: "Leads",
                columns: table => new
                {
                    Id = table.Column<string>(nullable: false),
                    FirstName = table.Column<string>(nullable: true),
                    LastName = table.Column<string>(nullable: true),
                    Email = table.Column<string>(nullable: true),
                    PhoneNumber = table.Column<string>(nullable: true),
                    MobileNumber = table.Column<string>(nullable: true),
                    Campaign = table.Column<Guid>(nullable: false),
                    Subject = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Leads", x => x.Id);
                });

            migrationBuilder.CreateTable(
                name: "Users",
                columns: table => new
                {
                    Id = table.Column<string>(nullable: false),
                    Username = table.Column<string>(nullable: true),
                    Password = table.Column<string>(nullable: true)
                },
                constraints: table =>
                {
                    table.PrimaryKey("PK_Users", x => x.Id);
                });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 7, 29, 13, 10, 37, 979, DateTimeKind.Local).AddTicks(1280));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 7, 29, 13, 10, 37, 979, DateTimeKind.Local).AddTicks(1584));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 7, 29, 13, 10, 37, 979, DateTimeKind.Local).AddTicks(1588));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 7, 29, 13, 10, 37, 979, DateTimeKind.Local).AddTicks(1589));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 7, 29, 13, 10, 37, 979, DateTimeKind.Local).AddTicks(1590));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 7, 29, 13, 10, 37, 979, DateTimeKind.Local).AddTicks(1591));
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropTable(
                name: "Leads");

            migrationBuilder.DropTable(
                name: "Users");

            migrationBuilder.AlterColumn<string>(
                name: "Name",
                table: "AspNetUserTokens",
                nullable: false,
                oldClrType: typeof(string),
                oldMaxLength: 128);

            migrationBuilder.AlterColumn<string>(
                name: "LoginProvider",
                table: "AspNetUserTokens",
                nullable: false,
                oldClrType: typeof(string),
                oldMaxLength: 128);

            migrationBuilder.AlterColumn<string>(
                name: "ProviderKey",
                table: "AspNetUserLogins",
                nullable: false,
                oldClrType: typeof(string),
                oldMaxLength: 128);

            migrationBuilder.AlterColumn<string>(
                name: "LoginProvider",
                table: "AspNetUserLogins",
                nullable: false,
                oldClrType: typeof(string),
                oldMaxLength: 128);

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 5, 17, 12, 39, 50, DateTimeKind.Local).AddTicks(2855));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 5, 17, 12, 39, 50, DateTimeKind.Local).AddTicks(3440));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 5, 17, 12, 39, 50, DateTimeKind.Local).AddTicks(3453));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 5, 17, 12, 39, 50, DateTimeKind.Local).AddTicks(3457));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 5, 17, 12, 39, 50, DateTimeKind.Local).AddTicks(3460));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 5, 17, 12, 39, 50, DateTimeKind.Local).AddTicks(3464));
        }
    }
}
