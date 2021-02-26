import React, { Component, Fragment, useState, useEffect } from 'react';
import Logo from '../../../resources/images/beneficios.png';
import { fade, makeStyles } from '@material-ui/core/styles';
import { Grid } from '@material-ui/core';

const useStyles = makeStyles(theme => ({
    bodys: {
        color: 'white',
 
      },
      grids: {
        textAlign: 'right'
      }
}));
const ImgMiddle = () => {
    const classes = useStyles();

  return (
    <Fragment>
      <section className='container-fluid'>
        <div className='row'>
          <div className='col-md-10'>
        
            <Grid container spacing={1}>
                <Grid item md={12} className={classes.grids} >
                <img className={classes.body} src={Logo} alt='logo' />
                </Grid>
               

              </Grid>
   
          </div>
        </div>
      </section>
    </Fragment>
  );
};
export default ImgMiddle;