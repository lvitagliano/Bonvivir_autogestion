import React, { Component } from 'react';
import PropTypes from 'prop-types';

import formattedNumbers from '../../utils/formattedNumbers';
import logoNacion from '../../resources/images/la-nacion.png';
import { MESSAGES } from '../../config/messages';

class SelectionDetail extends Component {
  static propTypes = {
    item: PropTypes.object.isRequired,
    itemDetailIndex: PropTypes.number.isRequired
  };

  render() {
    const { item, itemDetailIndex } = this.props;

    const formattedCommonPrice = `$${formattedNumbers(
      item.selectionDetails[itemDetailIndex].commonPrice
    )}`;

    const formattedClubLaNacionPrice = `$${formattedNumbers(
      item.selectionDetails[itemDetailIndex].clubLaNacionPrice
    )}`;

    return (
      <div>
        <div className='row'>
          <div className='col-md-5 helpers__text-center'>
            <img
              alt='seleccion'
              className='registration__Left-container__selectionImg'
              src={item.imagePathDetail}
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
                  <span className='price-c margin-price'>{MESSAGES.PRICE}</span>
                </div>
              </div>
              <div className='col'>
                <div className='row padding-botton'>
                  <span className='price-w margin-special-price'>
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
        </div>
      </div>
    );
  }
}

export default SelectionDetail;
