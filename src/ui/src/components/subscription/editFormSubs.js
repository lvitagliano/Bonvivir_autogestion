import React, { Component, Fragment, useState, useEffect } from 'react';
import axios from "axios";
import PropTypes from 'prop-types';
import { makeStyles } from '@material-ui/core/styles';
import { Typography, Box, Tab, Tabs, AppBar } from '@material-ui/core';
import Headers from './headers'
import TabOne from './tabOne'
import TabTwo from './tabTwo'
import { withRouter } from 'react-router-dom';
import queryString from 'query-string';
import { CONSTANTS } from '../../config/constants';

function TabPanel(propierties) {
  const { children, value, index, ...other } = propierties;

  return (
    <div
      role="tabpanel"
      hidden={value !== index}
      id={`nav-tabpanel-${index}`}
      aria-labelledby={`nav-tab-${index}`}
      {...other}
    >
      {value === index && (
        <Box p={3}>
          <Typography>{children}</Typography>
        </Box>
      )}
    </div>
  );
}

TabPanel.propTypes = {
  children: PropTypes.node,
  index: PropTypes.any.isRequired,
  value: PropTypes.any.isRequired,
};

function a11yProps(index) {
  return {
    id: `nav-tab-${index}`,
    'aria-controls': `nav-tabpanel-${index}`,
  };
}

function LinkTab(props) {
  return (
    <Tab
      component="a"
      style={{fontSize:"15px"}}
      onClick={(event) => {
        event.preventDefault();
      }}
      {...props}
    />
  );
}

const useStyles = makeStyles((theme) => ({
  root: {
    flexGrow: 1,
    backgroundColor: '#982b71',
    '& .MuiTab-textColorInherit.Mui-selected': {
      backgroundColor: 'whitesmoke',
      color: 'black',
      fontSize: 18,
      fontWeight: '600',
  },
  '& .MuiTab-textColorInherit':{
    fontSize:18,
    fontWeight: '600',
},

  '& a:focus, a:hover': {
    color: 'white',
    fontSize:20,
},
},
Indicator:{
  backgroundColor: 'transparent',
}
 
}));

const NavTabs = (datos) => {
    const { GET_SUBSCRIPTION_KW } = CONSTANTS;
    const usuario = JSON.parse(localStorage.getItem("contact"));
    const [state, setState] = useState({ isLoading: false, subscriptions: []})
    const classes = useStyles();
    const [value, setValue] = React.useState(0);
    const handleChange = (event, newValue) => {
      setValue(newValue);
    };    

  async function componentDidMount() {
    setState({isLoading: true})
     
      
      setState({isLoading: false})
  }

  useEffect(() => {
   
    componentDidMount();
  }, []);

  if (state.error) {
    return <p>{state.error.message}</p>;
  }

  if (state.isLoading) {
    return <p>Cargando ...</p>;
  }

  return (
    <Fragment>
    <Headers title='Editar Suscripción'/>
      <AppBar position="static" className={classes.root}>
        <Tabs 
          classes={{ indicator: classes.Indicator}}    
          variant="fullWidth"
          value={value}
          onChange={handleChange}
          aria-label="nav tabs example"
        >
          <LinkTab label="Datos de envío" className={classes.pepe} {...a11yProps(0)}/>
          <LinkTab label="Datos de facturación" className={classes.pepe} {...a11yProps(1)}/>
        </Tabs>
      </AppBar>
      <TabPanel value={value} index={0}>
        <TabOne  person={datos.params}/>
      </TabPanel>
      <TabPanel value={value} index={1}>
      <TabTwo person={datos.params}/> 
      </TabPanel>
    </Fragment>
  );
}

export default withRouter(NavTabs);