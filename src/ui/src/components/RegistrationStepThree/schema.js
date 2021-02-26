import { object, string, bool, mixed } from 'yup';

import ERROR_MESSAGES from '../../config/errorMessages';

import { index } from './options';

const aria = {
  street: 'street',
  streetNumber: 'streetNumber',
  zipCode: 'zipCode',
  floorApartment: 'floorApartment',
  apartment: 'apartment',
  neighborhood: 'neighborhood',
  zone: 'zone',
  country: 'conutry'
};

const keys = {
  street: 'street',
  streetNumber: 'streetNumber',
  zipCode: 'zipCode',
  floorApartment: 'floorApartment',
  apartment: 'apartment',
  additionalData: 'additionalData',
  needAditionalData: 'needAditionalData',
  neighborhood: 'neighborhood',
  zone: 'zone',
  country: 'conutry',
  state: 'state'
};

const limits = {
  max: {
    street: 50,
    streetNumber: 5,
    zipCode: 4,
    floorApartment: 2,
    apartment: 3,
    additionalData: 50,
    neighborhood: 20,
    zone: 20
  },
  min: {}
};

const defaultValues = needAditionalData => ({
  street: '',
  streetNumber: '',
  zipCode: '',
  floorApartment: '',
  apartment: '',
  additionalData: '',
  needAditionalData,
  neighborhood: '',
  zone: '',
  country: 'Argentina',
  state: '0'
});

const defaultSchema = object().shape({
  street: string()
    .trim()
    .required(ERROR_MESSAGES.STREET_REQUIRED)
    .max(
      limits.max.street,
      `${ERROR_MESSAGES.STREET_MAX} ${limits.max.street} ${
        ERROR_MESSAGES.CHARACTERS
      }`
    ),
  streetNumber: string()
    .trim()
    .required(ERROR_MESSAGES.NUMBER_REQUIRED)
    .max(
      limits.max.streetNumber,
      `${ERROR_MESSAGES.NUMBER_MAX} ${limits.max.streetNumber} ${
        ERROR_MESSAGES.CHARACTERS
      }`
    ),
  zipCode: string()
    .trim()
    .required(ERROR_MESSAGES.ZIPCOD_REQUIRED)
    .max(
      limits.max.zipCode,
      `${ERROR_MESSAGES.ZIPCOD_MAX} ${limits.max.zipCode} ${
        ERROR_MESSAGES.CHARACTERS
      }`
    ),
  floorApartment: string()
    .trim()
    .max(
      limits.max.floorApartment,
      `${ERROR_MESSAGES.FLOOR_MAX} ${limits.max.floorApartment} ${
        ERROR_MESSAGES.CHARACTERS
      }`
    ),
  apartment: string()
    .trim()
    .max(
      limits.max.apartment,
      `${ERROR_MESSAGES.APARTMENT_MAX} ${limits.max.apartment} ${
        ERROR_MESSAGES.CHARACTERS
      }`
    ),
  additionalData: string()
    .trim()
    .max(
      limits.max.additionalData,
      `${ERROR_MESSAGES.ADITIONAL_MAX} ${limits.max.additionalData} ${
        ERROR_MESSAGES.CHARACTERS
      }`
    ),
  needAditionalData: bool(),
  neighborhood: string().when(keys.needAditionalData, {
    is: true,
    then: string()
      .trim()
      .required(ERROR_MESSAGES.NEIGHBORHOOD_REQUIRED)
      .max(
        limits.max.neighborhood,
        `${ERROR_MESSAGES.NEIGHBORHOOD_MAX} ${limits.max.neighborhood} ${
          ERROR_MESSAGES.CHARACTERS
        }`
      )
  }),
  zone: string().when(keys.needAditionalData, {
    is: true,
    then: string()
      .trim()
      .required(ERROR_MESSAGES.ZONE_REQUIRED)
      .max(
        limits.max.zone,
        `${ERROR_MESSAGES.ZONE_MAX} ${limits.max.zone} ${
          ERROR_MESSAGES.CHARACTERS
        }`
      )
  }),
  state: mixed().when(keys.needAditionalData, {
    is: true,
    then: mixed()
      .oneOf(Object.values(index))
      .required(ERROR_MESSAGES.STATE_REQUIRED)
  })
});

export { defaultValues, defaultSchema, keys, limits, aria };
