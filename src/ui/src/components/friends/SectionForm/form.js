/* eslint-disable padding-line-between-statements */
/* eslint-disable no-var */
import React, { Component, Fragment, useState, useEffect } from 'react';
import axios from "axios";
import { Typography, Grid, Button, OutlinedInput, TextField } from '@material-ui/core';
import { fade, makeStyles } from '@material-ui/core/styles';
import Logo from '../../../resources/images/imagen-socio.png';
import GridsForm from './gridsForm'
import Icon from '@material-ui/core/Icon';
import SaveIcon from '@material-ui/icons/Save';
import { useForm, Controller } from "react-hook-form";
import { CONSTANTS } from '../../../config/constants';
import { useHistory } from "react-router-dom";
import { CAMPAING_PROMOTION_FRIENDS } from '../../../config/constantsText';

const bodyObj = {
  color: 'white',
  paddingTop: '10px',
  paddingBottom: '10px'
};

const useStyles = makeStyles(theme => ({
  bodys: {
    color: 'white',
    paddingLeft: '3rem',
    paddingRight: '3rem',
  },
  body: {
    width: '100%',
    ...bodyObj
  },
  Title: {
    fontSize: 20,
    paddingLeft: '1rem',
    paddingRight: '1rem',
    ...bodyObj
  },
  textField: {
    fontSize: 20,
    backgroundColor: '#fdfdfd',
    margin: '5px',
    color: '#8e2769'
  },
  margin: {
    fontSize: 18,
    color: 'white',
    borderColor: '#edecea',
    borderWidth: '2px',
    '&:hover': {
      backgroundColor: '#8e2769',

    }
  },
  grid: {
    textAlign: '-webkit-center',
    margin: '1.6rem'
  }
}));

const FormImg = () => {
  const classes = useStyles();
  const history = useHistory();
  const usuario = JSON.parse(localStorage.getItem('contact'))

  const { POST_REFERS, POST_LEADS } = CONSTANTS;
  let totalGrid = 4;
  const [state, setState] = useState({ isLoading: false, subscriptions: [] })
  let rows = [];
  const [values, setDatos] = useState({
    name_1: "",
    name_2: "",
    name_3: "",
    email_1: "",
    email_2: "",
    email_3: ""
  });
  const [datosP, setDatosP] = useState([]);
  const { register, errors, handleSubmit, reset, control } = useForm({});

  const rowsForm = (total) => {
    if (total) {
      for (var i = 1; i < total; i++) {
        let invitationObj = {
          name: "name_" + i,
          email: "email_" + i
        }
        rows.push(invitationObj);
      }
    }
  }


  function renderForm(row) {
    if (row) {
      row.map(function (obj) {
        return <h1>{obj.name}</h1>
      });
    } else {
      return <h1>objname</h1>
    }


  }


  function handleTotalPlus() {
    totalGrid = totalGrid + 1
  }

  function handleTotalMinus() {
    totalGrid = totalGrid - 1
  }

  const onSubmit = (data, e) => {
    debugger;
    let datos
    let leads
    const user = JSON.parse(localStorage.getItem('contact'));
    const referer = `${user.firstName + ' ' + user.lastName}`;
    e.preventDefault();
    for (var i = 1; i < totalGrid; i++) {
      let refered = data[`name_${i}`] + ' ' + data[`lastname_${i}`];

      datos = {
        referredName: refered,
        referredEmail: data[`email_${i}`],
        referrerId: '1'
      }
      leads = {
        firstName: data[`name_${i}`],
        lastName: data[`lastname_${i}`],
        email: data[`email_${i}`],
        campaign: CAMPAING_PROMOTION_FRIENDS.CAMPAINGN,
        subject: CAMPAING_PROMOTION_FRIENDS.SUBJECT,
        utms: `<p>${refered}, ¡${referer} quiere que te suscribas a Bonvivir!</p><p><a href="${CAMPAING_PROMOTION_FRIENDS.UTMS + usuario.id}">Suscribite</a></p>`
      }
      axios.post(POST_REFERS, datos)
      axios.post(POST_LEADS, leads)

    }

    history.push("/successfully/ok/friends")
  };



  const handleChangeValue = (event) => {
    setDatos({
      ...values,
      [event.target.name]: event.target.value,
    });
  };


  if (state.error) {
    return <p>{state.error.message}</p>;
  }

  if (state.isLoading) {
    return <p>Cargando ...</p>;
  }

  return (
    <Fragment>
      <section className={classes.bodys}>
        <div className='row'>
          <div className='container'>
            <div className='col-md-12'>
              <Grid container spacing={1}>
                <Grid item md={12}>
                  <img className={classes.body} src={Logo} alt='logo' />
                </Grid>

                <Grid item md={12}>
                  <Typography
                    variant='h4'
                    component='h2'
                    gutterBottom
                    className={classes.Title}
                  >
                    Completá el siguiente formulario con los datos de contacto de
                    tus amigos y comenzá a ganar meses gratis de tu suscripción.
                </Typography>
                  <form onSubmit={handleSubmit(onSubmit)}>
                    <Grid container
                      direction="row"
                      justify="center"
                      alignItems="center"
                    >
                      <GridsForm control={control} Valor={values} invitado='Invitado 1' referencia={register} handleChange={handleChangeValue} email='email_1' lastname='lastname_1' name='name_1' />
                      <GridsForm control={control} Valor={values} invitado='Invitado 2' referencia={register} handleChange={handleChangeValue} email='email_2' lastname='lastname_2' name='name_2' />
                      <GridsForm control={control} Valor={values} invitado='Invitado 3' referencia={register} handleChange={handleChangeValue} email='email_3' lastname='lastname_3' name='name_3' />
                    </Grid>


                    {/* <Grid style={{marginBottom:'15px'}}
                        container
                        direction="row"
                        justify="space-around"
                        alignItems="center"
                      >

                        <Button
                          size="large"
                          color="inherit"
                          className={classes.button}
                          startIcon={<Icon>removeCircleOutline</Icon>}
                          onClick={handleTotalMinus}
                        > <h6>Quitar</h6>
                        </Button>

                        <Button
                          size="large"
                          color="inherit"
                          className={classes.button}
                          endIcon={<Icon>add</Icon>}
                          onClick={handleTotalPlus}
                        > <h6>Agregar Más</h6>
                        </Button>
                      </Grid> */}
                    <Grid item md={12} className={classes.grid}>


                      <Button variant="outlined" size="large" className={classes.margin} type='submit'>
                        ENVIAR INVITACIONES
                    </Button>
                    </Grid>
                  </form>
                </Grid>
              </Grid>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default FormImg;
