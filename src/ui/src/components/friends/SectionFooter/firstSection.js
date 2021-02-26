import React, { Component, Fragment, useState, useEffect } from 'react';
import { fade, makeStyles } from '@material-ui/core/styles';
import { Grid, Typography, IconButton, Divider  } from '@material-ui/core';
import DeleteIcon from '@material-ui/icons/Delete';

const bodyObj = {
    color: 'white',
    paddingTop: '10px',
    paddingBottom: '10px'
  };

const useStyles = makeStyles(theme => ({
  body: {
      marginTop: '2rem',
      marginBottom: '5rem',
      textAlign: '-webkit-center',
    ...bodyObj
  },
  hfTitle: {
    fontSize: 22,
    ...bodyObj
  },
  icon: {
    width: '5rem',
    height: '5rem',
    backgroundColor: 'white',
    color: '#8b189b',
    borderRadius: '50%'
    },
    divider: {
        height: '3px',
        backgroundColor: 'white',
        marginTop: '2rem',
      marginBottom: '2rem',
    }
}));

const FirstSection = () => {
  const classes = useStyles();
  return (
    <Fragment>
      <section className={classes.body}>
        <div className='row'>
          <div className='col-md-12'>
            <div className='container'>
            <Grid container direction="row" justify="center" alignItems="center" spacing={1} className={classes.body}>
                <Grid item md={12}>
                <Typography variant='h4' className={classes.hfTitle}>
                Si necesitás un poco más de información o querés aclarar alguna duda, podés llamarnos al teléfono (11) 5555-6958.
      </Typography>
      <Divider variant="middle"  className={classes.divider} />
      {/* <IconButton >
        <DeleteIcon className={classes.icon} />
      </IconButton> */}

                </Grid>
              </Grid>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default FirstSection;