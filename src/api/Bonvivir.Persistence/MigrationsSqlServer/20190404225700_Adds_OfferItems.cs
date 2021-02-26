using System;
using Microsoft.EntityFrameworkCore.Migrations;

namespace Bonvivir.Persistence.Migrations
{
    public partial class Adds_OfferItems : Migration
    {
        protected override void Up(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_OfferItem_Offers_OfferId",
                table: "OfferItem");

            migrationBuilder.DropPrimaryKey(
                name: "PK_OfferItem",
                table: "OfferItem");

            migrationBuilder.RenameTable(
                name: "OfferItem",
                newName: "OfferItems");

            migrationBuilder.RenameColumn(
                name: "Price",
                table: "OfferItems",
                newName: "BasePrice");

            migrationBuilder.RenameColumn(
                name: "Guid",
                table: "OfferItems",
                newName: "BasePriceId");

            migrationBuilder.RenameIndex(
                name: "IX_OfferItem_OfferId",
                table: "OfferItems",
                newName: "IX_OfferItems_OfferId");

            migrationBuilder.AddPrimaryKey(
                name: "PK_OfferItems",
                table: "OfferItems",
                column: "Id");

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 1,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9068));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 2,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9770));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 3,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9777));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 4,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9777));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 5,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9777));

            migrationBuilder.UpdateData(
                table: "Offers",
                keyColumn: "Id",
                keyValue: 6,
                column: "CreatedDate",
                value: new DateTime(2019, 4, 4, 19, 57, 0, 158, DateTimeKind.Local).AddTicks(9780));

            migrationBuilder.AddForeignKey(
                name: "FK_OfferItems_Offers_OfferId",
                table: "OfferItems",
                column: "OfferId",
                principalTable: "Offers",
                principalColumn: "Id",
                onDelete: ReferentialAction.Restrict);
        }

        protected override void Down(MigrationBuilder migrationBuilder)
        {
            migrationBuilder.DropForeignKey(
                name: "FK_OfferItems_Offers_OfferId",
                table: "OfferItems");

            migrationBuilder.DropPrimaryKey(
                name: "PK_OfferItems",
                table: "OfferItems");

            migrationBuilder.RenameTable(
                name: "OfferItems",
                newName: "OfferItem");

            migrationBuilder.RenameColumn(
                name: "BasePriceId",
                table: "OfferItem",
                newName: "Guid");

            migrationBuilder.RenameColumn(
                name: "BasePrice",
                table: "OfferItem",
                newName: "Price");

            migrationBuilder.RenameIndex(
                name: "IX_OfferItems_OfferId",
                table: "OfferItem",
                newName: "IX_OfferItem_OfferId");

            migrationBuilder.AddPrimaryKey(
                name: "PK_OfferItem",
                table: "OfferItem",
                column: "Id");

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

            migrationBuilder.AddForeignKey(
                name: "FK_OfferItem_Offers_OfferId",
                table: "OfferItem",
                column: "OfferId",
                principalTable: "Offers",
                principalColumn: "Id",
                onDelete: ReferentialAction.Restrict);
        }
    }
}
