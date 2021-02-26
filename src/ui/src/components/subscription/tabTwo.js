import React, { Component, Fragment, useState, useEffect } from 'react';
import {
  Card,
  CardActions,
  CardContent,
  Button,
  Typography,
  makeStyles,
  Grid,
  MenuItem,
  InputLabel,
  Select,
  FormControl
} from '@material-ui/core';
import { useHistory } from "react-router-dom";
import Swal from 'sweetalert2'
import { useForm, Controller } from "react-hook-form";
import { bonvivirApi } from '../../services';
import { getCardTypeByValue } from '../../utils/cardTypesMock';
import validateCardNumber from '../../utils/validateCardNumber';


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
    width: '100%',
    fontSize: 16,
  },
  inputField: {
    fontSize: '16px',
    padding: '10px',
    borderColor: '#8c2165',
    border: 'solid 1.5px'
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


const TabTwo = (props) => {
  const classes = useStyles();
  const history = useHistory();
  const [suspendsActive, setSuspendsActive] = useState({
    suspendFrom: '',
    suspendTo: '',
    scheduled: false
  })
  const bull = <span className={classes.bullet}>•</span>;
  const [deshabilitado, setDeshabilitado] = useState("")
  const [state, setState] = useState({ 
    isLoading: false, 
    acceptedPaymentMethods: [],
    acepteds: true })
  const [data, setData] = useState({
    idNumber: '',
    creditCardOwner: '',
    lastDigits: ''
  })
  let promotions = ''

  const { register, errors, handleSubmit, reset, control } = useForm();

  const onSubmit = (data, e) => {
    editFunction()
  }

  const handleSelectChange = (event) => {

    setDeshabilitado(event.target.value)
  }

  async function componentDidMount() {
    setState({ isLoading: true })
    const suscripcion = props.person
    await bonvivirApi.getSubscription(suscripcion).then(async (user) => {
      const { creditCard } = user.data
      promotions = user.data.promotion
      
      setData({
        ...data,
        creditCardOwner: creditCard.creditCardOwner || '',
        lastDigits: creditCard.lastDigits || '',
      })

      await bonvivirApi.getSuspensionStatus(suscripcion).then((datos) => {
        if (datos.data.success) {
          setSuspendsActive({
            ...suspendsActive,
            suspendFrom: datos.data.message.suspendFrom,
            suspendTo: datos.data.message.suspendTo,
            scheduled: datos.data.message.scheduled
          })
        }
      })

      await bonvivirApi.getAcceptedPaymentMethods(promotions).then((acepted) => {
        setState({ 
          ...state,
          acceptedPaymentMethods: acepted.data,
          isLoading: false
        })
      })
    })
  }

  useEffect(() => {
    componentDidMount();
  }, []);

  const handleCardNumberChange = (event) => {
    const card = getCardTypeByValue(event.target.value);
    const isValid = validateCardNumber(event.target.value)

    if (event.target.value.length > 1){
      if (card.guid) {
        const filteredPaymentMethods = state.acceptedPaymentMethods.filter(obj => obj.issuerId === card.guid)
        
        let validPaymentMethod = '';
        validPaymentMethod =
         filteredPaymentMethods.length > 0 ? filteredPaymentMethods[0].id : '';
    
         setState({ 
          ...state,
          acepteds: true
        })
    
      }else{
        setState({ 
          ...state,
          acepteds: false
        })
      }
    }else{
      setState({ 
        ...state,
        acepteds: true
      })
    }
 

    handleChange(event);
  }

  const handleChange = (event) => {
    setData({
      ...data,
      [event.target.name]: event.target.value
    })
  }

  async function editFunction() {
    modalOk()
    const envio = {
      subscriptionId: props.person,
      creditCard: data
    }
    await bonvivirApi.patchSubscriptionCreditCard(envio).then((datos) => {
    });
  }

  function modalOk() {
    Swal.fire({
      icon: 'success',
      title: 'Datos guardados exitosamente!',
      confirmButtonText: `Ok`,
    }).then((result) => {
      /* Read more about isConfirmed, isDenied below */
      if (result.isConfirmed) {
        history.goBack()
      }
    })

  }


  const renderForm = (info) => {
    if (info) {
      return (
        <Fragment>
          <Grid container direction='row' justify='center' alignItems='flex-start'>
            <form onSubmit={handleSubmit(onSubmit)}>

              <Card className={classes.root} variant='outlined'>
                <CardContent>
                  <Grid
                    container
                    direction='row'
                    justify='center'
                    alignItems='flex-start'
                  >
                    <Grid container xs={12} container
                      direction='row'
                      justify='center'
                      alignItems='flex-start'>
                      <Grid item xs={8} sm={6} className={classes.grid}>
                        <FormControl variant="outlined" className={classes.textField}>
                          <InputLabel style={{ fontSize: '16px' }} id="state">Seleccionar tipo de tarjeta</InputLabel>
                          <Select
                            required
                            label="Seleccionar tipo de tarjeta"
                            labelWidth='48px'
                            id="state"
                            name="state"
                            value={deshabilitado}
                            onChange={handleSelectChange}
                            style={{ fontSize: '16px' }}
                            control={control}
                            ref={register}
                          >
                            <MenuItem style={{ fontSize: '16px' }} value="" disabled>Seleccionar tarjeta</MenuItem>
                            <MenuItem style={{ fontSize: '16px' }} value="credito">Tarjeta de crédito</MenuItem>
                            <MenuItem style={{ fontSize: '16px' }} value="debito">Tarjeta de débito</MenuItem>
                          </Select>
                        </FormControl>
                      </Grid>
                      <Grid item style={{ padding: '5px' }}>
                        <img
                          src={getCardTypeByValue(data.idNumber).image}
                          alt='logo'
                        />
                      </Grid>

                      <span
                        hidden={deshabilitado === 'credito' || deshabilitado === ''}
                        style={{
                          fontSize: '14px',
                          color: '#cf1b1b',
                          width: '80%',
                          margin: '0 auto 10px auto',
                          textAlign: 'center'
                        }}
                      >
                        No aceptamos tarjetas de débito Visa Electron, Mastecard Maestro
                        ni tarjetas recargables
            </span>
                    </Grid>
                    <Grid container xs={12} sm={6}>
                      <Grid item xs={12} className={classes.grid}>
                        <Typography variant='h5' color='textSecondary'>
                          Número de tarjeta
                  </Typography>
                      </Grid>
                      <Grid item xs={12} className={classes.grid}>
                        <FormControl variant="outlined" className={classes.textField}>
                          <input
                            disabled={deshabilitado !== 'credito'}
                            name="idNumber"
                            className={classes.inputField}
                            ref={register({
                              required: true,
                              minLength: 16,
                              maxLength: 16,
                            })}
                            type='number'
                            defaultValue={data.idNumber}
                            onChange={handleCardNumberChange}
                            style={{ borderColor: errors.idNumber && "red" }}
                            placeholder={'XXXXXXXXXXXX'+data.lastDigits}
                          />
                          {errors.idNumber && errors.idNumber.type === "maxLength" &&
                            <span>Ingresó {data.idNumber.length} caracteres, debe contener 16</span> ||
                            errors.idNumber && errors.idNumber.type === "minLength" &&
                            <span>Ingresó {data.idNumber.length} caracteres, debe contener 16</span>
                          }
                          {errors.idNumber && errors.idNumber.type === "required" &&
                            <span>Campo requerido</span>
                          }
                         {
                            !state.acepteds && <span>Intenta con otra tarjeta</span>
                         }
                        </FormControl>
                      </Grid>
                    </Grid>

                    <Grid container xs={12} sm={6}>
                      <Grid item xs={12} className={classes.grid}>
                        <Typography variant='h5' color='textSecondary'>
                          Titular
                    </Typography>
                      </Grid>
                      <Grid item xs={12} className={classes.grid}>
                        <FormControl variant="outlined" className={classes.textField}>
                          <input
                            className={classes.inputField}
                            ref={register({
                              required: true,
                              maxLength: 30
                            })}
                            defaultValue={data.creditCardOwner}
                            onChange={handleChange}
                            type="text"
                            placeholder='Titular de tarjeta'
                            name='creditCardOwner'
                            control={control}
                            style={{ borderColor: errors.creditCardOwner && "red" }}
                          />
                          {errors.creditCardOwner && errors.creditCardOwner.type === "required" &&
                            <span>Campo requerido</span>
                          }
                          {errors.creditCardOwner && errors.creditCardOwner.type === "maxLength" &&
                            <span>La cantidad máxima de caracteres es 30</span>
                          }
                        </FormControl>
                      </Grid>
                    </Grid>
                  </Grid>
                </CardContent>
                <CardActions className={classes.footContainer}>
                  <Button
                  disabled={!state.acepteds}
                    type='submit'
                    size='large'
                    variant='contained'
                    className={classes.btnEdit}
                  >
                    Guardar cambios
        </Button>
                </CardActions>
              </Card>
            </form>
          </Grid>
        </Fragment>
      )
    }
  }

  if (state.isLoading) {
    return <p>Cargando ...</p>;
  }

  return (
    <Fragment>
      {renderForm(data)}
    </Fragment>
  )
}

export default TabTwo