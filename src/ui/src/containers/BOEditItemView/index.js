import React, { Component } from 'react';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import { createStructuredSelector } from 'reselect';
import { push } from 'connected-react-router';

import backofficeActions from '../../actions/backoffice';
import { makeGetBackoffice } from '../../selectors/backoffice';
import { BOHeader, BOEditItem } from '../../components';
import { MESSAGES } from '../../config/messages';
import { BACKOFFICE } from '../../routes';

class BOEditItemView extends Component {
  constructor() {
    super();

    this.state = {
      mobileImage: '',
      desktopImage: ''
    };
  }

  static propTypes = {
    backoffice: PropTypes.object.isRequired,
    goToBackofficeHome: PropTypes.func.isRequired,
    editItem: PropTypes.func.isRequired,
    match: PropTypes.object.isRequired
  };

  handleClick = formData => {
    const { editItem, match } = this.props;

    formData.id = match.params.itemId;

    editItem(formData);
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

  getItemValues = () => {
    const {
      match: {
        params: { itemId }
      },
      backoffice: { offers }
    } = this.props;

    const { desktopImage, mobileImage } = this.state;

    const items = [];

    // Add Items from offers to items Array
    offers.forEach(offer => offer.items.forEach(item => items.push(item)));

    const result = items.find(item => item.id.toString() === itemId);

    if (desktopImage === '' && mobileImage === '') {
      this.setState({
        desktopImage: result.desktopImage,
        mobileImage: result.mobileImage
      });
    }

    delete result.desktopImage;
    delete result.mobileImage;

    result.selection = result.selection.toString();
    result.basePrice = result.basePrice.toString();
    result.clubLaNacionPrice = result.clubLaNacionPrice.toString();
    result.tierraDelFuegoPrice = result.tierraDelFuegoPrice.toString();

    return result;
  };

  render() {
    const {
      backoffice: { loading, newItemError }
    } = this.props;

    const { desktopImage, mobileImage } = this.state;

    const itemValues = this.getItemValues();

    return (
      <div className='backoffice'>
        <div className='container'>
          <BOHeader
            className='row'
            title={MESSAGES.BACKOFFICE_HEADER_TITLE.EDIT_ITEM}
          />
          <section className='col-md-6'>
            <BOEditItem
              onSubmit={this.handleClick}
              loading={loading}
              newItemError={newItemError}
              itemValues={itemValues}
              isEdit
            />
          </section>
          <section className='col-md-6' style={{ marginTop: '10vh' }}>
            {/* eslint-disable-next-line react/jsx-no-literals */}
            <h4>Imagen para computadora</h4>
            <img
              alt='DesktopImage'
              style={{ width: '113px', height: '113px' }}
              src={`data:image/gif;base64,${desktopImage}`}
            />
            {/* eslint-disable-next-line react/jsx-no-literals */}
            <h4>Imagen para celular</h4>
            <img
              alt='DesktopImage'
              style={{ width: '113px', height: '113px' }}
              src={`data:image/gif;base64,${mobileImage}`}
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
  editItem: formData => dispatch(backofficeActions.editItem(formData)),
  goToBackofficeHome: () => dispatch(push(BACKOFFICE))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(BOEditItemView);
