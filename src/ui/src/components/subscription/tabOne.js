import React, { Component, Fragment, useState, useEffect } from 'react';
import {
  Card,
  TextField,
  CardActions,
  CardContent,
  Button,
  Typography,
  makeStyles,
  Grid,
  Link,
  OutlinedInput,
  MenuItem,
  InputLabel,
  Select,
  FormControl
} from '@material-ui/core';
import Swal from 'sweetalert2'
import moment from 'moment';
import { useHistory } from "react-router-dom";
import { useForm, Controller } from "react-hook-form";
import { bonvivirApi } from '../../services';
import { options } from '../../components/RegistrationStepThree/options';

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
    fontSize: '40px'
  },
  grid: {
    padding: '.5rem',
    color: '#762057',

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
  },
  linkSubscription: {
    marginRight: '55px'
  }
});

const TabOne = (props) => {
  let scheduler = false
  const classes = useStyles();
  const { register, errors, handleSubmit, reset, control } = useForm({});
  const bull = <span className={classes.bullet}>•</span>;
  const [state, setState] = useState({ isLoading: false })
  const [visible, setVisible] = useState(true)
  const [suspendsActive, setSuspendsActive] = useState({
    suspendFrom: '',
    suspendTo: '',
    scheduled: false
  })

  const [data, setData] = useState({
    street: '',
    doorNumber: '',
    floor: '',
    apartment: '',
    district: '',
    zone: '',
    city: '',
    state: '',
    zipCode: '',
    comments: ''
  })
  const history = useHistory();

  async function componentDidMount() {
    setState({ isLoading: true })
    const suscripcion = props.person
    await bonvivirApi.getSubscription(suscripcion).then(async (user) => {
      const { address = {} } = user.data
      console.log('addressc',address)
      const Provincia = options.filter(obj => obj.description === 'BUENOS AIRES')
      setData({
        ...data,
        street: address.street || '',
        doorNumber: address.doorNumber || '',
        floor: address.floor || '',
        apartment: address.apartment || '',
        district: address.district || '',
        zone: address.zone || '',
        city: address.city || '',
        state: Provincia[0].value || '',
        zipCode: address.zipCode || '',
        comments: address.comments || ''
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
        setState({ isLoading: false })
      })
    })
  }

  useEffect(() => {
    componentDidMount();
  }, []);

  const onSubmit = (data, e) => {
    editFunction()
  }
  const handleChange = (event) => {
    setData({
      ...data,
      [event.target.name]: event.target.value
    })
  }

  const handleOnBlurAddress = () => {
    if (
      data.street !== '' &&
      data.doorNumber !== '' &&
      data.zipCode !== ''
    ) {
      let standarizado = {
        street: data.street,
        doorNumber: data.doorNumber,
        zipCode: data.zipCode
      }
      bonvivirApi.postAddressToStandardize(standarizado).then(getData => {

        if (getData.data === 'Not Found') {
          setVisible(false)
        } else {
          setVisible(true)
          const Provincia = options.filter(obj => obj.description === getData.data.state)
          setData({
            ...data,
            street: getData.data.street || '',
            doorNumber: getData.data.doorNumber || '',
            floor: getData.data.floor || '',
            apartment: getData.data.apartment || '',
            district: getData.data.zone || '',
            zone: getData.data.zone || '',
            city: getData.data.city || '',
            state: Provincia[0].value || '',
            zipCode: getData.data.zipCode || '',
            comments: getData.data.comments || ''
          })

        }

      });
    }
  };
  async function editFunction() {
    modalOk()
    const envio = {
      subscriptionId: props.person,
      address: data
    }
    await bonvivirApi.patchSubscriptionAddress(envio).then((datos) => {
    });
  }

  function modalOk() {
    Swal.fire({
      icon: 'success',
      title: 'Datos guardados exitosamente!',
      confirmButtonText: `Ok`,
    }).then((result) => {
      if (result.isConfirmed) {
        history.goBack()
      }
    })

  }

  const renderForm = (info) => {
    if (info) {
      return (
        <Grid container direction='row' justify='center' alignItems='flex-start' >
          <form onSubmit={handleSubmit(onSubmit)}>
            <Card className={classes.root} variant='outlined'>
              <CardContent>
                <Grid
                  container
                  direction='row'
                  justify='center'
                  alignItems='flex-start'
                >
                  <Grid container xs={12}>
                    <Grid item xs={12} className={classes.grid}>
                      <Typography variant='h5' color='textSecondary' style={{ fontSize: "19px" }}>
                        Domicilio
                      </Typography>
                    </Grid>
                    <Grid container xs={12}>
                      <Grid item xs={12} className={classes.grid}>
                        <TextField
                          required
                          fullWidth
                          variant='outlined'
                          label='Calle'
                          inputRef={register}
                          value={data.street}
                          onChange={handleChange}
                          type="text"
                          placeholder='Calle'
                          className={classes.textField}
                          id='street'
                          name='street'
                          control={control}
                          onBlur={handleOnBlurAddress}
                        />
                      </Grid>
                      <Grid item xs={4} className={classes.grid}>
                        <TextField
                          required
                          fullWidth
                          variant='outlined'
                          label='Altura'
                          inputRef={register}
                          value={data.doorNumber}
                          onChange={handleChange}
                          type="text"
                          placeholder='Altura'
                          className={classes.textField}
                          id='doorNumber'
                          name='doorNumber'
                          control={control}
                          onBlur={handleOnBlurAddress}
                        />
                      </Grid>
                      <Grid item xs={4} className={classes.grid}>
                        <TextField
                          required
                          fullWidth
                          variant='outlined'
                          label='Cód. Postal'
                          inputRef={register}
                          value={data.zipCode}
                          onChange={handleChange}
                          type="text"
                          placeholder='Cód. Postal'
                          className={classes.textField}
                          id='zipCode'
                          name='zipCode'
                          control={control}
                          onBlur={handleOnBlurAddress}
                        />
                      </Grid>
                      <Grid item xs={4} className={classes.grid}>
                        <TextField

                          fullWidth
                          variant='outlined'
                          label='Piso'
                          inputRef={register}
                          value={data.floor}
                          onChange={handleChange}
                          type="text"
                          placeholder='Piso'
                          className={classes.textField}
                          id='floor'
                          name='floor'
                          control={control}
                        />
                      </Grid>

                    </Grid>
                    <Grid item xs={6} className={classes.grid}>
                      <TextField
                        fullWidth
                        variant='outlined'
                        label='Departamento'
                        inputRef={register}
                        value={data.apartment}
                        onChange={handleChange}
                        type="text"
                        placeholder='Departamento'
                        className={classes.textField}
                        id='apartment'
                        name='apartment'
                        control={control}
                      />
                    </Grid>
                    <Grid hidden={visible} item xs={6} className={classes.grid}>
                      <TextField
                        fullWidth
                        variant='outlined'
                        label='Barrio'
                        inputRef={register}
                        value={data.district}
                        onChange={handleChange}
                        type="text"
                        placeholder='Barrio'
                        className={classes.textField}
                        id='district'
                        name='district'
                        control={control}
                      />
                    </Grid>
                    <Grid item xs={6} hidden={visible} className={classes.grid}>
                      <TextField
                        required
                        fullWidth
                        variant='outlined'
                        label='Partido'
                        inputRef={register}
                        value={data.zone}
                        onChange={handleChange}
                        type="text"
                        placeholder='Partido'
                        className={classes.textField}
                        id='zone'
                        name='zone'
                        control={control}
                      />
                    </Grid>
                    <Grid item xs={6} className={classes.grid}>
                      <FormControl variant="outlined" className={classes.textField}>
                        <InputLabel id="state">Provincia</InputLabel>
                        <Select
                          required
                          labelId="Provincia"
                          id="state"
                          name="state"
                          value={data.state}
                          onChange={handleChange}
                          label="Provincia"
                          control={control}
                          ref={register}
                        >
                          {
                            options.map(provincias => {
                              return <MenuItem value={provincias.value}>{provincias.description}</MenuItem>
                            })
                          }
                        </Select>
                      </FormControl>
                    </Grid>
                    <Grid item xs={12} className={classes.grid}>
                      <TextField
                        fullWidth
                        variant='outlined'
                        label='Comentario'
                        inputRef={register}
                        value={data.comments}
                        onChange={handleChange}
                        type="text"
                        placeholder='Comentario'
                        className={classes.textField}
                        id='comments'
                        name='comments'
                        control={control}
                      />
                    </Grid>
                  </Grid>
                </Grid>
              </CardContent>
              <CardActions className={classes.footContainer}>
                {
                  suspendsActive.scheduled
                    ? <Typography variant='h5' className={classes.linkSubscription}>
                      {`Suscripción Suspendida desde ${moment(suspendsActive.suspendFrom).format('LL')} hasta ${moment(suspendsActive.suspendTo).format('LL')}`}
                    </Typography>
                    : <Typography variant='h5' className={classes.linkSubscription}>
                      <Link href="" onClick={() => history.push(`/suspendsubscription/${info.person}`)}>
                        Suspender Suscripción
              </Link>
                    </Typography>

                }

                <Button
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

      )

    }


  }

  if (state.isLoading) {
    return <p>Cargando ...</p>;
  }

  return (
    <Fragment>
      {renderForm(props)}
    </Fragment>
  )
}

export default TabOne
