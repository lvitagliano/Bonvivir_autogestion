import React, { Component } from 'react';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import { createStructuredSelector } from 'reselect';
import uuidv1 from 'uuid/v1';
import moment from 'moment';
import { push } from 'connected-react-router';

import backofficeActions from '../../actions/backoffice';
import { BOHeader, BOTable, Loading } from '../../components';
import { makeGetBackoffice } from '../../selectors/backoffice';
import { MESSAGES } from '../../config/messages';
import { CONSTANTS } from '../../config/constants';
import {
  BACKOFFICE_NEW_OFFER,
  BACKOFFICE_NEW_ITEM,
  BACKOFFICE_NEW_ITEM_PARAM,
  BACKOFFICE_EDIT_OFFER,
  BACKOFFICE_SUBSCRIPTIONS_WITH_ERROR
} from '../../routes';

class BOHomeView extends Component {
  static propTypes = {
    backoffice: PropTypes.object.isRequired,
    getOffers: PropTypes.func.isRequired,
    goToNewOffer: PropTypes.func.isRequired,
    goToNewItem: PropTypes.func.isRequired,
    goToEditOffer: PropTypes.func.isRequired,
    deleteOffer: PropTypes.func.isRequired,
    logOut: PropTypes.func.isRequired,
    goToSubscriptionsWithError: PropTypes.func.isRequired
  };

  componentDidMount() {
    const { getOffers } = this.props;

    getOffers();
  }

  renderContent = () => {
    const {
      backoffice: { offers },
      goToNewOffer,
      goToNewItem,
      goToEditOffer,
      deleteOffer,
      logOut,
      goToSubscriptionsWithError
    } = this.props;
    const organicOffers = [];
    const nonOrganicOffers = [];

    if (offers) {
      offers.forEach(o => {
        const date = moment(
          o.modifiedDate ? o.modifiedDate : o.createdDate
        ).format(CONSTANTS.BACKOFFICE_DATE_FORMAT);
        const offer = {
          content: {
            title: o.title,
            date: `${MESSAGES.BACKOFFICE_HOME_MODIFIED_DATE} ${date}`,
            itemsQty: o.items ? o.items.length : 0
          },
          buttons: [
            {
              ...CONSTANTS.BACKOFFICE_EDIT,
              onClick: () => goToEditOffer(o.id)
            },
            { ...CONSTANTS.BACKOFFICE_DELETE, onClick: () => deleteOffer(o) },
            {
              ...CONSTANTS.BACKOFFICE_NEW_ITEM,
              onClick: () => goToNewItem(o.id)
            }
          ]
        };

        if (o.isOrganic) {
          organicOffers.push(offer);
        } else {
          nonOrganicOffers.push(offer);
        }
      });
    }

    return (
      <div className='backoffice'>
        <div className='container'>
          <BOHeader
            className='row'
            title={MESSAGES.BACKOFFICE_HEADER_TITLE.HOME}
            button={CONSTANTS.BACKOFFICE_HEADER_BUTTON}
            onClickButton={goToNewOffer}
            errorListButton={CONSTANTS.BACKOFFICE_ERROR_LIST}
            goToSubscriptionsWithError={goToSubscriptionsWithError}
            exportButton={CONSTANTS.BACKOFFICE_EXPORT_CSV}
            logOutButton={CONSTANTS.BACKOFFICE_LOGOUT_BUTTON}
            logOut={logOut}
          />
          <section className='col'>
            {MESSAGES.BACKOFFICE_HOME_TABLE_TITLES.map((t, i) => (
              <BOTable
                key={uuidv1()}
                title={t}
                columns={MESSAGES.BACKOFFICE_HOME_TABLE_TH}
                rows={i === 0 ? organicOffers : nonOrganicOffers}
                isStriped
              />
            ))}
          </section>
        </div>
      </div>
    );
  };

  render() {
    const {
      backoffice: { loading, offers }
    } = this.props;

    return loading || !offers ? (
      <Loading show withLogo />
    ) : (
      this.renderContent()
    );
  }
}

const mapStateToProps = createStructuredSelector({
  backoffice: makeGetBackoffice()
});

const mapDispatchToProps = dispatch => ({
  getOffers: () => dispatch(backofficeActions.getOffers()),
  goToNewOffer: () => dispatch(push(BACKOFFICE_NEW_OFFER)),
  goToNewItem: offerId =>
    dispatch(
      push(BACKOFFICE_NEW_ITEM.replace(BACKOFFICE_NEW_ITEM_PARAM, offerId))
    ),
  goToEditOffer: offerId =>
    dispatch(
      push(BACKOFFICE_EDIT_OFFER.replace(BACKOFFICE_NEW_ITEM_PARAM, offerId))
    ),
  deleteOffer: offer => dispatch(backofficeActions.deleteOffer(offer)),
  logOut: () => dispatch(backofficeActions.deleteLoginToken()),
  goToSubscriptionsWithError: () =>
    dispatch(push(BACKOFFICE_SUBSCRIPTIONS_WITH_ERROR))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(BOHomeView);
