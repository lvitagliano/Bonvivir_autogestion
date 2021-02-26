import subscription from './subscription';
import backoffice from './backoffice';

import { all, fork } from 'redux-saga/effects';

export default function* root() {
  try {
    yield all([fork(subscription), fork(backoffice)]);
  } catch (err) {
    throw err;
  }
}
