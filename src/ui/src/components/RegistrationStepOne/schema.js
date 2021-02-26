import moment from 'moment';
import { object, string, date, ref } from 'yup';

import ERROR_MESSAGES from '../../config/errorMessages';

const aria = {
  cod: 'areaCode',
  date: 'date',
  email: 'email',
  name: 'name',
  lastName: 'lastName',
  gender: 'sexo',
  tel: 'telephone'
};

const keys = {
  cod: 'cod',
  date: 'date',
  dateObject: 'date.date',
  day: 'date.day',
  email: 'email',
  lastName: 'lastName',
  month: 'date.month',
  name: 'name',
  tel: 'tel',
  year: 'date.year',
  gender: 'gender',
};

const limits = {
  max: {
    cod: 4,
    date: moment().subtract(18, 'years'),
    email: 50,
    name: 30,
    lastName: 30,
    tel: 9,
    phoneNumber: 12

  },
  min: {
    date: moment('1900-01-01'),
    cod: 2,
    tel: 7,
    phoneNumber: 9
  }
};

const ids = {
  cod: '3',
  date: '6',
  email: '5',
  name: '1',
  lastName: '2',
  tel: '4',
  gender: '7',
};

const minDate = moment('1900-01-01');

const maxDate = moment().subtract(18, 'years');

const defaultValues = {
  cod: '',
  date: {
    day: '-1',
    month: '-1',
    year: '-1',
    date: null
  },
  email: '',
  name: '',
  lastName: '',
  tel: '',
  gender: 'femenino'
};

const defaultSchema = object().shape({
  name: string()
    .trim()
    .required(ERROR_MESSAGES.NAME_REQUIRED)
    .max(
      limits.max.name,
      `${ERROR_MESSAGES.NAME_MAX} ${limits.max.name} ${
        ERROR_MESSAGES.CHARACTERS
      }`
    ),
  lastName: string()
    .trim()
    .required(ERROR_MESSAGES.LAST_NAME_REQUIRED)
    .max(
      limits.max.lastName,
      `${ERROR_MESSAGES.NAME_MAX} ${limits.max.lastName} ${
        ERROR_MESSAGES.CHARACTERS
      }`
    ),
  cod: string()
    .trim()
    .required(ERROR_MESSAGES.COD_REQUIRED)
    .max(
      limits.max.cod,
      `${ERROR_MESSAGES.COD_MAX} ${limits.max.cod} ${ERROR_MESSAGES.CHARACTERS}`
    )
    .min(
      limits.min.cod,
      `${ERROR_MESSAGES.COD_MIN} ${limits.min.cod} ${ERROR_MESSAGES.CHARACTERS}`
    )
    .test('Cod area validation', ERROR_MESSAGES.AREA_VALID, function(value) {
         
      return (value) !== '011';
    }),
  tel: string()
    .trim()
    .required(ERROR_MESSAGES.TEL_REQUIRED)
    .max(
      limits.max.tel,
      `${ERROR_MESSAGES.TEL_MAX} ${limits.max.tel} ${ERROR_MESSAGES.CHARACTERS}`
    )
    .min(
      limits.min.tel,
      `${ERROR_MESSAGES.TEL_MIN} ${limits.min.tel} ${ERROR_MESSAGES.CHARACTERS}`
    )
    .test('Phone number validation', ERROR_MESSAGES.TEL_VALID, function(value) {
      const cod = this.resolve(ref(keys.cod));      
      return (cod + value).length > limits.min.phoneNumber;
    }),
  email: string()
    .trim()
    .required(ERROR_MESSAGES.EMAIL_REQUIRED)
    .email(ERROR_MESSAGES.EMAIL_EMAIL)
    .max(
      limits.max.email,
      `${ERROR_MESSAGES.EMAIL_MAX} ${limits.max.email} ${
        ERROR_MESSAGES.CHARACTERS
      }`
    ),
  date: object({
    date: date()
      .nullable(ERROR_MESSAGES.DATE_REQUIRED)
      .required(ERROR_MESSAGES.DATE_REQUIRED)
      .min(minDate, ERROR_MESSAGES.DATE_REQUIRED)
      .max(maxDate, ERROR_MESSAGES.DATE_MAX)
  }),
  gender: string()
    .required(ERROR_MESSAGES.EMAIL_REQUIRED)
});

export { defaultValues, defaultSchema, keys, limits, ids, aria };
