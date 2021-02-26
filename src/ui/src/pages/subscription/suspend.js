import React, { Component, Fragment, useState,useEffect } from 'react';
import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';
import { NavBar } from '../../components';
import Suspend from '../../components/subscription/suspend'
import axios from "axios";
import { CONSTANTS } from '../../config/constants';
import Loading from '../../components/Loading/loadingSubscriptions'
import { makeStyles } from '@material-ui/core/styles';

const allBtn = {
  fontSize: 15,
  fontWeight: 600,
}
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
  title:{
      padding: '10px',
      margin: '5px'
  },
  errorText: {
      color:'red',
      fontWeight:600,
      fontSize:'16px'
  },
  container: {
      maxHeight: 540,
      padding: '5px',
  },
  btnFactura: {
      backgroundColor: '#762057',
      ...allBtn,
      '&:hover': {
          backgroundColor: '#8e2769',
      }
  },
  btnMotivo: {
      ...allBtn,
      margin: '7px',
      padding: '4px',
      paddingLeft: '15px',
      paddingRight: '15px',
      backgroundColor: '#f1f1f1'

  }

});

const Suspends = (props) => {
  const classes = useStyles();

  const usuario = JSON.parse(localStorage.getItem("contact"));
  const [state, setState] = useState({ isLoading: false, subscriptions: []})
  const { GET_SUBSCRIPTION_KW } = CONSTANTS;
  
  async function componentDidMount() {
      axios.get(GET_SUBSCRIPTION_KW + usuario.id)
      .then(result => setState({
        subscriptions:result.data.filter(data => {
          return data.id === props.match.params.subscriptionId
        }),
        isLoading: false
      }))
  }

  useEffect(() => {
    setState({isLoading: true});
    componentDidMount();
    setState({isLoading: false});
  }, []);

  const renderSubscriptions = (data) => {
    if (data) {
      if (data.length > 0) {
      return <Suspend data={data[0]}/>
    } else {
      return  <div className={classes.divContent}>
      <div className={classes.container}>
        <div style={{ padding: '30px' }}>
         <Loading />
         </div>
         </div>
         </div>
    }
      } else {
        return (
          <div className={classes.divContent}>
          <div className={classes.container}>
            <div style={{ padding: '30px' }}>
             <Loading />
             </div>
             </div>
             </div>
        )
      }
  }
  return (
    <Fragment>
    <NavBar textTitle='' />
    {/* //main-container  */}
      <div className='row'>
        <div className='col-md-12' style={{textAlign: '-webkit-center'}}>
          {
            renderSubscriptions(state.subscriptions)
          }
          </div>
        </div>
    </Fragment>
  );
};

export default Suspends;