import React from 'react'
import { makeStyles } from '@material-ui/core/styles';
import {
  Paper,
  Grid,
  Button,
  IconButton,
  Typography,
  Table,
  TableBody,
  TableCell,
  TableContainer,
  TableHead,
  TablePagination,
  TableRow
} from '@material-ui/core';
import KeyboardBackspaceIcon from '@material-ui/icons/KeyboardBackspace';
import { Link } from 'react-router-dom';

const useStyles = makeStyles({
    title: {
      fontSize:22,
      fontWeight: '600',
      textAlign: '-webkit-center',
      paddingTop: '1.4rem',
      color: 'white',
      paddingRight: '4rem'
    },
    btnBack: {
      float: 'left'
    },
    btnBackIcon: {
      float: 'left',
      fontSize:28,
      fontWeight: '600',
      color: 'white'
    }
  });

const Headers = (props) => {
    const classes = useStyles();

    return (
        <Grid style={{ backgroundColor: '#762057', height: '6rem' }}>
        <Link style={{ textDecoration: 'none' }} to='/subscriptions'>
          <IconButton
            className={classes.btnBack}
            aria-label='upload picture'
            component='span'
          >
            <KeyboardBackspaceIcon className={classes.btnBackIcon} />
          </IconButton>
        </Link>
        <Typography className={classes.title}>{props.title}</Typography>
      </Grid>
    )
}

export default Headers

