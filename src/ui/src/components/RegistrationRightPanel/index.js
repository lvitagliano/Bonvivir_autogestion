import React, { Component } from 'react';
import PropTypes from 'prop-types';
import offers from '../../sagas/offers';
import { MESSAGES } from '../../config/messages';

import {
  RegistrationSteps,
  RegistrationStepOne,
  RegistrationStepTwo,
  RegistrationStepThree,
  RegistrationStepFour,
  Loading,
  OfferDetailMobile,
  ItemDetailMobile,
} from '..';

class RegistrationRightPanel extends Component {
  static propTypes = {
    item: PropTypes.object.isRequired,
    itemDetailIndex: PropTypes.number.isRequired,
    currentStep: PropTypes.number.isRequired,
    hasClubLaNacion: PropTypes.bool.isRequired,
    isValidCardNumber: PropTypes.bool.isRequired,
    fieldStep: PropTypes.number.isRequired,
    showModal: PropTypes.bool.isRequired,
    changeShowModal: PropTypes.func.isRequired,
    nextStep: PropTypes.func.isRequired,
    prevStep: PropTypes.func.isRequired,
    changeHasClubLaNacion: PropTypes.func.isRequired,
    setFieldStep: PropTypes.func.isRequired,
    setFormDataStepOne: PropTypes.func.isRequired,
    formDataStepOne: PropTypes.object.isRequired,
    setFormDataStepTwo: PropTypes.func.isRequired,
    formDataStepTwo: PropTypes.object.isRequired,
    errorsStepTwo: PropTypes.object.isRequired,
    setFormDataStepThree: PropTypes.func.isRequired,
    formDataStepThree: PropTypes.object.isRequired,
    setFormDataStepFour: PropTypes.func.isRequired,
    formDataStepFour: PropTypes.object.isRequired,
    needAditionalData: PropTypes.bool.isRequired,
    saveLead: PropTypes.func.isRequired,
    validateCLNCardNumber: PropTypes.func.isRequired,
    setIsValidCLNCardNumber: PropTypes.func.isRequired,
    standardizeAddress: PropTypes.func.isRequired,
    loading: PropTypes.bool.isRequired,
    saveLeadStep: PropTypes.func.isRequired,
    acceptedPaymentMethods: PropTypes.array.isRequired,
    getAcceptedPaymentMethods: PropTypes.func.isRequired,
    backFromRegistration: PropTypes.func.isRequired,
    offer: PropTypes.object.isRequired,
    subscriptionOptions: PropTypes.object.isRequired,
  };

  render() {
    const {
      item,
      itemDetailIndex,
      currentStep,
      hasClubLaNacion,
      isValidCardNumber,
      needAditionalData,
      fieldStep,
      nextStep,
      prevStep,
      changeHasClubLaNacion,
      setFieldStep,
      showModal,
      changeShowModal,
      setFormDataStepOne,
      formDataStepOne,
      setFormDataStepTwo,
      formDataStepTwo,
      errorsStepTwo,
      setFormDataStepThree,
      formDataStepThree,
      setFormDataStepFour,
      formDataStepFour,
      saveLead,
      validateCLNCardNumber,
      setIsValidCLNCardNumber,
      acceptedPaymentMethods,
      getAcceptedPaymentMethods,
      standardizeAddress,
      loading,
      saveLeadStep,
      offer,
      backFromRegistration,
    } = this.props;

    let currentStepRender;

    switch (currentStep) {
      case 1:
        currentStepRender = (
          <RegistrationStepOne
            fieldStep={fieldStep}
            saveLeadStep={saveLeadStep}
            setFieldStep={setFieldStep}
            showModal={showModal}
            changeShowModal={changeShowModal}
            onClickButton={nextStep}
            setFormData={setFormDataStepOne}
            formData={formDataStepOne}
            saveLead={saveLead}
            campaignId={item.selectionDetails[itemDetailIndex].campaignId}
          />
        );
        break;
      case 2:
        currentStepRender = (
          <RegistrationStepTwo
            hasClubLaNacion={hasClubLaNacion}
            isValidCardNumber={isValidCardNumber}
            changeHasClubLaNacion={changeHasClubLaNacion}
            validateCLNCardNumber={validateCLNCardNumber}
            setIsValidCLNCardNumber={setIsValidCLNCardNumber}
            onClickButton={nextStep}
            setFormData={setFormDataStepTwo}
            formData={formDataStepTwo}
            errors={errorsStepTwo}
            loading={loading}
          />
        );
        break;
      case 3:
        currentStepRender = (
          <RegistrationStepThree
            onClickButton={nextStep}
            needAditionalData={needAditionalData}
            setFormData={setFormDataStepThree}
            formData={formDataStepThree}
            standardizeAddress={standardizeAddress}
          />
        );
        break;
      case 4:
        const tf = '86';
        const oferta = item.selectionDetails[itemDetailIndex].schemaId;
        const schemaMatch = this.props.subscriptionOptions.filter(Oferta => Oferta.schemaId === oferta);
        
        if (formDataStepThree.state == tf) {
          item.selectionDetails[itemDetailIndex].promotionId = schemaMatch[0].tierraDelFuegoId;
        } else if (hasClubLaNacion) {
          item.selectionDetails[itemDetailIndex].promotionId = schemaMatch[0].clubLaNacionId;
        } else {
          item.selectionDetails[itemDetailIndex].promotionId = schemaMatch[0].basePriceId;
        }
        currentStepRender = (
          <RegistrationStepFour
            onClickButton={nextStep}
            setFormData={setFormDataStepFour}
            formData={formDataStepFour}
            acceptedPaymentMethods={acceptedPaymentMethods}
            getAcceptedPaymentMethods={getAcceptedPaymentMethods}
            promotionId= {item.selectionDetails[itemDetailIndex].promotionId}
          />
        );
        break;
      default:
        break;
    }

    return (
      <div className='col-lg-7 col-md-12 helpers__height--full'>
        <div className='registration__Right-container'>
          <div className='message'>
            <p className='message-subscription'>
              {MESSAGES.MESSAGE_SUBSCRIPTION}
            </p>
          </div>
          <div className='registration__Right-container-top'>
            <div className='registration__title hidden-lg hiddenMobile'>
              <button type='submit' onClick={backFromRegistration}>
                <i className='fas fa-arrow-left' />
              </button>
              <h3 className='title__h3'>{item.title}</h3>
            </div>
            {offer && offer.id >= 0 ? (
              <OfferDetailMobile
                offer={offer}
                item={item}
                itemDetailIndex={itemDetailIndex}
              />
            ) : (
              <ItemDetailMobile item={item} itemDetailIndex={itemDetailIndex} />
            )}
            <RegistrationSteps currentStep={currentStep} prevStep={prevStep} />
          </div>
          {currentStepRender}
          <Loading
            className='loading-validation'
            show={loading}
            withLogo={false}
          />
        </div>
      </div>
    );
  }
}
export default RegistrationRightPanel;
