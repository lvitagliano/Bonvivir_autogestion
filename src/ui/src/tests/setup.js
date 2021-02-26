/* eslint-disable react/prop-types */
import React from 'react';
import { Provider } from 'react-redux';
import { ConnectedRouter } from 'connected-react-router';
import 'moment/locale/es';

import configureStore from '../store';

const BaseComponent = props => {
  const { children } = props;

  return <div>{children}</div>;
};

const { store, history } = configureStore();

const BaseContainer = props => {
  const { children } = props;

  return (
    <Provider store={store}>
      <ConnectedRouter history={history}>
        <BaseComponent>{children}</BaseComponent>
      </ConnectedRouter>
    </Provider>
  );
};

export { BaseComponent, BaseContainer };
