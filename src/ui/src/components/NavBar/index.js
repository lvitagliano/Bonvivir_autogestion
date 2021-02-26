import React, { Fragment } from 'react';
import { makeStyles } from '@material-ui/core/styles';
import AppBar from '@material-ui/core/AppBar';
import Toolbar from '@material-ui/core/Toolbar';
import IconButton from '@material-ui/core/IconButton';
import Typography from '@material-ui/core/Typography';
import MenuItem from '@material-ui/core/MenuItem';
import Menu from '@material-ui/core/Menu';
import { Grid } from '@material-ui/core';
import { useAuth0 } from '@auth0/auth0-react';
import MoreIcon from '@material-ui/icons/MoreVert';
import Axios from 'axios';
import { useHistory } from 'react-router-dom';
import { useDispatch,useSelector } from 'react-redux';

import {setContact} from "../../actions/profile"
import AccountCircle from '../BackOfficeTables/icons/Account';
import Logo from '../../resources/images/logo-bv.svg';
import { MESSAGES } from '../../config/messages';
import { bonvivirApi } from '../../services';
import AUTH0CONFIG from '../../auth/auth0-config';
import { FRIENDS, PROFILE, SUBSCRIPTIONS, ROOT } from '../../routes';

const useStyles = makeStyles(theme => ({
  grow: {
    flexGrow: 1,
    backgroundColor: '#fff',
    color: '#762057',
    marginBottom: '10px'
  },
  iconBtn: {
    width: '1.5em',
    height: '1.5em'
  },
  menuButton: {
    marginRight: theme.spacing(2)
  },
  title: {
    fontWeight: '600',
    fontSize: 18,
    display: 'none',
    [theme.breakpoints.up('sm')]: {
      display: 'block'
    }
  },
  inputRoot: {
    color: 'inherit'
  },
  textColor: {
    color: '#762057',
    fontWeight: '600'
  },
  inputInput: {
    padding: theme.spacing(1, 1, 1, 0),
    // vertical padding + font size from searchIcon
    paddingLeft: `calc(1em + ${theme.spacing(4)}px)`,
    transition: theme.transitions.create('width'),
    width: '100%',
    [theme.breakpoints.up('md')]: {
      width: '20ch'
    }
  },
  sectionDesktop: {
    display: 'none',
    [theme.breakpoints.up('md')]: {
      display: 'flex'
    }
  },
  sectionMobile: {
    display: 'flex',
    [theme.breakpoints.up('md')]: {
      display: 'none'
    }
  },
  gridMargin: {
    margin: '.5rem',
    marginRight: '2rem'
  }
}));

const NavBar = () => {
  const {
    loading,
    user,
    logout,
    isAuthenticated,
    loginWithPopup,
    loginWithRedirect,
    getAccessTokenSilently,
    getIdTokenClaims
  } = useAuth0();
  const usuario = JSON.parse(localStorage.getItem('contact'));

  const classes = useStyles();
  const history = useHistory();

  const [anchorEl, setAnchorEl] = React.useState(null);
  const [mobileMoreAnchorEl, setMobileMoreAnchorEl] = React.useState(null);
  const isMenuOpen = Boolean(anchorEl);
  const isMobileMenuOpen = Boolean(mobileMoreAnchorEl);
  const dispatch = useDispatch();

  React.useEffect(() => {
    const storedContact = localStorage.getItem("contact") || {};

    if(Object.keys(storedContact).length){
      dispatch(setContact(JSON.parse(storedContact)));
    }

  },[]);

  const handleProfileMenuOpen = event => {
    setAnchorEl(event.currentTarget);
  };

  const handleMobileMenuClose = () => {
    setMobileMoreAnchorEl(null);
  };

  const handleMenuClose = () => {
    setAnchorEl(null);
    handleMobileMenuClose();
  };

  const handleMobileMenuOpen = event => {
    setMobileMoreAnchorEl(event.currentTarget);
  };

  const getContactInfo = async () => {
    const key = 'http://www.bonvivir.com/dni';
    const claims = await getIdTokenClaims();
    
    if(Object.keys(claims).length){
      const dni = claims[key] ? claims[key] : "";

      bonvivirApi.getContactInfo(dni).then((res) => {
        dispatch(setContact(res.data))
        
        if(res.data !== null){
          localStorage.setItem("contact", JSON.stringify(res.data));
            }
        
      });
    }

  };

  const handleLogin = async () => {
    await loginWithPopup();
    await getContactInfo();
  };

  const handleLogout = async () => {
    logout({
      returnTo: window.location.origin
    });
    dispatch(setContact({}))
    localStorage.removeItem('contact');
  };

  const handleChangePassword = () => {
    const userAuth = user;

    const data = {
      client_id: AUTH0CONFIG.CLIENT_ID,
      email: userAuth ? userAuth.email : '',
      connection: AUTH0CONFIG.CONNECTION
    };

    const headers = {
      'Content-Type': 'application/json'
    };

    Axios.post(AUTH0CONFIG.API_URL, data, {
      headers: headers
    })
      .then(response => {
        // TO DO: Mostrar mensaje que se envio un email para cambiar contraseña
      })
      .catch(error => {
        console.log(error);
      });

    history.push('/successfully/ok/password');
  };

  const MenuLogin = () => {
    return (
      <Fragment>
        <MenuItem onClick={handleMenuClose}>
          <a href={SUBSCRIPTIONS}>
            <h5 className={classes.textColor}>Mis Suscripciones</h5>{' '}
          </a>
        </MenuItem>
        <MenuItem onClick={handleMenuClose}>
          <a href={ROOT}>
            <h5 className={classes.textColor}>Nueva Suscripción</h5>{' '}
          </a>
        </MenuItem>
        <MenuItem onClick={() => handleChangePassword()}>
          <h5 className={classes.textColor}>Cambiar contraseña</h5>
        </MenuItem>
        <MenuItem onClick={() => handleLogout()}>
          <h5 className={classes.textColor}>Logout</h5>
        </MenuItem>
      </Fragment>
    );
  };

  const menuId = 'primary-search-account-menu';
  const renderMenu = (
    <Menu
      anchorEl={anchorEl}
      anchorOrigin={{ vertical: 'top', horizontal: 'right' }}
      id={menuId}
      keepMounted
      transformOrigin={{ vertical: 'top', horizontal: 'right' }}
      open={isMenuOpen}
      onClose={handleMenuClose}
    >
      {!isAuthenticated && !usuario ? (
        <MenuItem onClick={() => handleLogin()}>
          <h5 className={classes.textColor}>Login</h5>
        </MenuItem>
      ) : (
        <MenuLogin />
      )}
    </Menu>
  );
  const mobileMenuId = 'primary-search-account-menu-mobile';
  const renderMobileMenu = (
    <Menu
      anchorEl={mobileMoreAnchorEl}
      anchorOrigin={{ vertical: 'top', horizontal: 'right' }}
      id={mobileMenuId}
      keepMounted
      transformOrigin={{ vertical: 'top', horizontal: 'right' }}
      open={isMobileMenuOpen}
      onClose={handleMobileMenuClose}
    >
      {!isAuthenticated && !usuario ? (
        <MenuItem onClick={() => handleLogin()}>
          <h5 className={classes.textColor}>Login</h5>
        </MenuItem>
      ) : (
        <MenuLogin />
      )}
    </Menu>
  );

  return (
    <div className={classes.grow}>
      <AppBar className={classes.grow} position='static'>
        <Toolbar>
          <Grid className={classes.gridMargin}>
            <a
              className='col-md-2 col-xs-12 navbarb__container-logo-image no-margin'
              href='https://bonvivir.com'
            >
              <img className='navbarb__logo-image' src={Logo} alt='logo' />
            </a>
          </Grid>
          {usuario ? null : (
            <Typography className={classes.title} noWrap>
              {MESSAGES.TITLE_REGISTRATION}
            </Typography>
          )}

          <div className={classes.grow} />
          <div className={classes.sectionDesktop}>
            <h4 />
            {/* <Button variant="outlined" size="large"><h6>Login</h6></Button> */}
            <IconButton
              edge='end'
              size='large'
              aria-controls={menuId}
              onClick={handleProfileMenuOpen}
              color='inherit'
              placeholder='hello'
            >
              {usuario ? 'Hola ' + usuario.firstName + '!   ' : null}
              <AccountCircle className={classes.iconBtn} />
            </IconButton>
          </div>
          <div className={classes.sectionMobile}>
            <IconButton
              aria-label='show more'
              aria-controls={mobileMenuId}
              aria-haspopup='true'
              onClick={handleMobileMenuOpen}
              color='inherit'
            >
              <MoreIcon />
            </IconButton>
          </div>
        </Toolbar>
      </AppBar>
      {renderMobileMenu}
      {renderMenu}
    </div>
  );
};

export default NavBar;
