import React, { Component, Fragment, useState, useEffect } from 'react';
import axios from 'axios';
import { Typography, Grid, Link, Button } from '@material-ui/core';
import { fade, makeStyles } from '@material-ui/core/styles';
import { useAuth0 } from '@auth0/auth0-react';
import { bonvivirApi } from '../../../services';
import { CONSTANTS } from '../../../config/constants';

const bodyObj = {
  color: 'white',
  paddingTop: '10px',
  paddingBottom: '10px'
};

const useStyles = makeStyles(theme => ({
  body: {
    color: 'white',
    paddingLeft: '2rem',
    paddingRight: '2rem'
  },
  title: {
    fontSize: 26,
    ...bodyObj
  },
  subTitle: {
    fontSize: 20,
    ...bodyObj
  },
  hTitle: {
    fontSize: 20,
    ...bodyObj
  },
  hfTitle: {
    fontSize: 19,
    ...bodyObj
  }
}));

const TextForm = () => {
  const classes = useStyles();
  const [state, setState] = useState({ isLoading: false, data: [] });
  const { GET_CONTACT_LOCAL } = CONSTANTS;
  const {
    loading,
    user,
    logout,
    isAuthenticated,
    loginWithPopup,
    getAccessTokenSilently,
    getIdTokenClaims
  } = useAuth0();
  const usuario = JSON.parse(localStorage.getItem('contact'));
  const handleLogin = async () => {
    await loginWithPopup();
    getContactInfo();
  };

  useEffect(() => {
    componentDidMount();
  }, []);

  function componentDidMount() {
    setState({ isLoading: true });
    axios
      .get(GET_CONTACT_LOCAL + usuario.idNumber)
      .then(result =>
        setState({
          data: result.data,
          isLoading: false
        })
      )
      .catch(error =>
        this.setState({
          error,
          isLoading: false
        })
      );
  }

  if (state.error) {
    return <p>{state.error.message}</p>;
  }

  if (state.isLoading) {
    return <p style={{ color: 'white' }}>Cargando ...</p>;
  }

  const getContactInfo = async () => {
    const key = 'http://www.bonvivir.com/dni';
    const claims = await getIdTokenClaims();
    const dni = claims ? claims[key] : '';

    bonvivirApi.getContactInfo(dni).then(contact => {
      localStorage.setItem('contact', JSON.stringify(contact.data));
    });
  };

  return (
    <Fragment>
      <section className={classes.body}>
        <div className='row'>
          <div className='container'>
            <div className='col-md-12'>
              <Typography
                variant='h1'
                component='h2'
                gutterBottom
                className={classes.title}
              >
                ¡Celebrá la amistad!
              </Typography>
              <Typography
                variant='h6'
                gutterBottom
                className={classes.subTitle}
              >
                Vos y tu amigo se pueden llevar una Selección BONVIVIR gratis
                para cada uno.
              </Typography>
              <Typography variant='h6' className={classes.hTitle}>
                Por cada amigo que se suscriba, te bonificamos tu próxima caja y
                ellos se llevan una selección gratis.
              </Typography>
              <Typography variant='h6' className={classes.hfTitle}>
                Verificá que tus datos sean correctos:
              </Typography>
              <Grid>
                {isAuthenticated ? (
                  <Typography variant='h4'>
                    {usuario.firstName} {usuario.lastName}
                  </Typography>
                ) : (
                  <Button
                    onClick={handleLogin}
                    size='large'
                    variant='outlined'
                    color='inherit'
                  >
                    <h5>Login</h5>
                  </Button>
                )}
              </Grid>
            </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default TextForm;
