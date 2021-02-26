using System;
using System.Collections.Generic;
using System.Threading;
using System.Threading.Tasks;
using Bonvivir.Domain.Constants;
using Bonvivir.Domain.Entities;
using MediatR;

namespace Bonvivir.Application.Selections
{
    public class SelectionsRequestHandler : IRequestHandler<SelectionsRequest, List<Selection>>
    {
        public List<Selection> Selections { get; set; }

        public SelectionsRequestHandler()
        {
            Selections = new List<Selection>();
            LoadMockData();
        }

        public async Task<List<Selection>> Handle(SelectionsRequest request, CancellationToken cancellationToken)
        {
            return await Task.FromResult(Selections);
        }

        private void LoadMockData()
        {
            //var campaignId = new Guid("7F9F6ECC-A87E-E311-BF53-00155D066504");
            //var promotionId = new Guid("191AD084-0364-4B80-8EE9-2CCA8FE6F9F0");

            Selections.Add(new Selection
            {
                Title = "Selección Exclusiva",
                Subtitle = "Diferentes cepas y estilos de vinos cuidadosamente elegidos. Incluye fichas coleccionables con maridajes.",
                TableTitle = "Precio",
                SelectionDetails = new List<SelectionDetail>()
                {
                    new SelectionDetail
                    {
                        Item = "6 botellas",
                        CommonPrice = "2529,00",
                        ClubLaNacionPrice = "2023,20",
                        CampaignId = GuidsConstants.CampaignId,
                        PromotionId = GuidsConstants.promotionId
                    },
                    new SelectionDetail
                    {
                        Item = "3 botellas",
                        CommonPrice = "1379,00",
                        ClubLaNacionPrice = "1241,10",
                        CampaignId = GuidsConstants.CampaignId,
                        PromotionId = GuidsConstants.promotionId
                    }
                },
                ImagePath = "/images/exclusiva.png",
                ImagePathMobile = "/images/logo_exclusiva.png",
                ImagePathDetail = "/images/caja_exclusiva.png"
            });

            Selections.Add(new Selection
            {
                Title = "Selección Exclusiva Blanca",
                Subtitle = "Propuesta variada de vinos blancos y tintos. Incluye fichas coleccionables con maridajes.",
                TableTitle = "Precio",
                SelectionDetails = new List<SelectionDetail>()
                {
                    new SelectionDetail
                    {
                        Item = "6 botellas",
                        CommonPrice = "2529,00",
                        ClubLaNacionPrice = "2023,20",
                        CampaignId = GuidsConstants.CampaignId,
                        PromotionId = GuidsConstants.promotionId
                    }
                },
                ImagePath = "/images/exclusiva-blanca.png",
                ImagePathMobile = "/images/logo_exclusivablanca.png",
                ImagePathDetail = "/images/caja_exclusiva.png"
            });

            Selections.Add(new Selection
            {
                Title = "Selección Alta Gama",
                Subtitle = "Vinos excepcionales, complejos y con gran potencial de guarda. Incluye fichas coleccionables con maridajes.",
                TableTitle = "Precio",
                SelectionDetails = new List<SelectionDetail>()
                {
                    new SelectionDetail
                    {
                        Item = "4 botellas",
                        CommonPrice = "3219,00",
                        ClubLaNacionPrice = "2575,20",
                        CampaignId = GuidsConstants.CampaignId,
                        PromotionId = GuidsConstants.promotionId
                    },
                    new SelectionDetail
                    {
                        Item = "2 botellas",
                        CommonPrice = "1724,00",
                        ClubLaNacionPrice = "1551,60",
                        CampaignId = GuidsConstants.CampaignId,
                        PromotionId = GuidsConstants.promotionId
                    }
                },
                ImagePath = "/images/alta-gama.png",
                ImagePathMobile = "/images/logo_altagama.png",
                ImagePathDetail = "/images/caja_altagama.png"
            });

            Selections.Add(new Selection
            {
                Title = "Selección Puro Malbec",
                Subtitle = "Dos etiquetas de la cepa insignia, la más cultivada y preferida por los paladares argentinos. Ideal para disfrutar su amplia variedad y complejidad.",
                TableTitle = "Precio",
                SelectionDetails = new List<SelectionDetail>()
                {
                    new SelectionDetail
                    {
                        Item = "4 botellas",
                        CommonPrice = "2114,00",
                        ClubLaNacionPrice = "1691,20",
                        CampaignId = GuidsConstants.CampaignId,
                        PromotionId = GuidsConstants.promotionId
                    }
                },
                ImagePath = "/images/puro-malbec.png",
                ImagePathMobile = "/images/logo_puromalbec.png",
                ImagePathDetail = "/images/caja_puromalbecsingular.png"
            });

            // Para este release no se incluirá la selección Singular
            // Selections.Add(new Selection
            // {
            //    Title = "Selección Singular",
            //    Subtitle = "Vinos únicos que suman la habilidad de los principales winemakers y bodegas del país con la experiencia de nuestro panel de cata. Sólo los conseguis a través de BONVIVIR.",
            //    TableTitle = "Precio",
            //    SelectionDetails = new List<SelectionDetail>()
            //    {
            //        new SelectionDetail
            //        {
            //            Item = "4 botellas",
            //            CommonPrice = "2114,00",
            //            ClubLaNacionPrice = "1691,20",
            //            CampaignId = campaignId,
            //            PromotionId = promotionId
            //        }
            //    },
            //    ImagePath = "/images/puro-malbec.png",
            //    ImagePathMobile = "/images/logo_singular.png",
            //    ImagePathDetail = "/images/caja_puromalbecsingular.png"
            // });
        }
    }
}
