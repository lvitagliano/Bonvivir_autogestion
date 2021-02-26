import React, { Component } from 'react';
import PropTypes from 'prop-types';

import logoNacion from '../../resources/images/la-nacion.png';
import formattedNumbers from '../../utils/formattedNumbers';
import { MESSAGES } from '../../config/messages';

class OferDetailMobile extends Component {
  static propTypes = {
    offer: PropTypes.object.isRequired,
    item: PropTypes.any.isRequired,
    itemDetailIndex: PropTypes.any.isRequired
  };

  render() {
    const { itemDetailIndex, item, offer } = this.props;

    const formattedCommonPrice = `$${formattedNumbers(offer.basePrice)}`;

    const formattedClubLaNacionPrice = `$${formattedNumbers(
      offer.clubLaNacionPrice
    )}
  `;

    return (
      <div className='registration hidden-lg hiddenMobile'>
        <div className='col-md-12'>
          <div className='row'>
            <div className='col-md-12 helpers__text-center'>
              <img
                alt='seleccion'
                className='registration__Left-container__selectionImg img-fluid'
                src={`data:image/png;base64, ${offer.mobileImage}`}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col'>
              <div className='row'>
                <span className='value-bold margin-price-mobile'>
                  {MESSAGES.PRICE}
                </span>
              </div>
            </div>
            <div className='col'>
              <div className='row'>
                <span className='value-bold margin-special-price-mobile'>
                  {MESSAGES.CLUB_LN_PRICE}
                </span>
              </div>
            </div>
          </div>
          <div className='row registration__selection'>
            <div className='flex-price-m'>
              <div className=' value-bold'>
                {item.selectionDetails[itemDetailIndex].item}
              </div>

              <span className='value-regular violet-border-m'>
                {formattedCommonPrice}
              </span>
            </div>

            <div className='flex-special-price'>
              <div className='col-md-6'>
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

        <div className='div-msg-mobile'>
          <p className='msg-mobile'>{MESSAGES.MESSAGE_SUBSCRIPTION}</p>
        </div>
      </div>
    );
  }
}

export default OferDetailMobile;
