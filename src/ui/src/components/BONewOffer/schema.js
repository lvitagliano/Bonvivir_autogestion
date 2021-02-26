import { object, bool, string } from 'yup';

import ERROR_MESSAGES from '../../config/errorMessages';

const aria = {
  title: 'title',
  description: 'description'
};

const keys = {
  title: 'title',
  description: 'description',
  isOrganic: 'isOrganic'
};

const defaultValues = {
  title: '',
  description: '',
  isOrganic: false
};

const defaultSchema = object().shape({
  title: string()
    .trim()
    .required(ERROR_MESSAGES.TITLE_REQUIRED),
  description: string()
    .trim()
    .required(ERROR_MESSAGES.DESCRIPTION_REQUIRED),
  isOrganic: bool()
});

export { defaultValues, defaultSchema, keys, aria };
