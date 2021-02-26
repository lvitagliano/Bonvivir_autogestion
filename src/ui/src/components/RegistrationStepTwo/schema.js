import { object, string, bool, mixed } from 'yup';

import validateCuit from '../../utils/validateCuit';
import ERROR_MESSAGES from '../../config/errorMessages';
import { bonvivirApi } from '../../services';

import { index } from './options';

const usuario = JSON.parse(localStorage.getItem("contact"));

const aria = {
  dni: 'dni',
  cardNumber: 'cardNumber',
  cuit: 'cuit'
};

const keys = {
  proofOfPayment: 'proofOfPayment',
  dni: 'dni',
  hasClubLaNacion: 'hasClubLaNacion',
  cardNumber: 'cardNumber',
  cuit: 'cuit',
  isValidCardNumber: 'isValidCardNumber'
};

const limits = {
  max: {
    dni: '8',
    cardNumber: '16',
    cuit: '11'
  }
};

const defaultValues = (hasClubLaNacion, isValidCardNumber) => ({
  proofOfPayment: '0',
  dni: usuario ? usuario.idNumber : '',
  hasClubLaNacion,
  cardNumber: '',
  cuit: '',
  isValidCardNumber
});

const defaultSchema = object().shape({
  proofOfPayment: mixed().oneOf(Object.values(index)),
  dni: string().when(keys.proofOfPayment, {
    is: index.endCostomer,
    then: string()
      .required(ERROR_MESSAGES.DNI_REQUIRED)
      .max(
        limits.max.dni,
        `${ERROR_MESSAGES.DNI_MAX} ${limits.max.dni} ${
          ERROR_MESSAGES.CHARACTERS
        }`
      )
  }),
  cuit: string().when(keys.proofOfPayment, {
    is: index.vatRegistered,
    then: string()
      .required(ERROR_MESSAGES.CUIT_REQUIRED)
      .max(
        limits.max.cuit,
        `${ERROR_MESSAGES.CUIT_MAX} ${limits.max.cuit} ${
          ERROR_MESSAGES.CHARACTERS
        }`
      )
      .test('Validate CUIT', ERROR_MESSAGES.CUIT_VALID, value =>
        validateCuit(value)
      )
  }),
  hasClubLaNacion: bool(),
  cardNumber: string().when(keys.hasClubLaNacion, {
    is: true,
    then: string()
      .required(ERROR_MESSAGES.LNCARD_REQUIRED)
      .test(
        'checkIsValidCardNumber',
        ERROR_MESSAGES.LNCARD_VALID,
        async value => {
          const res = await bonvivirApi.postCLNCardNumberToValidate({
            cardNumber: value
          });

          return res.status === 200;
        }
      )
  })
});

export { defaultValues, defaultSchema, keys, limits, aria };
