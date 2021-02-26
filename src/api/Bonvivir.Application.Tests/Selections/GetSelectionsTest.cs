using System;
using System.Collections.Generic;
using System.Text;
using System.Threading;
using System.Threading.Tasks;
using Bonvivir.Application.Selections;
using Bonvivir.Domain.Entities;
using Shouldly;
using Xunit;

namespace Bonvivir.Application.Tests.Selections
{
    public class GetSelectionsTest
    {
        [Fact]
        public async Task GetListTest()
        {
            var details = new List<SelectionDetail>()
            {
                new SelectionDetail
                {
                    Item = "6 botellas",
                    CommonPrice = "NoDisponible",
                    ClubLaNacionPrice = "NoDisponible"
                },
                new SelectionDetail
                {
                    Item = "6 botellas",
                    CommonPrice = "NoDisponible",
                    ClubLaNacionPrice = "NoDisponible"
                }
            };
            var selections = new List<Selection>
            {
                new Selection
                {
                    Title = "Selección Exclusiva",
                    Subtitle = "Diferentes cepas y estilos de vinos cuidadosamente elegidos.",
                    TableTitle = "Precio",
                    SelectionDetails = details,
                    ImagePath = string.Empty,
                    ImagePathMobile = string.Empty
                },
                new Selection
                {
                    Title = "Selección Exclusiva Blanca",
                    Subtitle = "Propuestas variada de vinos blancos y tintos",
                    TableTitle = "Precio",
                    SelectionDetails = details,
                    ImagePath = string.Empty,
                    ImagePathMobile = string.Empty
                },
                new Selection
                {
                    Title = "Selección de Alta Gama",
                    Subtitle = "Vinos excepcionales complejos y con gran potencial de guarda.",
                    TableTitle = "Precio",
                    SelectionDetails = details,
                    ImagePath = string.Empty,
                    ImagePathMobile = string.Empty,
                },               
            };
            
            var selectionsRequest = new SelectionsRequest();
            var selectionsRequestHandler = new SelectionsRequestHandler
            {
                Selections = selections
            };
            var result = await selectionsRequestHandler.Handle(selectionsRequest, CancellationToken.None);

            Assert.NotEmpty(result);
            result.ShouldBe(selections);
        }
    }
}
