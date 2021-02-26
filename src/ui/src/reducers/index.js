import { combineReducers } from 'redux';
import { connectRouter } from 'connected-react-router';

import subscription from './subscription';
import backoffice from './backoffice';
import profileReducer from "./profile";

export default function createRootReducer(history) {
  const router = connectRouter(history);
  const rootReducer = combineReducers({ profile:profileReducer,subscription, backoffice, router });

  return rootReducer;
}
