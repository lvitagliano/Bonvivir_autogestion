import React, { Component } from 'react';
import PropTypes from 'prop-types';
import moment from "moment";

import { useSubscriptionDate } from "../../utils/hooks/useSubscriptionDate";
import { MESSAGES } from '../../config/messages';

import { Cup, SelectionDetail, OfferDetail } from '..';



const ItemDetail = ({ item,
  itemDetailIndex,
  currentStep,
  desktopAnimation,
  offer}) => {

  const {deliveryDates,renovationDate} = useSubscriptionDate(moment());

  return (
    <div className='col-lg-4 col-lg-offset-1 col-sm-0 col-sm-offset-0 registration__Left-container hidden-xs hidden-sm'>
      <h1>{MESSAGES.TITLE_REGISTRATION}</h1>
      <Cup currentStep={currentStep} desktopAnimation={desktopAnimation} size='sm'/>
      {offer && offer.id >= 0 ? (
        <OfferDetail
          offer={offer}
          item={item}
          itemDetailIndex={itemDetailIndex}
        />
      ) : (
        <SelectionDetail item={item} itemDetailIndex={itemDetailIndex} />
      )}
      
      {deliveryDates !== null && renovationDate !== null
                ?  <>
                      <p style={{ fontSize: '12px', margin: '5px 0',color: "#762057" }}>
                        {`El débito en tu tarjeta de crédito se realiza durante el mes de ${moment(renovationDate).format("MMMM")} y 
                        la entrega del 1 al 10 de ${moment(deliveryDates.start).format("MMMM")}.`} 
                      </p>
                    </>
                : ''}
    </div>
  );
}

ItemDetail.propTypes = {
  item: PropTypes.object.isRequired,
  itemDetailIndex: PropTypes.number.isRequired,
  currentStep: PropTypes.number.isRequired,
  desktopAnimation: PropTypes.number.isRequired,
  offer: PropTypes.object.isRequired
};

export default ItemDetail;