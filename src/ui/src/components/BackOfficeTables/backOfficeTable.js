import { Grid, MuiThemeProvider, Button } from '@material-ui/core';
import { createMuiTheme } from '@material-ui/core/styles';
import React, { Component, useState, Fragment, useEffect } from 'react';
import ReactDOM from 'react-dom';
import MaterialTable from 'material-table';
import styles from './style';
import ColumnasPay from './ColumnasPay';
import ColumnasDomicilio from './ColumnasDomicilio';

let direction = 'ltr';
const theme = createMuiTheme({
  direction: direction,
  palette: {
    type: 'light'
  }
});

let flat = false;
const BackTables = props => {
  const fullData = props.rows.map(r => r.content);
  if(!flat){
    fullData.forEach(function(i){
      i.createdAt = new Date(i.createdAt).toLocaleDateString();
      i.birthDate = new Date(i.birthDate).toLocaleDateString();
    });
    flat = true;
  }

  const errorData = fullData.filter(r => r.errorCode);
  const clases = styles();
  const tableRef = React.createRef();
  const colRenderCount = 0;
  const [selectedRow, setSelectedRow] = useState(null);
  const [state, setState] = useState({ text: 'text', selecteds: 0 });
  const [data, setData] = useState(fullData);
  const [error, setError] = useState(false);

  useEffect(() => {
    if (error) {
      setData(errorData);
    } else {
      setData(fullData);
    }
  }, [error, setData]);

  const renderTables = ColumnasPay.map(row => (
    <th className={clases.td}>{row.title}</th>
  ));

  const renderData = elarray => {
    if (elarray) {
      const rowsData = data.filter((value, index) => {
        return value.id === elarray;
      });
      const rowData = rowsData[0];
      const errorArray = [
        {
          taxType: rowData.taxType,
          paymentMethod: rowData.paymentMethod,
          promotion: rowData.promotion,
          schema: rowData.schema,
          bonvivirId: rowData.bonvivirId,
          businessUnit: rowData.businessUnit,
          cln: rowData.cln,
          creditCard: rowData.creditCard,
          creditCardInfo: rowData.creditCardInfo,
          errorCode: rowData.errorCode,
          errorMessage: rowData.errorMessage,
          externalId: rowData.externalId,
          jsonRequest: rowData.jsonRequest,
          createdAt: rowData.createdAt,
          updatedAt: rowData.updatedAt
        }
      ];
      return (
        <MaterialTable
          title='Datos de pago y errores'
          columns={ColumnasPay}
          data={errorArray}
          options={{
            selection: false,
            showPagination: false,
            pageSize: 1,
            pageSizeOptions: [1],
            rowStyle: rowData => ({
              backgroundColor:
                selectedRow === rowData.tableData.id ? '#EEE' : '#FFF',
              fontSize: 12
            }),
            maxBodyHeight: '250px',
            exportButton: false,
            sorting: true,
            headerStyle: {
              position: 'sticky',
              top: 0,
              backgroundColor: '#EEEFFF',
              fontSize: 12,
              fontWeight: 'bold'
            }
          }}
        />
      );
    }
  };

  return (
    <>
      <button onClick={() => setError(!error)}>
        {!error ? 'Filtrar por Error' : 'Data Completa'}
      </button>
      <MuiThemeProvider theme={theme}>
        <Grid container>
          <Grid item xs={12}>
            <MaterialTable
              title='Datos de cliente'
              tableRef={state.tableRef}
              columns={ColumnasDomicilio}
              data={data}
              onRowClick={(evt, selectedRow) =>
                setSelectedRow(selectedRow.tableData.id)
              }
              options={{
                overflowY: "auto",
                pageSize: 10,
                pageSizeOptions: [5, 10, 50, 100],
                selection: false,
                exportAllData: false,
                exportButton: false,
                sorting: true,
                headerStyle: {
                  backgroundColor: '#EEEFFF',
                  fontSize: 12,
                  fontWeight: 'bold',
                  position: 'sticky',
                  top: 0
                },
                maxBodyHeight: '600px',
                rowStyle: rowData => ({
                  backgroundColor:
                    selectedRow === rowData.tableData.id ? '#EEE' : '#FFF',
                  fontSize: 18
                })
              }}
              detailPanel={[
                {
                  tooltip: 'Pago y error',
                  render: rowData => {
                    return (
                      <Fragment>
                        <Grid>{renderData(rowData.id)}</Grid>
                      </Fragment>
                    );
                  }
                }
              ]}
            />
          </Grid>
        </Grid>
      </MuiThemeProvider>
    </>
  );
};
export default BackTables;
