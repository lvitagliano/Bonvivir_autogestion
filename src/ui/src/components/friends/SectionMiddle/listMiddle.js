import React, { Component, Fragment, useState, useEffect } from 'react';
import { fade, makeStyles } from '@material-ui/core/styles';
import { Grid, Typography, Link } from '@material-ui/core';
import LocalBarIcon from '@material-ui/icons/LocalBar';
import LocalShippingIcon from '@material-ui/icons/LocalShipping';
import LoyaltyIcon from '@material-ui/icons/Loyalty';
import MoreIcon from '@material-ui/icons/More';
import ShoppingCartIcon from '@material-ui/icons/ShoppingCart';
import PostAddIcon from '@material-ui/icons/PostAdd';

const bodyObj = {
    paddingTop: '10px',
    paddingBottom: '6px'
  };

const useStyles = makeStyles(theme => ({
    bodys: {
        color: 'white',
      },
      Title: {
        fontSize: 26,
        fontWeight: '600',
        ...bodyObj
      },
      subTitle: {
        fontSize: 24,
        ...bodyObj
      },
      bodyTitle: {
        fontSize: 18,
        ...bodyObj
      },
      icon: {
        width: '1.5rem',
        height: '1.5rem',
        color: '#762057',
        marginRight: '1rem'
        },
        iconL: {
            width: '2rem',
            height: '2rem',
            color: '#762057'
            }
}));
const ListMiddle = () => {
    const classes = useStyles();

  return (
    <Fragment>
      <section className='container-fluid'>
            <Grid container spacing={1}>
              <Grid item md={12}>
              <Typography variant='h4' gutterBottom className={classes.Title}>
              Beneficios únicos
                </Typography>  </Grid>
                <Grid item md={12}>
                <Typography variant='h4' gutterBottom className={classes.subTitle}>
                Estos son algunos de los beneficios más valorados por nuestros socios:
                </Typography>
              </Grid>
              <Grid row md={12}>
              <Grid md={12} container direction="row" alignItems="center"><LocalBarIcon className={classes.icon}/>
              <Typography variant='body1' className={classes.bodyTitle}> Descubrir vinos seleccionados</Typography>
              </Grid>
              <Grid md={12} container direction="row" alignItems="center"><LocalShippingIcon className={classes.icon}/>
              <Typography variant='body1' className={classes.bodyTitle}> Envío gratis a todo el país</Typography>
              </Grid>
              <Grid md={12} container direction="row" alignItems="center"><LoyaltyIcon className={classes.icon}/>
              <Typography variant='body1' className={classes.bodyTitle}> Invitación a eventos y degustaciones</Typography>
              </Grid>
              <Grid md={12} container direction="row" alignItems="center"><ShoppingCartIcon className={classes.icon}/>
              <Typography variant='body1' className={classes.bodyTitle}> Ofertas exclusivas en la <Link href="#">Tienda BONVIVIR</Link></Typography>
              </Grid>
              <Grid md={12} container direction="row" alignItems="center"><PostAddIcon className={classes.icon}/>
              <Typography variant='body1' className={classes.bodyTitle}> Notas y maridajes</Typography>
              </Grid>
              <Grid md={12} container direction="row" alignItems="center"><MoreIcon className={classes.icon}/>
              <Typography variant='body1' className={classes.bodyTitle}> y mucho más...</Typography>
              </Grid>
              </Grid>
              </Grid>

      </section>
    </Fragment>
  );
};
export default ListMiddle;