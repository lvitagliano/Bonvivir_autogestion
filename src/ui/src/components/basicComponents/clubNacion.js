import React, { Fragment } from 'react'
import Image from 'material-ui-image';
import { makeStyles } from '@material-ui/core/styles';
import Avatar from '@material-ui/core/Avatar';

const useStyles = makeStyles((theme) => ({
  large: {
    width: '100%',
    height: '50%'
  },
}));

const ClubNacion = () => {
    const classes = useStyles();
    
    return (
        <Fragment>
             <img className={classes.large}
             src="/images/la-nacion.png"
             width="20%"
            />

        </Fragment>
    )
}

export default ClubNacion;