using System.Collections.Generic;
using System.IO;
using ClosedXML.Excel;

namespace Bonvivir.Application.Helpers
{
    public static class ExportToExcelHelper
    {
        public static Stream Export<T>(List<string> columnHeaders, List<T> data, string worksheetName = "Worksheet")
        {
            var wb = new XLWorkbook();
            var ws = wb.Worksheets.Add(worksheetName);

            ws.Cell(2, 1).InsertData(data);

            for (int i = 0; i < columnHeaders.Count; i++)
            {
                ws.Cell(1, i + 1).Value = columnHeaders[i];
                ws.Column(i + 1).AdjustToContents();
            }

            Stream fs = new MemoryStream();
            wb.SaveAs(fs);
            fs.Position = 0;

            return fs;
        }
    }
}