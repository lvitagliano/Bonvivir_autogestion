import React from 'react';
import { createMuiTheme, withStyles, makeStyles, ThemeProvider } from '@material-ui/core/styles';
import {AppBar, Toolbar, Typography, IconButton, Grid} from '@material-ui/core';
import KeyboardBackspaceIcon from '@material-ui/icons/KeyboardBackspace';
import { useHistory } from "react-router-dom";

const useStyles = makeStyles({
    else: {
      backgroundColor: 'rgb(118, 32, 87)',
    }
  
  });

const AppBarComponent = (props) => {
    const classes = useStyles();
    const history = useHistory();

    return (
        <AppBar position="static">
        <Toolbar className={classes.else}> <Grid
          container
          direction="row"
          justify="space-between"
          alignItems="center"
        >
          <IconButton edge="start" className={classes.menuButton} onClick={() => history.goBack()}>
            <KeyboardBackspaceIcon style={{ fontSize: '22px', color:'#fff'}} />
          </IconButton>
          <Typography variant="h3"  style={{ fontWeight: '600', fontSize: '22px'}}>
            {props.title}
          </Typography>

          <Grid></Grid>
        </Grid>
        </Toolbar>
      </AppBar>
    )
}

export default AppBarComponent
