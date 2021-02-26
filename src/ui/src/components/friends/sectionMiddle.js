import React, { Component, Fragment, useState, useEffect } from 'react';
import { fade, makeStyles } from '@material-ui/core/styles';
import ImgMiddle from './SectionMiddle/imgMiddle';
import ListMiddle from './SectionMiddle/listMiddle';
import { Grid } from '@material-ui/core';

const useStyles = makeStyles(theme => ({
  gridBody: {
    paddingTop: '4rem',
    paddingBottom: '4rem'
  }
}));

const SectionMiddle = () => {
  const classes = useStyles();
  let isMobile = window.innerWidth <= 500;
  return (
    <Fragment>
      <section className='container-fluid'>
        <div className='row'>
          <div className='col-md-12'>
          <div className='container'>
            <Grid container spacing={1} className={classes.gridBody}>
                <Grid item md={6}>
                  <ImgMiddle />
                </Grid>
                <Grid item md={6}>
                  <ListMiddle />
                </Grid>
              </Grid>
              </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};
export default SectionMiddle;
