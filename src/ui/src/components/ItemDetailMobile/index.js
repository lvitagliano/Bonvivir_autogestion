import React, { Component } from 'react';
import PropTypes from 'prop-types';

import logoNacion from '../../resources/images/la-nacion.png';
import formattedNumbers from '../../utils/formattedNumbers';
import { MESSAGES } from '../../config/messages';
import moment from "moment";
import { useSubscriptionDate } from "../../utils/hooks/useSubscriptionDate";

const ItemDetailMobile = ({ itemDetailIndex, item }) =>{

  const {deliveryDates,renovationDate} = useSubscriptionDate(moment());

    const formattedCommonPrice = `$${formattedNumbers(
      item.selectionDetails[itemDetailIndex].commonPrice
    )}`;

    const formattedClubLaNacionPrice = `$${formattedNumbers(
      item.selectionDetails[itemDetailIndex].clubLaNacionPrice
    )}`;

    return (
      <div className='registration hidden-lg hiddenMobile'>
        <div className='col-md-12'>
          <div className='row'>
            <div className='col-md-12 helpers__text-center'>
              <img
                alt='seleccion'
                className='img-fluid'
                src={item.imagePathDetail}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col'>
              <div className='row'>
                <span className='price-cm margin-price-mobile'>
                  {MESSAGES.PRICE}
                </span>
              </div>
            </div>
            <div className='col'>
              <div className='row padding-botton'>
                <span className='price-sm margin-special-price-mobile'>
                  {MESSAGES.CLUB_LN_PRICE}
                </span>
              </div>
            </div>
          </div>
          <div className='row registration__selection'>
            <div className='flex-price-m'>
              <div className=' value-bold bottles-m'>
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
        <div className='div-msg-mobile'>
          <p className='msg-mobile'>{MESSAGES.MESSAGE_SUBSCRIPTION}</p>
          {deliveryDates !== null && renovationDate !== null
                ?  <>
                      <p style={{ fontSize: '12px', margin: '5px 0',color: "#762057" }}>
                        {`El débito en tu tarjeta de crédito se realiza durante el mes de ${moment(renovationDate).format("MMMM")} y 
                        la entrega del 1 al 10 de ${moment(deliveryDates.start).format("MMMM")}.`} 
                      </p>
                    </>
                : ''}
        </div>
      </div>
    );
  }

ItemDetailMobile.propTypes = {
  item: PropTypes.any.isRequired,
  itemDetailIndex: PropTypes.any.isRequired
};

export default ItemDetailMobile;
