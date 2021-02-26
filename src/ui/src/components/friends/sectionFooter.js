import React, { Component, Fragment, useState, useEffect } from 'react';
import { fade, makeStyles } from '@material-ui/core/styles';
import { Grid } from '@material-ui/core';
import FirstSection from './SectionFooter/firstSection';

const useStyles = makeStyles(theme => ({
  body: {
    background: '#762057',
  }
}));

const SectionFooter = () => {
  const classes = useStyles();
  return (
    <Fragment>
      <section className={classes.body}>
        <div className='row'>
          <div className='col-md-12'>
            <div className='container'>
            <Grid container spacing={1} className={classes.gridBody}>
                <Grid item md={12}>
                  <FirstSection />
                </Grid>
              </Grid>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default SectionFooter;
