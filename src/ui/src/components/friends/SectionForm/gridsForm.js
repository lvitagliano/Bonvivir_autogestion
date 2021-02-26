import React, { Component, Fragment, useState, useEffect } from 'react';
import TextField from '@material-ui/core/TextField';
import { Typography, Grid, Input, OutlinedInput } from '@material-ui/core';
import { fade, makeStyles } from '@material-ui/core/styles';
import Logo from '../../../resources/images/imagen-socio.png';
import { useForm, Controller } from "react-hook-form";

const bodyObj = {
  color: 'white',
  paddingTop: '10px',
  paddingBottom: '10px'
};

const useStyles = makeStyles(theme => ({
  body: {
    ...bodyObj
  },
  textField: {
    fontSize: 15,
    backgroundColor: '#fdfdfd',
    margin: '5px',
    color: '#762057',
    '& .MuiOutlinedInput-input': {
      padding: '10px'
    }
    
  },
  grid: {
    padding: '5px',
    textAlign: 'center'
  }
}));

const GridsForm = (props) => {
  const classes = useStyles();

  return (
    <Fragment>
       <Grid md={12} style={{ padding: 5 }}>
       <Typography variant='body'>{props.invitado}</Typography>
       </Grid>
 <Grid md={4} style={{ padding:5 }}>
                        <Controller
                          as={
                            <OutlinedInput
                              fullWidth
                              inputRef={props.referencia}
                              onChange={() => props.handleChange}
                              value={props.Valor.value}
                              type="text"
                              placeholder='Nombre'
                              className={classes.textField}
                            />
                          }
                          id={props.name}
                          name={props.name}
                          control={props.control}
                        />
                      </Grid> 
                      <Grid md={4} style={{ padding: 4 }}>
                        <Controller
                          as={
                            <OutlinedInput
                              fullWidth
                              inputRef={props.referencia}
                              onChange={() => props.handleChange}
                              value={props.Valor.value}
                              type="text"
                              placeholder='Apellido'
                              className={classes.textField}
                            />
                          }
                          id={props.lastname}
                          name={props.lastname}
                          control={props.control}
                        />
                      </Grid> 

                      <Grid md={4} style={{ padding: 4 }}>
                        <Controller
                          as={
                            <OutlinedInput
                              fullWidth
                              inputRef={props.referencia}
                              onChange={() => props.handleChange}
                              value={props.Valor.value}
                              type="email"
                              placeholder='EMail'
                              className={classes.textField}
                            />
                          }
                          id={props.email}
                          name={props.email}
                          control={props.control}
                        />
                      </Grid>
                      
    </Fragment>
  );
};

export default GridsForm;
