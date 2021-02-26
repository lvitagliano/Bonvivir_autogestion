import { string, object } from 'yup';

import ERROR_MESSAGES from '../../config/errorMessages';

const aria = {
  username: 'username',
  password: 'password'
};

const keys = {
  username: 'username',
  password: 'password'
};

const defaultValues = {
  username: '',
  password: ''
};

const defaultSchema = object().shape({
  username: string()
    .trim()
    .required(ERROR_MESSAGES.USERNAME_REQUIRED),
  password: string()
    .trim()
    .required(ERROR_MESSAGES.PASSWORD_REQUIRED)
});

export { defaultValues, keys, aria, defaultSchema };
