/* eslint-disable no-unused-expressions */
import React from 'react';
import { Provider } from 'react-redux';
import { ConnectedRouter } from 'connected-react-router';
import ReactGA from 'react-ga';

import ErrorBoundary from '../../components/ErrorBoundary';
import configureStore from '../../store';
import Routes from '../Routes';
import { config, TRACKING_GA } from '../../config/constantsGA';

const { store, history } = configureStore();

const App = () => {
  config.isTracking.TRACKING ? ReactGA.initialize(TRACKING_GA) : null;
  config.isTracking.TRACKING ? ReactGA.pageview(window.location.pathname + window.location.search) : null;

  return (
    <ErrorBoundary>
      <Provider store={store}>
        <ConnectedRouter history={history}>
          <Routes />
        </ConnectedRouter>
      </Provider>
    </ErrorBoundary>
  );
}

export default App;