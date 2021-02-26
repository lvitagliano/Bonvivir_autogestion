import React, { Component } from 'react';
import PropTypes from 'prop-types';

import formattedNumbers from '../../utils/formattedNumbers';
import logoNacion from '../../resources/images/la-nacion.png';
import { MESSAGES } from '../../config/messages';

class OfferDetail extends Component {
  static propTypes = {
    offer: PropTypes.object.isRequired,
    item: PropTypes.any.isRequired,
    itemDetailIndex: PropTypes.any.isRequired
  };

  render() {
    const { offer, item, itemDetailIndex } = this.props;

    const formattedCommonPrice = `$${formattedNumbers(offer.basePrice)}`;

    const formattedClubLaNacionPrice = `$${formattedNumbers(
      offer.clubLaNacionPrice
    )}`;

    return (
      <div className='row'>
        <div className='col-md-5 helpers__text-center'>
          <img
            style={{ width: 113, height: 113 }}
            alt='seleccion'
            className='registration__Left-container__selectionImg'
            src={`data:image/png;base64, ${offer.desktopImage}`}
          />
        </div>
        <div className='col-md-6'>
          <div className='row'>
            <h3 className='col-md-11'>{item.title}</h3>
            <p className='col-md-11'>{item.subtitle}</p>
          </div>
        </div>
        <div className='col-md-12'>
          <div className='row'>
            <div className='col'>
              <div className='row'>
                <span className='value-bold margin-price'>
                  {MESSAGES.PRICE}
                </span>
              </div>
            </div>
            <div className='col'>
              <div className='row'>
                <span className='value-bold margin-special-price'>
                  {MESSAGES.CLUB_LN_PRICE}
                </span>
              </div>
            </div>
          </div>

          <div className='row registration__selection'>
            <div className='flex-price'>
              <div className=' value-bold'>
                {item.selectionDetails[itemDetailIndex].item}
              </div>

              <span className='value-regular violet-border'>
                {formattedCommonPrice}
              </span>
            </div>

            <div className='flex-special-price'>
              <div className='col-md-6 no-margin no-padding'>
                <img src={logoNacion} alt='logo' />
              </div>

              <span className='value-bold'>{formattedClubLaNacionPrice}</span>
            </div>
          </div>
        </div>
        <div className='col-md-12'>
          <div className='col-md-11 offers-tittle'>
            <h5 className='offers-h5'>{offer.title}</h5>
          </div>
          <div className='col-md-11 offers-description'>
            <p className='offerspa'>{offer.description}</p>
          </div>
        </div>
      </div>
    );
  }
}

export default OfferDetail;
