import React, { Component } from 'react';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import { createStructuredSelector } from 'reselect';
import { push } from 'connected-react-router';

import backofficeActions from '../../actions/backoffice';
import { makeGetBackoffice } from '../../selectors/backoffice';
import { BOHeader, BONewOffer } from '../../components';
import { MESSAGES } from '../../config/messages';
import { BACKOFFICE } from '../../routes';

class BONewOfferView extends Component {
  static propTypes = {
    backoffice: PropTypes.object.isRequired,
    newOffer: PropTypes.func.isRequired,
    goToBackofficeHome: PropTypes.func.isRequired
  };

  componentDidMount() {
    const {
      backoffice: { offers },
      goToBackofficeHome
    } = this.props;

    if (!offers) {
      goToBackofficeHome();
    }
  }

  render() {
    const {
      backoffice: { offers },
      newOffer
    } = this.props;

    return (
      <div className='backoffice'>
        <div className='container'>
          <BOHeader
            className='row'
            title={MESSAGES.BACKOFFICE_HEADER_TITLE.NEW_OFFER}
          />
          <section className='col'>
            <BONewOffer
              onSubmit={newOffer}
              showIsOrganicCheck={!offers || !offers.some(o => o.isOrganic)}
            />
          </section>
        </div>
      </div>
    );
  }
}

const mapStateToProps = createStructuredSelector({
  backoffice: makeGetBackoffice()
});

const mapDispatchToProps = dispatch => ({
  newOffer: formData => dispatch(backofficeActions.newOffer(formData)),
  goToBackofficeHome: () => dispatch(push(BACKOFFICE))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(BONewOfferView);
