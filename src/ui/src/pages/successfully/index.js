import React, { Component, Fragment, useState, useEffect } from 'react';
import { createMuiTheme, withStyles, makeStyles, ThemeProvider } from '@material-ui/core/styles';
import { NavBar } from '../../components';
import Success from '../../components/success';
import { PROFILE, FRIENDS, CHANGE_PASSWORD, SUSPEND } from '../../config/constantsText';

const useStyles = makeStyles({
  root: {
    textAlign: '-webkit-center'
  }

});

const Successfully = props => {
  const classes = useStyles();
  const successType = props.match.params.editId;
  const status = props.match.params.statusId;
  let typeMessage = []

  switch (successType) {
    case 'profile':
      typeMessage = PROFILE
      break;
    case 'friends':
      typeMessage = FRIENDS
      break;
    case 'password':
      typeMessage = CHANGE_PASSWORD
      break;
    case 'suspend':
      typeMessage = SUSPEND
      break;
    default:
      break;
  }
  return (
    <Fragment>
      <section className={classes.body}>
        <NavBar textTitle='' />
        <Success typeMessage={typeMessage} status={status} />
      </section>

    </Fragment>
  );
};

export default Successfully;