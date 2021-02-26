import { makeStyles } from '@material-ui/core';

const centeredStyleObj = {
    display: 'flex',
    alignItems: 'left',
    justifyContent: 'left'
};

export default makeStyles((theme) => ({
    divTable: {
        fontSize: 12,
        padding: 14,
        width: '100%',
        ...centeredStyleObj,
    },
    td: {
        padding: 5,
    }

     
        }));