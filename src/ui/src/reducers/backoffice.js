import { createReducer } from 'reduxsauce';
import produce from 'immer';

import {
  SET_OFFERS,
  GET_OFFERS,
  LOGIN,
  SET_LOGIN_TOKEN,
  NEW_ITEM,
  EDIT_OFFER,
  NEW_OFFER,
  SET_AUTHENTICATED,
  SET_NEW_ITEM_ERROR,
  DELETE_OFFER,
  EDIT_ITEM,
  SET_LOADING_FALSE,
  DELETE_ITEM,
  SET_AUTHENTICATION_ERROR,
  SET_LOGIN_ERROR,
  GET_SUBSCRIPTIONS_WITH_ERROR,
  SET_SUBSCRIPTIONS_WITH_ERROR,
  SET_ERROR_ON_GET_SUBSCRIPTIONS_WITH_ERROR,
  EXPORT_TO_EXCEL,
  EXPORT_FILE,
  SET_ERROR_NUMBER_SEARCH,
  SET_PAGE_SUBSCRIPTION_WITH_ERROR,
  SET_QTY_PER_PAGE,
  GET_TOTAL_SUBSCRIPTIONS_WITH_ERROR,
  SET_TOTAL_SUBSCRIPTIONS_WITH_ERROR
} from '../actions/backoffice';
import { defaultValues } from '../components/BOLogin/schema';
import { CONSTANTS } from '../config/constants';

const INITIAL_STATE = {
  loading: false,
  offers: null,
  newItemError: '',
  user: defaultValues,
  loginError: false,
  isAuthenticated: false,
  authenticationError: false,
  subscriptionsWithError: null,
  subscriptionsWithErrorTotalQuantity: 0,
  errorOnGetSubscriptionsWithError: false,
  errorNumberSearch: '',
  pageSubscriptionWithError: CONSTANTS.BACKOFFICE_INITIAL_PAGE,
  qtyPerPage: CONSTANTS.BACKOFFICE_INITIAL_QTY_PER_PAGE,
  totalSubscriptionsWithError: null
};

const getOffers = produce(backoffice => {
  backoffice.loading = true;
});

const setOffers = produce((backoffice, { offers }) => {
  backoffice.offers = offers;
  backoffice.loading = false;
});

const login = produce((backoffice, { user }) => {
  backoffice.user = user;
  backoffice.loading = true;
  backoffice.loginError = false;
});

const setLoginError = produce(backoffice => {
  backoffice.loading = false;
  backoffice.loginError = true;
});

const setAuthenticationError = produce(backoffice => {
  backoffice.loading = false;
  backoffice.authenticationError = true;
});

const newOffer = produce(backoffice => {
  backoffice.loading = true;
});

const setLoginToken = produce(backoffice => {
  backoffice.isAuthenticated = true;
});

const setAuthenticated = produce(backoffice => {
  backoffice.isAuthenticated = true;
});

const deleteItem = produce(backoffice => {
  backoffice.loading = true;
});

const setLoadingOff = produce(backoffice => {
  backoffice.loading = false;
});

const newItem = produce(backoffice => {
  backoffice.newItemError = INITIAL_STATE.newItemError;
  backoffice.loading = true;
});

const deleteOffer = produce(backoffice => {
  backoffice.loading = true;
});

const editOffer = produce(backoffice => {
  backoffice.loading = true;
});

const editItem = produce(backoffice => {
  backoffice.loading = true;
});

const setNewItemError = produce((backoffice, { message }) => {
  backoffice.loading = false;
  backoffice.newItemError = message;
});

const getSubscriptionsWithError = produce(backoffice => {
  backoffice.loading = true;
  backoffice.errorOnGetSubscriptionsWithError = false;
});

const setSubscriptionsWithError = produce(
  (backoffice, { subscriptionsWithError, totalQuantity }) => {
    backoffice.loading = false;
    backoffice.errorOnGetSubscriptionsWithError = false;
    backoffice.subscriptionsWithError = subscriptionsWithError;
    backoffice.subscriptionsWithErrorTotalQuantity = totalQuantity;
  }
);

const setErrorOnGetSubscriptionsWithError = produce((backoffice, { value }) => {
  backoffice.loading = false;
  backoffice.errorOnGetSubscriptionsWithError = value;
});

const exportToExcel = produce(backoffice => {
  backoffice.loading = true;
});

const exportFile = produce(backoffice => {
  backoffice.loading = false;
});

const setErrorNumberSearch = produce((backoffice, { value }) => {
  backoffice.errorNumberSearch = value;
});

const setPageSubscriptionWithError = produce((backoffice, { value }) => {
  backoffice.pageSubscriptionWithError = value;
});

const setQtyPerPage = produce((backoffice, { value }) => {
  backoffice.setQtyPerPage = value;
});

const getTotalSubscriptionsWithError = produce(backoffice => {
  backoffice.loading = true;
  backoffice.errorOnGetSubscriptionsWithError = false;
});

const setTotalSubscriptionsWithError = produce(
  (backoffice, { totalSubscriptionsWithError }) => {
    backoffice.loading = false;
    backoffice.errorOnGetSubscriptionsWithError = false;
    backoffice.totalSubscriptionsWithError = totalSubscriptionsWithError;
  }
);

const reducer = createReducer(INITIAL_STATE, {
  [GET_OFFERS]: getOffers,
  [SET_OFFERS]: setOffers,
  [LOGIN]: login,
  [NEW_OFFER]: newOffer,
  [SET_AUTHENTICATED]: setAuthenticated,
  [DELETE_OFFER]: deleteOffer,
  [EDIT_OFFER]: editOffer,
  [SET_LOGIN_TOKEN]: setLoginToken,
  [NEW_ITEM]: newItem,
  [SET_NEW_ITEM_ERROR]: setNewItemError,
  [EDIT_ITEM]: editItem,
  [SET_LOGIN_ERROR]: setLoginError,
  [SET_LOADING_FALSE]: setLoadingOff,
  [DELETE_ITEM]: deleteItem,
  [SET_AUTHENTICATION_ERROR]: setAuthenticationError,
  [GET_SUBSCRIPTIONS_WITH_ERROR]: getSubscriptionsWithError,
  [SET_SUBSCRIPTIONS_WITH_ERROR]: setSubscriptionsWithError,
  [SET_ERROR_ON_GET_SUBSCRIPTIONS_WITH_ERROR]: setErrorOnGetSubscriptionsWithError,
  [EXPORT_TO_EXCEL]: exportToExcel,
  [EXPORT_FILE]: exportFile,
  [SET_ERROR_NUMBER_SEARCH]: setErrorNumberSearch,
  [SET_PAGE_SUBSCRIPTION_WITH_ERROR]: setPageSubscriptionWithError,
  [SET_QTY_PER_PAGE]: setQtyPerPage,
  [GET_TOTAL_SUBSCRIPTIONS_WITH_ERROR]: getTotalSubscriptionsWithError,
  [SET_TOTAL_SUBSCRIPTIONS_WITH_ERROR]: setTotalSubscriptionsWithError
});

export default reducer;
