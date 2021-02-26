import { LOCATION_CHANGE, push } from 'connected-react-router';

import ERROR_MESSAGES from '../config/errorMessages';
import { BACKOFFICE, BACKOFFICE_LOGIN } from '../routes';
import { CancelToken, bonvivirApi } from '../services';
import {
  setOffers,
  GET_OFFERS,
  NEW_OFFER,
  setLoginError,
  LOGIN,
  NEW_ITEM,
  setNewItemError,
  DELETE_OFFER,
  EDIT_OFFER,
  getOffers as getOffersAction,
  setLoginToken,
  IS_AUTHENTICATED,
  SET_LOGIN_TOKEN,
  EDIT_ITEM,
  DELETE_ITEM,
  setAuthenticated,
  GO_TO_LOGIN,
  setAuthenticationError,
  DELETE_LOGIN_TOKEN,
  setSubscriptionsWithError,
  GET_SUBSCRIPTIONS_WITH_ERROR,
  setErrorOnGetSubscriptionsWithError,
  EXPORT_TO_EXCEL,
  exportFile,
  GET_TOTAL_SUBSCRIPTIONS_WITH_ERROR,
  setTotalSubscriptionsWithError
} from '../actions/backoffice';

import {
  all,
  call,
  cancel,
  putResolve,
  take,
  takeLatest
} from 'redux-saga/effects';

const cancelConfig = { cancelToken: null };

function* getOffers() {
  try {
    const { data } = yield call(bonvivirApi.getOffers);

    yield putResolve(setOffers(data));
  } catch (err) {
    throw err;
  }
}

function* editOffer({ offer }) {
  try {
    yield call(bonvivirApi.editOffer, offer);

    yield putResolve(push(BACKOFFICE));
  } catch (err) {
    throw err;
  }
}

function* editItem({ formData }) {
  try {
    const { ok, data } = yield call(bonvivirApi.editItem, {
      ...formData,
      desktopImage: formData.desktopImageFile,
      mobileImage: formData.mobileImageFile
    });

    if (!ok || !data.success) {
      yield putResolve(
        setNewItemError(
          data.message
            ? data.message.replace('.', '') || ERROR_MESSAGES.NEW_ITEM
            : ERROR_MESSAGES.NEW_ITEM
        )
      );
    } else {
      yield putResolve(push(BACKOFFICE));
    }
  } catch (err) {
    throw err;
  }
}

function* deleteOffer({ offer }) {
  try {
    delete offer.items;

    yield call(bonvivirApi.deleteOffer, offer);

    yield putResolve(getOffersAction());
  } catch (err) {
    throw err;
  }
}

function* deleteItem({ item }) {
  try {
    yield call(bonvivirApi.deleteItem, item);

    yield putResolve(push(BACKOFFICE));
  } catch (err) {
    throw err;
  }
}

function* newOffer({ formData }) {
  try {
    yield call(bonvivirApi.newOffer, formData);

    yield putResolve(push(BACKOFFICE));
  } catch (err) {
    throw err;
  }
}

function* setAuthToken({ data }) {
  try {
    const cookieName = 'token';
    const expirationMinutes = 15;

    setCookie(cookieName, data.token, expirationMinutes);
    yield putResolve(push(BACKOFFICE));
  } catch (err) {
    throw err;
  }
}

function* deleteAuthToken() {
  try {
    const cookieName = 'token';

    deleteCookie(cookieName);

    yield putResolve(push(BACKOFFICE_LOGIN));
  } catch (err) {
    throw err;
  }
}

function* goToLogin() {
  try {
    yield putResolve(push(BACKOFFICE_LOGIN));
  } catch (err) {
    throw err;
  }
}

function* login({ user }) {
  try {
    const { ok, data } = yield call(bonvivirApi.login, user);

    if (!ok || !data) {
      yield putResolve(setLoginError());
    } else {
      yield putResolve(setLoginToken(data));
    }
  } catch (err) {
    throw err;
  }
}

function* checkIsAuthenticated() {
  try {
    const { ok } = yield call(bonvivirApi.isAuthenticated);

    if (!ok) {
      yield putResolve(setAuthenticationError());
    } else {
      yield putResolve(setAuthenticated());
    }
  } catch (err) {
    throw err;
  }
}

function* newItem({ offerId, formData }) {
  try {
    const { ok, data } = yield call(bonvivirApi.newItem, {
      offerId,
      ...formData,
      desktopImage: formData.desktopImageFile,
      mobileImage: formData.mobileImageFile
    });

    if (!ok || !data.success) {
      yield putResolve(
        setNewItemError(
          data.message
            ? data.message.replace('.', '') || ERROR_MESSAGES.NEW_ITEM
            : ERROR_MESSAGES.NEW_ITEM
        )
      );
    } else {
      yield putResolve(push(BACKOFFICE));
    }
  } catch (err) {
    throw err;
  }
}

function* getSubscriptionsWithError({ quantityPerPage, page, errorCode }) {
  try {
    const { ok, data } = yield call(bonvivirApi.getSubscriptionsWithError, {
      quantityPerPage,
      page,
      errorCode
    });

    if (ok) {
      yield putResolve(
        setSubscriptionsWithError(data.subscriptions, data.totalItems)
      );
    } else {
      yield putResolve(setErrorOnGetSubscriptionsWithError(true));
    }
  } catch (err) {
    throw err;
  }
}

function* getTotalSubscriptionsWithError({ quantityPerPage, page, errorCode }) {
  try {
    const { ok, data } = yield call(
      bonvivirApi.getTotalSubscriptionsWithError,
      {
        quantityPerPage,
        page,
        errorCode
      }
    );

    if (ok) {
      yield putResolve(
        setTotalSubscriptionsWithError(data.subscriptions, data.totalItems)
      );
    } else {
      yield putResolve(setErrorOnGetSubscriptionsWithError(true));
    }
  } catch (err) {
    throw err;
  }
}

function* exportToExcel() {
  try {
    const { ok, data, ...props } = yield call(bonvivirApi.exportToExcel, {
      errorCode: '404'
    });

    if (!ok) {
      return;
    }

    let blob = new Blob([data], { type: props.headers['content-type'] });
    let url = window.URL.createObjectURL(blob);

    let a = document.createElement('a');
    document.body.appendChild(a);
    a.style = 'display: none';

    a.href = url;
    a.download = 'Suscripciones.xlsx';
    a.click();

    window.URL.revokeObjectURL(url);
  } catch (err) {
    throw err;
  }
}

export default function* sagas() {
  try {
    while (true) {
      const tasks = yield all([
        takeLatest(GET_OFFERS, getOffers),
        takeLatest(NEW_OFFER, newOffer),
        takeLatest(LOGIN, login),
        takeLatest(DELETE_OFFER, deleteOffer),
        takeLatest(SET_LOGIN_TOKEN, setAuthToken),
        takeLatest(DELETE_LOGIN_TOKEN, deleteAuthToken),
        takeLatest(EDIT_OFFER, editOffer),
        takeLatest(EDIT_ITEM, editItem),
        takeLatest(GO_TO_LOGIN, goToLogin),
        takeLatest(IS_AUTHENTICATED, checkIsAuthenticated),
        takeLatest(NEW_ITEM, newItem),
        takeLatest(DELETE_ITEM, deleteItem),
        takeLatest(GET_SUBSCRIPTIONS_WITH_ERROR, getSubscriptionsWithError),
        takeLatest(EXPORT_TO_EXCEL, exportToExcel),
        takeLatest(
          GET_TOTAL_SUBSCRIPTIONS_WITH_ERROR,
          getTotalSubscriptionsWithError
        )
      ]);
      const { cancel: apiCancel, token: cancelToken } = CancelToken.source();

      cancelConfig.cancelToken = cancelToken;

      yield take(LOCATION_CHANGE);
      yield cancel(tasks);
      yield call(apiCancel);
    }
  } catch (err) {
    throw err;
  }
}

function setCookie(cookieName, cookieValue, expirationMinutes) {
  const now = new Date();

  now.setTime(now.getTime() + expirationMinutes * 60 * 1000);

  const expires = `expires=${now.toUTCString()}`;

  document.cookie = `${cookieName}=${cookieValue};${expires};path=/`;
}

function deleteCookie(cookieName) {
  document.cookie = `${cookieName}=;expires=Thu, 01 Jan 1970 00:00:01 GMT;`;
}
