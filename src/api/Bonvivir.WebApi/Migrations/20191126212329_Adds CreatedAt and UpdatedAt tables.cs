using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.WebApi.Migrations
{
    public partial class AddsCreatedAtandUpdatedAttables : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.AddColumn<DateTime>(
                name: "CreatedAt",
                table: "Users",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "UpdatedAt",
                table: "Users",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "CreatedAt",
                table: "Subscriptions",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "UpdatedAt",
                table: "Subscriptions",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "CreatedAt",
                table: "Offers",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "UpdatedAt",
                table: "Offers",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "CreatedAt",
                table: "OfferItems",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "UpdatedAt",
                table: "OfferItems",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "CreatedAt",
                table: "Leads",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "UpdatedAt",
                table: "Leads",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "CreatedAt",
                table: "Customers",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "UpdatedAt",
                table: "Customers",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "CreatedAt",
                table: "Addresses",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.AddColumn<DateTime>(
                name: "UpdatedAt",
                table: "Addresses",
                nullable: false,
                defaultValue: new DateTime(1, 1, 1, 0, 0, 0, 0, DateTimeKind.Unspecified));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(1755));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2094));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2099));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2101));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2102));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 11, 26, 18, 23, 29, 320, DateTimeKind.Local).AddTicks(2104));
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropColumn(
                name: "CreatedAt",
                table: "Users");

            migrationBuilder.DropColumn(
                name: "UpdatedAt",
                table: "Users");

            migrationBuilder.DropColumn(
                name: "CreatedAt",
                table: "Subscriptions");

            migrationBuilder.DropColumn(
                name: "UpdatedAt",
                table: "Subscriptions");

            migrationBuilder.DropColumn(
                name: "CreatedAt",
                table: "Offers");

            migrationBuilder.DropColumn(
                name: "UpdatedAt",
                table: "Offers");

            migrationBuilder.DropColumn(
                name: "CreatedAt",
                table: "OfferItems");

            migrationBuilder.DropColumn(
                name: "UpdatedAt",
                table: "OfferItems");

            migrationBuilder.DropColumn(
                name: "CreatedAt",
                table: "Leads");

            migrationBuilder.DropColumn(
                name: "UpdatedAt",
                table: "Leads");

            migrationBuilder.DropColumn(
                name: "CreatedAt",
                table: "Customers");

            migrationBuilder.DropColumn(
                name: "UpdatedAt",
                table: "Customers");

            migrationBuilder.DropColumn(
                name: "CreatedAt",
                table: "Addresses");

            migrationBuilder.DropColumn(
                name: "UpdatedAt",
                table: "Addresses");

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
