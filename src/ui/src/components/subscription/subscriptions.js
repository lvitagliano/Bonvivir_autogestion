import React, { Component, Fragment, useState, useEffect } from 'react';
import axios from "axios";
import {
  Card,
  CardContent,
  CardActionArea,
  CardMedia,
  Button,
  Typography,
  makeStyles,
  Grid
} from '@material-ui/core';
import { Link } from 'react-router-dom';
import { useDispatch, useSelector } from 'react-redux';

import {setSubscriptions,setOrders} from "../../actions/profile";
import { CONSTANTS } from '../../config/constants';
import { EMPTY_SUBSCRIPTION } from '../../config/constantsText';
import Success from '../success';
import Loading from '../Loading/loadingSubscriptions';

import { bonvivirApi } from '../../services';
import ClubLaNacion from '../../components/basicComponents/clubNacion';
import './subscriptions.css';


const useStyles = makeStyles({
  root: {
    '& .MuiOutlinedInput-root': {
      '& fieldset': {
        borderColor: '#982b71'
      },
      '&:hover fieldset': {
        borderColor: '#982b71'
      },
      '&.Mui-focused fieldset': {
        borderColor: '#762057'
      }
    }
  },
  bullet: {
    display: 'inline-block',
    margin: '0 2px',
    transform: 'scale(0.8)'
  },
  title: {
    fontSize: 26,
    textAlign: '-webkit-center',
    paddingTop: '.8rem'
  },
  subtitle: {
    fontSize: 18,
    textAlign: 'center',
    margin: '0 auto'
  },
  pos: {
    marginBottom: 12
  },
  textField: {
    width: '100%'
  },
  grid: {
    padding: '.5rem',
    color: '#762057'
  },
  btnEdit: {
    backgroundColor: '#762057',
    borderColor: '#762057',
    color: 'white',
    '& .MuiButton-contained:hover': {
      borderColor: '#982b71'
    }
  },
  footContainer: {
    float: 'right'
  },
  imgWdt: {
    width: '45%'
  },
  btnVer: {
    fontSize: 14,
    fontWeight: '700',
    backgroundColor: '#762057',
    borderColor: '#762057',
    color: 'white'
  },
});

const Subscriptions = props => {
  const { GET_SUBSCRIPTION_KW } = CONSTANTS;
  const usuario = JSON.parse(localStorage.getItem("contact"));
  const [state, setState] = useState({ isLoading: true, subscriptions: []})
  const [offers, setOffers] = useState([])
  const dispatch = useDispatch();

  const { contact, subscriptions, loading } = useSelector((store) => store.profile);

  const classes = useStyles();
  const bull = <span className={classes.bullet}>•</span>;

  async function componentDidMount() {
    const x = await  axios.get(GET_SUBSCRIPTION_KW + usuario.id);

    setState({isLoading:false,
        subscriptions:x.data,
      })

    const fullSubscriptions = await Promise.all(
                                      x.data.map(subscription => 
                                        new Promise(resolve =>  bonvivirApi.getOrders(subscription.id).then(y => resolve(
                                          {...subscription,orders:y.data}
                                        )))
                                      ));
    
    dispatch(setSubscriptions(fullSubscriptions));

  }

  useEffect(() => {
    setState({isLoading: true});
    componentDidMount();
  }, []);

   const renderData = (cuenta) => {
     if(loading){
      return <Loading/>
     }

    if(cuenta) {
      const subscripciones =  cuenta.map((item)  => {
      if(Object.keys(item).length > 0 && item.offerItem){
        return (
          <Grid item className={classes.grid} xs={12} sm={8} md={6} lg={4}>
          <Card elevation={3}>
            {/* titulo */}
            <Typography
              className={classes.title}
              color='textSecondary'
              gutterBottom
            >
              {item.offerItem.title}
            </Typography>

            {/* botellas */}
            <Grid item xs={12}>
              <div className='subscriptions-description'>
                <b>{item.offerItem.description}</b>
              </div>
            </Grid>

            {/* imagen */}
            <Grid className={classes.title}>
              <CardMedia
                className={classes.imgWdt}
                component='img'
                alt='Wine'
                width='145'
                image='/images/exclusiva.png'
                title='Wine'
              />
            </Grid>
  
            <CardContent>
              <Grid
                container
                direction='row'
                justify='center'
                alignItems='flex-end'
              >
                <Grid item xs={12} />
                  <Grid item xs={4}>
                    <p className="Subscriptions-priceParagraph">
                      Precio
                    </p>
                  </Grid>

                  <Grid
                    container
                    direction='row'
                    justify='center'
                    alignItems='center'
                  >
                  
                  <Grid item xs={12}>
                    <Typography variant='body1' className={classes.subtitle}>
                      <b>$ {item.offerItem.basePrice}</b>
                    </Typography>
                  </Grid>
                  <Grid item xs={4} />
                </Grid>
              </Grid>
            </CardContent>

            <CardContent>
              <Grid item className={classes.grid}>
                <Link style={{ textDecoration: 'none' }} to={"/editsubscriptions/edit/" + item.id}>
                  <Button
                    variant='contained'
                    size='large'
                    disableElevation
                    fullWidth
                    className={classes.btnVer}
                  >
                    Editar Suscripción
                  </Button>  
                </Link>
              </Grid>
              <Grid item className={classes.grid}>
              <Link style={{ textDecoration: 'none' }} to={"/editsubscriptions/delivery/" + item.id}>
                <Button
                  variant='contained'
                  size='large'
                  disableElevation
                  fullWidth
                  className={classes.btnVer}
                >
                  Pedidos
                </Button>               
              </Link>
              </Grid>
            </CardContent>
          </Card>
        </Grid>
        )
      }})
      
      return subscripciones;

    }

    if(!state.isLoading){
      return <Success typeMessage={EMPTY_SUBSCRIPTION} status='ok' />
    }
  
  
  };

  if (state.error) {
    return <p>{state.error.message}</p>;
  }

  return (
    <>
      {state.isLoading ? <Loading/>
      :
      <Grid container direction='row' justify='center' alignItems='flex-start'>
        {renderData(subscriptions)}
      </Grid>
      }
    </>
  );
};

export default Subscriptions;
