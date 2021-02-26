import React, { Component } from 'react';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import { createStructuredSelector } from 'reselect';
import moment from 'moment';
import { push } from 'connected-react-router';

import backofficeActions from '../../actions/backoffice';
import { makeGetBackoffice } from '../../selectors/backoffice';
import { BOHeader, BOTable, BONewOffer, Loading } from '../../components';
import { MESSAGES } from '../../config/messages';
import { CONSTANTS } from '../../config/constants';
import { options } from '../../components/BONewItem/options';
import {
  REGISTRATION,
  REGISTRATION_PARAM,
  BACKOFFICE_NEW_ITEM,
  BACKOFFICE_NEW_ITEM_PARAM,
  BACKOFFICE_EDIT_ITEM,
  BACKOFFICE_EDIT_ITEM_PARAM
} from '../../routes';
import copyToClipboard from '../../utils/copyToClipboard';

class BOEditOfferView extends Component {
  static propTypes = {
    backoffice: PropTypes.object.isRequired,
    match: PropTypes.object.isRequired,
    getOffers: PropTypes.func.isRequired,
    goToNewItem: PropTypes.func.isRequired,
    editOffer: PropTypes.func.isRequired,
    goToEditItem: PropTypes.func.isRequired,
    deleteItem: PropTypes.func.isRequired
  };

  componentDidMount() {
    const { getOffers } = this.props;

    getOffers();
  }

  handleOnSubmit = formData => {
    const { editOffer, match } = this.props;

    editOffer({
      ...formData,
      id: match.params.offerId
    });
  };

  copyLinkToClipboard = itemId => {
    copyToClipboard(
      `${window.location.host}/${REGISTRATION.replace('/', '').replace(
        REGISTRATION_PARAM,
        itemId
      )}`
    );
  };

  renderContent = () => {
    const {
      backoffice: { offers },
      match,
      goToNewItem,
      goToEditItem,
      deleteItem
    } = this.props;
    const offer = offers.filter(o => o.id === Number(match.params.offerId))[0];
    const defaultValues = {
      title: offer.title,
      description: offer.description,
      isOrganic: offer.isOrganic
    };
    const tableItems = [];

    offer.items.forEach(i => {
      const date = moment(
        i.modifiedDate ? i.modifiedDate : i.createdDate
      ).format(CONSTANTS.BACKOFFICE_DATE_FORMAT);
      const item = {
        content: {
          selection: options.filter(o => Number(o.value) === i.selection)[0]
            .description,
          title: i.title,
          date: `${MESSAGES.BACKOFFICE_HOME_MODIFIED_DATE} ${date}`,
          price: i.basePrice
        },
        buttons: [
          { ...CONSTANTS.BACKOFFICE_EDIT, onClick: () => goToEditItem(i.id) },
          { ...CONSTANTS.BACKOFFICE_DELETE, onClick: () => deleteItem(i) },
          {
            ...CONSTANTS.BACKOFFICE_GENERATE_LINK,
            onClick: event => {
              const button = event.currentTarget;
              const html = event.currentTarget.innerHTML;

              button.innerHTML = 'Link generado!';

              this.copyLinkToClipboard(i.id);
              setTimeout(() => {
                button.innerHTML = html;
              }, 3000);
            }
          }
        ]
      };

      tableItems.push(item);
    });

    const buttonHeader = {
      ...CONSTANTS.BACKOFFICE_NEW_ITEM,
      isBackgroundWhite: true,
      onClick: () => goToNewItem(offer.id)
    };

    return (
      <div className='backoffice'>
        <div className='container'>
          <BOHeader
            className='row'
            title={MESSAGES.BACKOFFICE_HEADER_TITLE.EDIT_OFFER}
          />
          <section className='col-md-12'>
            <div className='container-fluid'>
              <div className='row'>
                <div className='col-md-12'>
                  <BONewOffer
                    onSubmit={this.handleOnSubmit}
                    initialValues={defaultValues}
                    showIsOrganicCheck={false}
                    button={CONSTANTS.BACKOFFICE_SAVE}
                  />
                </div>
              </div>
              <div className='row mt-5'>
                <div className='col-md-12 p-0'>
                  <BOTable
                    title={MESSAGES.BACKOFFICE_EDIT_OFFER_TABLE_TITLE}
                    columns={MESSAGES.BACKOFFICE_EDIT_OFFER_TABLE_TH}
                    rows={tableItems}
                    isStriped
                    buttonHeader={buttonHeader}
                  />
                </div>
              </div>
            </div>
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
  goToNewItem: offerId =>
    dispatch(
      push(BACKOFFICE_NEW_ITEM.replace(BACKOFFICE_NEW_ITEM_PARAM, offerId))
    ),
  editOffer: offer => dispatch(backofficeActions.editOffer(offer)),
  deleteItem: item => dispatch(backofficeActions.deleteItem(item)),
  goToEditItem: itemId =>
    dispatch(
      push(BACKOFFICE_EDIT_ITEM.replace(BACKOFFICE_EDIT_ITEM_PARAM, itemId))
    )
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(BOEditOfferView);
