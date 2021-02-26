import React, { Component, Fragment, useState, useEffect } from 'react';
import { fade, makeStyles } from '@material-ui/core/styles';
import { Grid } from '@material-ui/core';
import Logo from '../../resources/images/bg-violeta.jpg';
import TextForm from './SectionForm/text';
import FormImg from './SectionForm/form';

const useStyles = makeStyles(theme => ({
  body: {
    background: '#762057',
    marginTop: '-10px',
    paddingTop: 40
  },
  gridBody: {
    paddingLeft: 45,
    paddingRight: 45
  },
  gridOk: {
    paddingTop: 45,
    paddingBottom: 45
  }
}));

const FriendForm = () => {
  const classes = useStyles();
  let isMobile = window.innerWidth <= 500;
  return (
    <Fragment>
      <section className={classes.body}>
        <div className='row'>
          <div className='col-md-12'>
        
              <Grid container spacing={1} className={classes.gridBody, !isMobile? classes.gridBody: null}>
                <Grid item md={6}>
                  <TextForm />
                </Grid>
                <Grid item md={6}>
                  <FormImg />
                </Grid>
              </Grid>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default FriendForm;
