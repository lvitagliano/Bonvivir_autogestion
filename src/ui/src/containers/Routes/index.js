import React, { Component } from 'react';
import { Redirect, Route, Switch } from 'react-router-dom';

import {
  ROOT,
  SELECTION,
  SUBSCRIPTION,
  BACKOFFICE_LOGIN,
  BACKOFFICE,
  BACKOFFICE_NEW_OFFER,
  BACKOFFICE_NEW_ITEM,
  BACKOFFICE_EDIT_OFFER,
  REGISTRATION,
  BACKOFFICE_EDIT_ITEM,
  MY_SELECTIONS,
  BACKOFFICE_SUBSCRIPTIONS_WITH_ERROR,
  PROFILE,
  SUBSCRIPTIONS,
  SUSPENDSUBSCRIPTION,
  EDITSUBSCRIPTIONS,
  FRIENDS,
  DELIVERY_STATUS,
  SUCCESSFULLY,
  SELECTIONWITHPARAM
} from '../../routes';
import PrivateRoute from '../PrivateRoute';

import {
  BOLoginView,
  NotFound,
  RegistrationView,
  SelectionView,
  SubscriptionView,
  BOHomeView,
  BONewOfferView,
  BOEditOfferView,
  BONewItemView,
  BOEditItemView,
  AUSelectionView,
  BOErrorListView
} from '..';
import Profile from '../../pages/profile'
import Subscription from '../../pages/subscription'
import EditSubscriptions from '../../pages/editsubscription'
import Friends from '../../pages/friends'
import Deliverys from '../../pages/deliverys'
import Successfully from '../../pages/successfully'
import Suspend from '../../pages/subscription/suspend'

class Routes extends Component {
  renderRedirect = () => <Redirect to={SELECTION} />;

  renderNotFound = () => <NotFound />;

  render() {
    return (
      <Switch>
        <Route exact path={ROOT} render={this.renderRedirect} />
        <Route path={SELECTIONWITHPARAM} component={SelectionView} />
        <Route path={SELECTION} component={SelectionView} />
        
        <Route path={REGISTRATION} component={RegistrationView} />
        <Route path={SUBSCRIPTION} component={SubscriptionView} />
        <Route path={PROFILE} component={Profile} />
        <Route path={SUBSCRIPTIONS} component={Subscription} />
        <Route path={SUSPENDSUBSCRIPTION} component={Suspend} />
        <Route path={EDITSUBSCRIPTIONS} component={EditSubscriptions} />
        <Route path={FRIENDS} component={Friends} />
        <Route path={SUCCESSFULLY} component={Successfully} />
        <Route path={DELIVERY_STATUS} component={Deliverys} />
        <Route path={BACKOFFICE_LOGIN} component={BOLoginView} />
        <Route path={MY_SELECTIONS} component={AUSelectionView} />
        <PrivateRoute path={BACKOFFICE} component={BOHomeView} />
        <PrivateRoute path={BACKOFFICE_NEW_OFFER} component={BONewOfferView} />
        <PrivateRoute
          path={BACKOFFICE_SUBSCRIPTIONS_WITH_ERROR}
          component={BOErrorListView}
        />
        <PrivateRoute
          path={BACKOFFICE_EDIT_OFFER}
          component={BOEditOfferView}
        />
        <PrivateRoute path={BACKOFFICE_NEW_ITEM} component={BONewItemView} />
        <PrivateRoute path={BACKOFFICE_EDIT_ITEM} component={BOEditItemView} />
        <Route render={this.renderNotFound} />
      </Switch>
    );
  }
}

export default Routes;
