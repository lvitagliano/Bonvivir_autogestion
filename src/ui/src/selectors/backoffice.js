import { createSelector } from 'reselect';

const getBackofficeState = ({ backoffice }) => backoffice;

const makeGetBackoffice = () =>
  createSelector(
    getBackofficeState,
    ({
      loading,
      offers,
      newItemError,
      loginError,
      isAuthenticated,
      subscriptionsWithError,
      errorNumberSearch,
      qtyPerPage,
      subscriptionsWithErrorTotalQuantity,
      pageSubscriptionWithError,
      totalSubscriptionsWithError
    }) => ({
      loading,
      offers,
      isAuthenticated,
      subscriptionsWithError,
      newItemError,
      loginError,
      errorNumberSearch,
      qtyPerPage,
      subscriptionsWithErrorTotalQuantity,
      pageSubscriptionWithError,
      totalSubscriptionsWithError
    })
  );

export { makeGetBackoffice };
