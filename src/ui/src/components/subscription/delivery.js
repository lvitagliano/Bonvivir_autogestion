import React, { Component, Fragment, useState, useEffect } from 'react';
import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';
import { makeStyles } from '@material-ui/core/styles';
import axios from "axios";
import { bonvivirApi } from '../../services';
import { useHistory } from "react-router-dom";
import {
  Paper,
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableHead,
  TablePagination,
  TableRow,
  Link,
  Grid  
} from '@material-ui/core';
import Headers from './headers'
import Button from '../Button';
import LoadingRow from '../Loading/loadingRows';
import { CONSTANTS } from '../../config/constants'
import moment from 'moment';
import { FaFileInvoiceDollar, FaShippingFast } from "react-icons/fa";
import "./delivery.css"


const columns = [
  { id: 'type', label: 'Tipo' },
  { id: 'updatedAt', label: 'Fecha' },
  { id: `payments[${1}]`, label: 'Pago' },
  { id: 'deliveryStatus', label: 'Estado' },
  { id: 'deliveryFacture', label: 'Pedido' },
];

function createData(tipo, fecha, pago, estado) {
  return { tipo, fecha, pago, estado };
}

const useStyles = makeStyles({
  root: {
    textAlign: '-webkit-center'
  },
  divContent: {
    margin: '2px',
    //border: 'solid 1px',
    textAlign: '-webkit-center'
  },
  container: {
    maxHeight: 540,
  },
  thColor: {
    color: 'green'
  }

});

const Delivery = (props) => {
  const { GET_ORDERS } = CONSTANTS;
  const [state, setState] = useState({ isLoading: false, orders: []})


  const classes = useStyles();
  const [page, setPage] = React.useState(0);
  const [rowsPerPage, setRowsPerPage] = React.useState(10);
  const history = useHistory();

  async function componentDidMount() {
    await bonvivirApi.getOrders(props.id).then((orders) => {
      if('orders', orders.status === 200 || orders.status === 201){
        setState({
          orders:orders.data,
          isLoading: false
        })    
      } else {
        setState({
          orders: [],
          isLoading: false
        }) 
      }
  
    });
  }
  
  useEffect(() => {
    setState({ isLoading: true })   
    componentDidMount();
  }, []);

  const handleChangePage = (event, newPage) => {
    setPage(newPage);
  };

  const handleChangeRowsPerPage = event => {
    setRowsPerPage(+event.target.value);
    setPage(0);
  };

  const functionGetInvoice = (number, date) => {

      let anio = moment(date).format('YYYY')
    
    bonvivirApi.getInvoice(number, anio).then((invoice) => {
      console.log('PDF = ', invoice.data)
      window.open(invoice.data.getLinkPdfResult, '_blank', 'toolbar=0,location=0,menubar=0');
    })
  }

  const renderTable = (listOrders) => {
    
    return listOrders && !state.isLoading ?  
    listOrders.length > 0 ?
    <TableBody>
    {listOrders
      .map(row => {
        let legalDoc = []
        if(row.legalDocuments.length > 0){
          legalDoc =  row.legalDocuments.filter(item => item.link != null)
        }

        let payments = row.payments.pop()
        return (
          <TableRow 
              hover
              role='checkbox'
              tabIndex={-1}
              key={row.id}
            >
            <TableCell style={{ fontSize:14 }}>{row.type.toUpperCase()}</TableCell>
            <TableCell style={{ fontSize:14 }}>{moment(row.updatedAt).format('MMMM-YYYY').toUpperCase()}</TableCell>
            <TableCell style={{ fontSize:14 }}>{payments ? payments.paymentStatus.toUpperCase() : 'PENDIENTE'}</TableCell>
            <TableCell style={{ fontSize:14 }}>{row.deliveryStatus.toUpperCase()}</TableCell>
            <TableCell style={{ fontSize:14}}>
              {
                legalDoc.length > 0
                ? <FaFileInvoiceDollar size={32} onClick={() => functionGetInvoice(legalDoc[0].number, legalDoc[0].date)} style={{ marginRight: "20px" }}/>
                : <FaFileInvoiceDollar size={32} style={{ marginRight: "20px", color: "#b8babd" }}/>
              }
              <FaShippingFast size={38} onClick={() => history.push(`/delivery-status/${row.subscription}/${row.id}`)}/>
            </TableCell>
          </TableRow> 
        );
      })}
  </TableBody>
  :
  <h3>No hay datos</h3>
    : 
    <Fragment>
        <TableCell style={{ fontSize:14 }}><LoadingRow /></TableCell>
        <TableCell style={{ fontSize:14 }}><LoadingRow /></TableCell>
        <TableCell style={{ fontSize:14 }}><LoadingRow /></TableCell>
        <TableCell style={{ fontSize:14 }}><LoadingRow /></TableCell>
        <TableCell style={{ fontSize:14 }}><LoadingRow /></TableCell>
    </Fragment>
  
}

  return (
    <Fragment>
    <Headers title='Pedidos'  />

      <div className={classes.root}>
        <div className={classes.divContent} elevation={3}>
        <TableContainer className={classes.container}>
          <Table stickyHeader aria-label='sticky table'>
            <TableHead>
              <TableRow>
                {columns.map(column => (
                  <TableCell
                    key={column.id}
                    align={column.align}
                    style={{ minWidth: column.minWidth, color:'#762057', fontWeight: 700, fontSize: 18 }}
                  >
                    {column.label}
                  </TableCell>
                ))}
              </TableRow>
            </TableHead>
         {
           renderTable(state.orders)
         }
          </Table>
        </TableContainer>
        <TablePagination
          rowsPerPageOptions={[10, 25, 100]}
          component='div'
          count={state.orders ? state.orders.length : 10}
          rowsPerPage={rowsPerPage}
          page={page}
          onChangePage={handleChangePage}
          onChangeRowsPerPage={handleChangeRowsPerPage}
        />
        </div>
  
      </div>
    </Fragment>
  );
};

export default Delivery;
