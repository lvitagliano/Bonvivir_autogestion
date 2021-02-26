import React, { Component, Fragment, useState,useEffect } from 'react';
import { NavBar } from '../../components';
import { fade, makeStyles } from '@material-ui/core/styles';
import SectionForm from '../../components/friends/sectionForm'
import SectionMiddle from '../../components/friends/sectionMiddle'
import SectionFooter from '../../components/friends/sectionFooter'
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


const Friends = () => {
    const classes = useStyles();

    return (
    <Fragment>
       <section className={classes.body}>
      
       
      
    <NavBar textTitle='' />
    <SectionForm />
    <SectionMiddle />
    <SectionFooter />
      
        
  
      </section>

    </Fragment>
  );
};

export default Friends;