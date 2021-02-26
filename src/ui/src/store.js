import { applyMiddleware, createStore, compose } from 'redux';
import { routerMiddleware } from 'connected-react-router';
import { createBrowserHistory } from 'history';
import createSagaMiddleware from 'redux-saga';

import createRootSaga from './sagas';
import createRootReducer from './reducers';
import { CONSTANTS } from './config/constants';

const { VOID_FUNC } = CONSTANTS;

export default function configureStore() {
  const enhancers = [];
  const { NODE_ENV } = process.env;
  const {
    __REDUX_DEVTOOLS_EXTENSION__: reduxDevToolsExtension,
    __REACT_DEVTOOLS_GLOBAL_HOOK__: reactDevToolsExtension
  } = window;

  if (
    NODE_ENV === 'development' &&
    typeof reduxDevToolsExtension === 'function'
  ) {
    enhancers.push(reduxDevToolsExtension());
  }

  if (NODE_ENV === 'production' && typeof reactDevToolsExtension === 'object') {
    Object.keys(reactDevToolsExtension).forEach(key => {
      reactDevToolsExtension[key] =
        typeof reactDevToolsExtension[key] === 'function' ? VOID_FUNC : null;
    });
  }

  const history = createBrowserHistory();
  const reduxRouterMiddleware = routerMiddleware(history);
  const sagaMiddleware = createSagaMiddleware();
  const middlewares = [reduxRouterMiddleware, sagaMiddleware];
  const composedEnhancers = compose(
    applyMiddleware(...middlewares),
    ...enhancers
  );
  const rootReducer = createRootReducer(history);
  const store = createStore(rootReducer, composedEnhancers);

  sagaMiddleware.run(createRootSaga);

  return { store, history };
}
