import React, { Component } from 'react';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import { createStructuredSelector } from 'reselect';
import { push } from 'connected-react-router';

import backofficeActions from '../../actions/backoffice';
import { makeGetBackoffice } from '../../selectors/backoffice';
import { BOHeader, BONewItem } from '../../components';
import { MESSAGES } from '../../config/messages';
import { BACKOFFICE } from '../../routes';

class BONewItemView extends Component {
  static propTypes = {
    backoffice: PropTypes.object.isRequired,
    newItem: PropTypes.func.isRequired,
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
      backoffice: { loading, newItemError },
      newItem
    } = this.props;

    return (
      <div className='backoffice'>
        <div className='container'>
          <BOHeader
            className='row'
            title={MESSAGES.BACKOFFICE_HEADER_TITLE.NEW_ITEM}
          />
          <section className='col'>
            <BONewItem
              onSubmit={newItem}
              loading={loading}
              newItemError={newItemError}
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

const mapDispatchToProps = (dispatch, ownProps) => ({
  newItem: formData =>
    dispatch(
      backofficeActions.newItem(ownProps.match.params.offerId, formData)
    ),
  goToBackofficeHome: () => dispatch(push(BACKOFFICE))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(BONewItemView);
