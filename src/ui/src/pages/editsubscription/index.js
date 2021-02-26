import React, { Fragment, useState } from 'react';
import { NavBar } from '../../components';
import { fade, makeStyles } from '@material-ui/core/styles';
import EditSubscription from '../../components/subscription/editSubscriptions';
import Delivery from '../../components/subscription/delivery';
import querystring from "query-string";
import { Grid } from '@material-ui/core';
import { bonvivirApi } from '../../services';

const useStyles = makeStyles(theme => ({
  root: {
    flexGrow: 1,
    width: '100%',
  },
    body: {
     width: '100%',
     contain: 'layout'
    }
  }));

const EditSubscriptions = ({ location }) => {
  const classes = useStyles();
  
    const typeLoc = location.pathname.split('/');

    const renderType = (types) => {
        switch(types) {
            case 'delivery':
              return <Delivery id={typeLoc[3]}/>;
              case 'edit':
              return <EditSubscription id={typeLoc[3]}/>;
            default:
              return 'Error';
          }
    }

  return (
    <Fragment>
      <NavBar textTitle='' />
      <section className={classes.body}>
            <div >
            {
                renderType(typeLoc[2])
            }   
        </div>
      </section>
    </Fragment>
  );
};

export default EditSubscriptions;