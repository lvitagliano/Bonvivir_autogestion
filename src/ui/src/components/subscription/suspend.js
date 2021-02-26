import React, { useState } from 'react';
import {  makeStyles } from '@material-ui/core/styles';
import { Button, Typography, Grid } from '@material-ui/core';
import { useHistory } from "react-router-dom";
import AppBar from '../../components/AppBar'
import moment from 'moment';
import Select from '../basicComponents/SelectMonthSuspend';
import { bonvivirApi } from '../../services';

const allBtn = {
    fontSize: 15,
    fontWeight: 600,
}
const useStyles = makeStyles({
    root: {
        textAlign: '-webkit-center'
    },
    divContent: {
        maxWidth: 500,
        margin: '2px',
        padding: '5px',
        //border: 'solid 1px'
    },
    title:{
        padding: '10px',
        margin: '5px'
    },
    titleSub:{
        padding: '10px',
        fontWeight:700
    },
    titleSub2:{
        padding: '10px',
        marginTop: '-12px',
        fontWeight:500
    },
    errorText: {
        color:'red',
        fontWeight:600,
        fontSize:'16px'
    },
    container: {
        maxHeight: 540,
        padding: '5px',
    },
    btnFactura: {
        backgroundColor: '#762057',
        ...allBtn,
        '&:hover': {
            backgroundColor: '#8e2769',
        }
    },
    btnMotivo: {
        ...allBtn,
        margin: '7px',
        padding: '4px',
        paddingLeft: '15px',
        paddingRight: '15px',
        backgroundColor: '#f1f1f1'

        
    },
    btnConfirm: {
        ...allBtn,
        margin: '7px',
        padding: '4px',
        paddingLeft: '15px',
        paddingRight: '15px',
        backgroundColor: 'rgb(118, 32, 87)',
        color:'#fff'

    },
});

const Suspend = props => {
    const classes = useStyles();
    const [state, setstate] = useState({
        firstMonth:'',
        lastMonth:'',
        finalyMonthState:[moment().add(2, 'month').format('YYYY-MM-DD'),moment().add(3, 'month').format('YYYY-MM-DD'),moment().add(4, 'month').format('YYYY-MM-DD')]
    })
    const history = useHistory();
    let initialMonth = []
    let initialGetMonth = moment()
    let finalyMonth = []

    if(day > 9) {
        initialGetMonth = moment().add(1, 'month');
    }
    let monthsFirstArray = Array(12).fill(1);
    monthsFirstArray.map((x) => {
        initialMonth.push(initialGetMonth.add(x, 'months').format('YYYY-MM-DD').toLocaleUpperCase())        
    })

    let day =moment().get('date');
    const [periodos, setPeriodos] = useState({
        desde:moment(),
        hasta:moment().add(1, 'months'),
        motivo:'',
        periodo:1
    })
    const [errors, setErrors] = useState({
        hidden: true,
        error:'',
    })

    async function suspendeFunction(data) {
        await bonvivirApi.suspend(data).then((orders) => {
       });
    }

    const handleChangeFirstValue = (value, date) => {
        finalyMonth = []
        const finaly = moment(initialMonth[value]).format('YYYY-MM-DD')
        const initialy = moment(date).subtract(1, 'months').format('YYYY-MM-DD')
        setPeriodos({ ...periodos, desde: initialy });
        
        for (let i = 1; i < 4; i++) {
            finalyMonth.push(moment(finaly).add(i, 'months').format('YYYY-MM-DD'))  
                    }
        setstate({
            ...state,
            finalyMonthState:finalyMonth
        })
      };

    const handleChangeLastValue = (value, date) => {
        console.log(value)
        console.log(date)
        setPeriodos({ ...periodos, hasta:date, periodo:value + 1
        });
      };

    const handleChangeMotivo = (values) => {
        setPeriodos({ ...periodos, motivo: values });
      };

    const handleSubmit = () => {

      
        const suspencion = 
            {
                "subscriptionId": props.data.id,
                "suspendFrom": moment(periodos.desde).format('YYYY-MM-DD'),
                "interval": periodos.periodo
            }
            suspendeFunction(suspencion)
            history.goBack()
      };

      return (
        <div className={classes.root}>
            <AppBar title='Suspender Suscripción' />
            <div className={classes.divContent} >
                <div className={classes.container}>
                    <div style={{ margin: '30px' }}>
                    <Typography className={classes.titleSub} variant="h3">{props.data ? props.data.offerItem.title : 'No hay selección'}</Typography>
                    <Typography className={classes.titleSub2} variant="h3">{props.data ? props.data.offerItem.description : ''}</Typography>
                    </div>
                    <div style={{ margin: '30px' }}>
                    <Typography variant="h4" className={classes.title}>Seleccionar Motivo</Typography>
                    <Button variant="contained" elevation={3} className={classes.btnMotivo} onClick={() => handleChangeMotivo('Vacaciones')}>Vacaciones</Button>
                    <Button variant="contained" className={classes.btnMotivo} onClick={() => handleChangeMotivo('Mudanza')}>Mudanza</Button>
                    <Button variant="contained" className={classes.btnMotivo} onClick={() => handleChangeMotivo('Otros')}>Otros</Button>
                    </div>
                    <div style={{ margin: '30px' }}>
                    <Typography variant="h4" className={classes.title}>Seleccionar Período</Typography>
                    <Typography variant="h6" className={classes.title}>La suspensión se puede realizar por un período máximo de 3 meses</Typography>
                    <Grid container direction="row" justify="space-evenly">
                        <div><Select label='DESDE' options={initialMonth} handleProps={handleChangeFirstValue} name="desde" /></div>
                        <div><Select label='HASTA' options={state.finalyMonthState} handleProps={handleChangeLastValue} name="hasta" /></div>
                    </Grid>
                
                    </div>
                 <Typography hidden={errors.hidden} className={classes.errorText}>{errors.error}</Typography>
                </div>
                <Button variant="contained" size="large" className={classes.btnConfirm} onClick={() => handleSubmit()}>
                    Guardar Cambios
                 </Button>

            </div>

        </div>

    );
};

export default Suspend;
