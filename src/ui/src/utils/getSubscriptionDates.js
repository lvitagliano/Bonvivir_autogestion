import moment from 'moment';

const getWedOfMonth = date => {
    const wedArray = [];
    let wed = moment(date).startOf('month').day(3 + 7); 

    if (wed.date() > 7){
      wed.day(-4);
    }
  
    const month = wed.month();
  
    while (month === wed.month()) {
      wedArray.push(moment(wed));
      wed.add(7, 'd');
    }
  
    return wedArray;
  };
  
export const getSubscriptionDetail = (date = moment(new Date()))  => {

  const wedArr = getWedOfMonth(date);

  let controlDate = wedArr.length === 4 ? wedArr[1] : wedArr[2];
  const mmdate = moment(date, 'YYYY-MM-DD');
  let nextDate=moment(mmdate).add(1, 'months');

  if(!mmdate.isBefore(controlDate)){
    nextDate = moment(mmdate).add(2, 'months');
    //la proxima fecha de control sera dependiendo de la cantidad de miercoles del proximo mes
    const nextWedArr = getWedOfMonth(moment(controlDate).add(1,'months'));
    controlDate = nextWedArr.length === 4 ? nextWedArr[1] : nextWedArr[2];
  }

  const start = moment(nextDate).format('YYYY-MM-01');
  const end = moment(nextDate).format('YYYY-MM-10');
    
  return {
    deliveryDates: { start, end },
    renovationDate: controlDate.format('YYYY-MM-DD')
  };
}
