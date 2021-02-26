import React, { Component, Fragment, useState,useEffect } from 'react';
import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';
import {
  Card,
  TextField,
  CardActions,
  CardContent,
  Button,
  Typography,
  makeStyles,
  Grid
} from '@material-ui/core';

const useStyles = makeStyles({
  root: {
    minWidth: '100%',
    '& .MuiOutlinedInput-root': {
      '& fieldset': {
        borderColor: '#982b71'
      },
      '&:hover fieldset': {
        borderColor: '#982b71'
      },
      '&.Mui-focused fieldset': {
        borderColor: '#762057'
      }
    }
  },
  bullet: {
    display: 'inline-block',
    margin: '0 2px',
    transform: 'scale(0.8)'
  },
  title: {
    fontSize: 26,
    textAlign: '-webkit-center'
  },
  pos: {
    marginBottom: 12
  },
  textField: {
    width: '100%'
  },
  grid: {
    padding: '.5rem',
    color: '#762057'
  },
  btnEdit: {
    backgroundColor: '#762057',
    borderColor: '#762057',
    color: 'white',
    '& .MuiButton-contained:hover': {
      borderColor: '#982b71'
    }
  },
  footContainer: {
    float: 'right'
  }
});

const StaticProfile = (props) => {
  const classes = useStyles();
  const bull = <span className={classes.bullet}>•</span>;

  return (
    <Fragment>
      <Grid container direction='row' justify='center' alignItems='flex-start'>
        <Card className={classes.root} variant='outlined'>
          <CardContent>
            <Typography className={classes.title} color='textSecondary' gutterBottom>Mi Perfil</Typography>

            <Grid
              container
              direction='row'
              justify='center'
              alignItems='flex-start'
            >
              <Grid item xs={12} className={classes.grid}>
                <Typography variant='h5' color='textSecondary'>
                  Datos Personales
                </Typography>
              </Grid>
              <Grid item xs={12} sm={6} md={3} className={classes.grid}>
                <TextField
                  id='nombre'
                  label='Nombre'
                  variant='outlined'
                  color='red'
                  className={classes.textField}
                  disabled
                  defaultValue = {props.cliente.firstName}
                />
              </Grid>
              <Grid item xs={12} sm={6} md={3} className={classes.grid}>
                <TextField
                  id='apellido'
                  label='Apellido'
                  variant='outlined'
                  className={classes.textField}
                  disabled
                  defaultValue = {props.cliente.lastName}
                />
              </Grid>
              <Grid item xs={12} sm={6} md={3} className={classes.grid}>
                <TextField
                  id='email'
                  label='Email'
                  variant='outlined'
                  className={classes.textField}
                  disabled
                  defaultValue = {props.cliente.email}
                />
              </Grid>
              <Grid item xs={12} sm={6} md={3} className={classes.grid}>
                <TextField
                  id='dni'
                  label='DNI / CUIL'
                  variant='outlined'
                  className={classes.textField}
                  disabled
                  defaultValue = {props.cliente.idNumber}
                />
              </Grid>

              <Grid container xs={12} sm={6}>
                <Grid item xs={12} className={classes.grid}>
                  <Typography variant='h5' color='textSecondary'>
                    Teléfono
                  </Typography>
                </Grid>
                <Grid item xs={4} sm={4} className={classes.grid}>
                  <TextField
                    id='areacod'
                    label='Cod. Área'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                    defaultValue = {props.cliente.AreaCode}
                  />
                </Grid>
                <Grid item xs={8} sm={8} className={classes.grid}>
                  <TextField
                    id='telefono'
                    label='Teléfono'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                    defaultValue = {props.cliente.PhoneNumber}
                  />
                </Grid>
              </Grid>

              <Grid container xs={12} sm={6}>
                <Grid item xs={12} className={classes.grid}>
                  <Typography variant='h5' color='textSecondary'>
                    Nacimiento
                  </Typography>
                </Grid>
                <Grid item xs={4} className={classes.grid}>
                  <TextField
                    id='dia'
                    label='Día'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                  />
                </Grid>
                <Grid item xs={4} className={classes.grid}>
                  <TextField
                    id='mes'
                    label='Mes'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                  />
                </Grid>
                <Grid item xs={4} className={classes.grid}>
                  <TextField
                    id='anio'
                    label='Año'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                  />
                </Grid>
              </Grid>

              <Grid container xs={12}>
                <Grid item xs={12} className={classes.grid}>
                  <Typography variant='h5' color='textSecondary'>
                    Domicilio
                  </Typography>
                </Grid>
                <Grid item xs={8} sm={4} className={classes.grid}>
                  <TextField
                    id='street'
                    label='Calle'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                  />
                </Grid>
                <Grid item xs={4} sm={2} className={classes.grid}>
                  <TextField
                    id='number'
                    label='Altura'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                  />
                </Grid>
                <Grid item xs={4} sm={2} className={classes.grid}>
                  <TextField
                    id='cp'
                    label='Cód Postal'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                  />
                </Grid>
                <Grid item xs={4} sm={2} className={classes.grid}>
                  <TextField
                    id='flour'
                    label='Piso'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                  />
                </Grid>
                <Grid item xs={4} sm={2} className={classes.grid}>
                  <TextField
                    id='dpto'
                    label='Dpto'
                    variant='outlined'
                    className={classes.textField}
                    disabled
                  />
                </Grid>
                {/* <Grid item xs={12} sm={6} className={classes.grid}>
      <TextField id="outlined-basic" label="Nombre" variant="outlined" className={classes.textField}/>
      </Grid>
      <Grid item xs={12} sm={6} className={classes.grid}>
      <TextField id="outlined-basic" label="Nombre" variant="outlined" className={classes.textField}/>
      </Grid>
      <Grid item xs={12} sm={6} className={classes.grid}>
      <TextField id="outlined-basic" label="Nombre" variant="outlined" className={classes.textField}/>
      </Grid>
      <Grid item xs={12} sm={6} className={classes.grid}>
      <TextField id="outlined-basic" label="Nombre" variant="outlined" className={classes.textField}/>
      </Grid> */}
              </Grid>
            </Grid>
          </CardContent>
          <CardActions className={classes.footContainer}>
          <Button
        size='large'
        variant='contained'
        className={classes.btnEdit}
        onClick={() => props.handleChange(true)}
      >
        Editar
      </Button>
          </CardActions>
        </Card>
      </Grid>
    </Fragment>
  );
};

export default StaticProfile;
