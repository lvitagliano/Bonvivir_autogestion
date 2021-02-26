using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.WebApi.Migrations
{
    public partial class booltype : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AlterColumn<short>(
                name: "IsOrganic",
                table: "Offers",
                type: "bit",
                nullable: false,
                oldClrType: typeof(int));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8701), (short)0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8989), (short)0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8994), (short)0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8995), (short)0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8997), (short)0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 17, 19, 39, 981, DateTimeKind.Local).AddTicks(8998), (short)0 });
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AlterColumn<int>(
                name: "IsOrganic",
                table: "Offers",
                nullable: false,
                oldClrType: typeof(short),
                oldType: "bit");

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(8760), 0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9040), 0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9045), 0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9047), 0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9048), 0 });

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                columns: new[] { "CreatedDate", "IsOrganic" },
                values: new object[] { new DateTime(2019, 8, 9, 15, 55, 27, 25, DateTimeKind.Local).AddTicks(9049), 0 });
        }
    }
}
