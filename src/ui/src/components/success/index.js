import React from 'react'
import { createMuiTheme, withStyles, makeStyles, ThemeProvider } from '@material-ui/core/styles';
import { Paper, Button, Grid } from '@material-ui/core';
import iconCup from '../../resources/images/icon-cup.png';
import classnames from 'classnames';
import { useHistory } from "react-router-dom";
import CheckCircleOutlineIcon from '@material-ui/icons/CheckCircleOutline';
import ErrorOutlineIcon from '@material-ui/icons/ErrorOutline';
import PauseCircleOutlineIcon from '@material-ui/icons/PauseCircleOutline';
import AppBar from '../AppBar'



const useStyles = makeStyles({
  root: {
    textAlign: '-webkit-center'
  },
  divContent: {
    maxWidth: 500,
    margin: '2px',
    padding: '5px',

  },
  container: {
    minHeight: 250,
    padding: '25px',
  },
  btnFactura: {
    backgroundColor: '#762057',
    fontSize: 16,
    margin: '20px',
    fontWeight: 600,
    '&:hover': {
      backgroundColor: '#8e2769',

    }
  },
  iconSuccess:{
    fontSize: '10rem', 
    color: 'rgb(128 114 114)'
  }

});

const Success = (props) => {

  const classes = useStyles();
  const history = useHistory();

  function Iconos() {
    switch (props.status) {
      case 'ok':
        return <CheckCircleOutlineIcon className={classes.iconSuccess}/>
        break;
      case 'stop':
        return <PauseCircleOutlineIcon className={classes.iconSuccess}/>
        break;
      default:
        return <ErrorOutlineIcon className={classes.iconSuccess} />
        break;
    }
  }

  return (
    <div className={classes.root}>
    <AppBar title={props.typeMessage.TITLETEXT}/>
      <div className={classes.divContent} >
        <div className={classes.container}>
          <div className='title__h3'>
            {
              Iconos()
            }
          </div>
        </div>
        <div className='registration__title helpers__flex'>
          <h3 className='title__h3'>
            {
              props.status === 'ok' ? props.typeMessage.MESSAGETEXT : props.typeMessage.ERRORSUCCESS
            }
          </h3>
        </div>
        <Button variant="contained" size="large" color='primary' className={classes.btnFactura} onClick={() => history.push(props.typeMessage.URLTEXT)}>
          {props.typeMessage.BUTTONTEXT}
        </Button>
      </div>
    </div>
  )
}

export default Success;
