import React, { Component, Fragment, useState, useEffect } from 'react';
import { NavBar } from '../../components';
import { createMuiTheme, withStyles, makeStyles, ThemeProvider } from '@material-ui/core/styles';
import { Paper, Button, TableCell, TableBody, TableRow, TableHead, Table, TableContainer } from '@material-ui/core';
import iconCup from '../../resources/images/icon-cup.png';
import classnames from 'classnames';
import { useHistory } from "react-router-dom";
import AppBar from '../../components/AppBar'
import { bonvivirApi } from '../../services';
import LoadingRow from '../../components/Loading/loadingSubscriptions';
import moment from 'moment';

const useStyles = makeStyles({
  root: {
    textAlign: '-webkit-center'
  },
  divContent: {
    maxWidth: 500,
    margin: '2px',
    padding: '5px',
    //border: 'solid 1px'
  },
  container: {
    maxHeight: 540,
    padding: '5px',
  },
  btnFactura: {
    backgroundColor:'#762057',
    fontSize: 12,
    fontWeight: 600,
    '&:hover': {
      backgroundColor: '#8e2769',

    }
  }

});

const columns = [
  { id: 'type', label: 'Tipo' },
  { id: 'date', label: 'Fecha' },
  { id: 'ver', label: 'Ver Factura' }
];

const Deliverys = props => {
  const subscription = props.match.params.subscriptionId;
  const tracking = props.match.params.trackingId;
  const [state, setState] = useState({ isLoading: false, orders: [], invoice: []})
  const [listInvoice, setListInvoice] = useState({ hidden: true, listInv: [] })
  const classes = useStyles();
  let currentStep = 0
  const prevStep = 2
  const history = useHistory();

  useEffect(() => {
    setState({ isLoading: true })   
    componentDidMount();
  }, []);

  async function componentDidMount() {
    await bonvivirApi.getOrders(subscription).then((orders) => {
      let orderFilter = orders.data.filter(row => {
        return row.id === tracking
      })
       bonvivirApi.getLegalDocument(tracking).then((order) => {
        setState({ ...state, orders:orderFilter, invoice:order.data, isLoading: false })    
    });
    });
  }

  const handleHidden = () => {
    setListInvoice({ hidden: !listInvoice.hidden }) 
  }

  const renderOrders = (data, invoice) => {
    if (data) {
      if(data.length > 0) {
      switch (data[0].deliveryStatus) {
        case 'PENDIENTE':
          currentStep = 2
          break;
        case 'ENTREGADO':
          currentStep = 3
          break;
        case 'SUSPENDIDO':
          currentStep = 0
          break;
    
        default:
          break;
      }

     return <div className={classes.divContent} >
      <div className={classes.container}>
        <div style={{ padding: '30px' }}>
          <div className='registration__cup-steps'>
            <div
              className={classnames('step', { 'step--active': currentStep >= 1 })}
            >
              <img src={iconCup} alt='cup' />
            </div>
            <div className='registration__Right-container__line-separator' />
            <div
              className={classnames('step', { 'step--active': currentStep >= 2 })}
            >
              <img src={iconCup} alt='cup' />
            </div>
            <div className='registration__Right-container__line-separator' />
            <div
              className={classnames('step', { 'step--active': currentStep >= 3 })}
            >
              <img src={iconCup} alt='cup' />
            </div>
          </div>
        </div>
      </div>
      <div className='registration__title helpers__flex'>
        <h3 className='title__h3'>
          Estado: {data[0].deliveryStatus}
        </h3>
      </div>  

    </div>
   }
    } else {
      return <div className={classes.divContent} >
      <div className={classes.container}>
        <div style={{ padding: '30px' }}>
         <LoadingRow />
         </div>
         </div>
         </div>
    }

}

  return (
    <Fragment>
      <section className={classes.body}>
        <NavBar textTitle='' />
        <div className={classes.root}>
        <AppBar title='Tracking de Pedido'/>
        { 
            renderOrders(state.orders, state.invoice)
        }

        </div>

      </section>

    </Fragment>
  );
};

export default Deliverys;