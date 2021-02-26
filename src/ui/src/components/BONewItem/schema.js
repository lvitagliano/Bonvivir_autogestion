import { object, string, mixed } from 'yup';

import ERROR_MESSAGES from '../../config/errorMessages';

import { index } from './options';

const aria = {
  title: 'title',
  description: 'description',
  desktopImage: 'desktopImage',
  mobileImage: 'mobileImage',
  basePriceId: 'basePriceId',
  basePrice: 'basePrice',
  clubLaNacionId: 'clubLaNacionId',
  clubLaNacionPrice: 'clubLaNacionPrice',
  tierraDelFuegoId: 'tierraDelFuegoId',
  tierraDelFuegoPrice: 'tierraDelFuegoPrice',
  schemaId: 'schemaId',
  isEdit: 'isEdit'
};

const keys = {
  selection: 'selection',
  title: 'title',
  isEdit: 'isEdit',
  description: 'description',
  desktopImage: 'desktopImage',
  mobileImage: 'mobileImage',
  basePriceId: 'basePriceId',
  basePrice: 'basePrice',
  clubLaNacionId: 'clubLaNacionId',
  clubLaNacionPrice: 'clubLaNacionPrice',
  tierraDelFuegoId: 'tierraDelFuegoId',
  tierraDelFuegoPrice: 'tierraDelFuegoPrice',
  schemaId: 'schemaId'
};

const defaultValues = {
  selection: '0',
  title: '',
  isEdit: false,
  description: '',
  desktopImage: '',
  mobileImage: '',
  basePriceId: '',
  basePrice: '',
  clubLaNacionId: '',
  clubLaNacionPrice: '',
  tierraDelFuegoId: '',
  tierraDelFuegoPrice: '',
  schemaId: ''
};

const defaultSchema = object().shape({
  selection: mixed().oneOf(Object.values(index)),
  title: string()
    .trim()
    .required(ERROR_MESSAGES.TITLE_REQUIRED),
  description: string()
    .trim()
    .required(ERROR_MESSAGES.DESCRIPTION_REQUIRED),
  desktopImage: string()
    .trim()
    .when(keys.isEdit, {
      is: false,
      then: string().required(ERROR_MESSAGES.DESKTOP_IMAGE_REQUIRED)
    }),
  mobileImage: string()
    .trim()
    .when(keys.isEdit, {
      is: false,
      then: string().required(ERROR_MESSAGES.MOBILE_IMAGE_REQUIRED)
    }),
  basePriceId: string()
    .trim()
    .required(ERROR_MESSAGES.BASE_PRICE_ID_REQUIRED),
  basePrice: string()
    .trim()
    .required(ERROR_MESSAGES.BASE_PRICE_REQUIRED),
  clubLaNacionId: string()
    .trim()
    .required(ERROR_MESSAGES.CLUB_LA_NACION_ID_REQUIRED),
  clubLaNacionPrice: string()
    .trim()
    .required(ERROR_MESSAGES.CLUB_LA_NACION_REQUIRED),
  tierraDelFuegoId: string()
    .trim()
    .required(ERROR_MESSAGES.TIERRA_DEL_FUEGO_ID_REQUIRED),
  tierraDelFuegoPrice: string()
    .trim()
    .required(ERROR_MESSAGES.TDF_PRICE_REQUIRED),
  schemaId: string()
    .trim()
    .required(ERROR_MESSAGES.GUID_SCHEMA_REQUIRED)
});

export { defaultValues, defaultSchema, keys, aria };
