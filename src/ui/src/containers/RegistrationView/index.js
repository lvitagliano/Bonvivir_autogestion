import React, { Component } from 'react';
import { connect } from 'react-redux';
import { push } from 'connected-react-router';
import { createStructuredSelector } from 'reselect';
import moment from 'moment';
import PropTypes from 'prop-types';
import 'moment/locale/es';
import uuidv1 from 'uuid/v1';

import { CONSTANTS } from '../../config/constants';
import { SELECTION, REGISTRATION_DEFAULT } from '../../routes';
import { mapOfferToOption } from '../../utils/mapOfferToOption';
import backofficeActions from '../../actions/backoffice';
import subscriptionActions from '../../actions/subscription';
import { makeGetBackoffice } from '../../selectors/backoffice';
import { makeGetSubscription } from '../../selectors/subscription';
import {
  NavBar,
  RegistrationRightPanel,
  ItemDetail,
  MobileFillBg,
  Loading
} from '../../components';

import { NotFound } from '..';

import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';

moment.locale('es');

const Options = [
  {
    value: '0',
    description: 'Selección Exclusiva 3 botellas',
    selection: 0,
    item: 1
  },
  {
    value: '1',
    description: 'Selección Exclusiva 6 botellas',
    selection: 0,
    item: 0
  },
  {
    value: '2',
    description: 'Selección Exclusiva Blanca 6 botellas',
    selection: 1,
    item: 0
  },
  {
    value: '3',
    description: 'Selección Alta Gama 2 botellas',
    selection: 2,
    item: 1
  },
  {
    value: '4',
    description: 'Selección Alta Gama 4 botellas',
    selection: 2,
    item: 0
  }
];


class RegistrationView extends Component {
  constructor(props) {
    super(props);
    this._UUID = uuidv1();
    this.lastStep = 3;
    this.state = {
      selection: {},
      offer: {}
    };
  }

  static propTypes = {
    nextStep: PropTypes.func.isRequired,
    prevStep: PropTypes.func.isRequired,
    changeHasClubLaNacion: PropTypes.func.isRequired,
    setFieldStep: PropTypes.func.isRequired,
    changeShowModal: PropTypes.func.isRequired,
    goToSelection: PropTypes.func.isRequired,
    goToStepThree: PropTypes.func.isRequired,
    saveLeadStep: PropTypes.func.isRequired,
    setFormDataStepOne: PropTypes.func.isRequired,
    setFormDataStepTwo: PropTypes.func.isRequired,
    setFormDataStepThree: PropTypes.func.isRequired,
    setFormDataStepFour: PropTypes.func.isRequired,
    saveLead: PropTypes.func.isRequired,
    validateCLNCardNumber: PropTypes.func.isRequired,
    setIsValidCLNCardNumber: PropTypes.func.isRequired,
    getAcceptedPaymentMethods: PropTypes.func.isRequired,
    standardizeAddress: PropTypes.func.isRequired,
    subscription: PropTypes.object.isRequired,
    sendSubscription: PropTypes.func.isRequired,
    getSelections: PropTypes.func.isRequired,
    match: PropTypes.any.isRequired,
    getOffers: PropTypes.func.isRequired,
    backFromRegistration: PropTypes.func.isRequired,
    backoffice: PropTypes.any.isRequired
  };

  componentDidMount() {
    const { getSelections, getOffers } = this.props;

    getSelections();
    getOffers();
  }

  componentDidUpdate() {
    const { offer } = this.state;
    if (!offer.id) {
      this.getItemFromOffer();
    }
  }

  nextStep = () => {
    const { selection } = this.state;
    const referId = this.props.match.params.itemId
    
    const {
      backoffice: { offers },
      subscription: {
        currentStep,
        options,
        selectionSelected,
        selectionDetailSelected,
        stepOne,
        stepTwo,
        stepThree,
        stepFour
        
      },
      nextStep,
      sendSubscription
    } = this.props;


    let newOptions = options;

    if (offers) {
      const organic = offers.find(o => o.isOrganic === true);

      if (organic) {
        newOptions = mapOfferToOption(options, organic);
      }
    }

    if (currentStep + 1 > CONSTANTS.MAX_STEP) {
      sendSubscription({
        selection: newOptions[selection.selection || selectionSelected],
        clubLaNacionCardNumber: stepTwo.formData.cardNumber,
        refered: referId,
        selectionDetailSelected:
          selection.itemDetailOption >= 0
            ? selection.itemDetailOption
            : selectionDetailSelected,
        ...stepOne.formData,
        ...stepTwo.formData,
        ...stepThree.formData,
        ...stepFour.formData
      });
    } else {

      nextStep();
    }
  };

  getItemFromOffer() {
    const {
      backoffice: { offers },
      match
    } = this.props;
    const pathItemId = match.params.itemId;

    if (pathItemId && offers && offers instanceof Array) {
      const result = offers.find(offer =>
        offer.items.find(item => item.id === parseInt(pathItemId, 10))
      );

      let offer;

      if (result && result.items) {
        offer = result.items.find(item => item.id === parseInt(pathItemId, 10));
      }

      let option;

      if (offer && offer.selection >= 0) {
        option = Options.find(
          item => parseInt(item.value, 10) === offer.selection
        );
      }

      if (option) {
        result.selection = option.selection;
        result.itemDetailOption = option.item;

        if (result) {
          this.setState({
            selection: result,
            offer
          });
        }
      }
    }
  }

  prevStep = () => {
    const {
      subscription: { currentStep },
      prevStep,
      goToSelection
    } = this.props;

    if (currentStep - 1 === 0) {
      goToSelection();
    } else {
      prevStep();
    }
  };

  getProducts() {
    const {
      subscription: { options }
    } = this.props;

    let products = [];

    options.forEach(option => {
      products = {
        ...products,
        ...option.selectionDetails
      };
    });

    return products;
  }

  render() {
    const { offer, selection } = this.state;
    const {
      match,
      backoffice: { offers },
      subscription: {
        currentStep,
        desktopAnimation,
        mobileAnimation,
        loading,
        options,
        selectionSelected,
        selectionDetailSelected,
        hasClubLaNacion,
        fromSelection,
        needAditionalData,
        stepOne,
        stepTwo,
        stepThree,
        stepFour
      },
      changeHasClubLaNacion,
      setFieldStep,
      changeShowModal,
      setFormDataStepOne,
      saveLeadStep,
      setFormDataStepTwo,
      setFormDataStepThree,
      goToSelection,
      goToStepThree,
      setFormDataStepFour,
      backFromRegistration,
      saveLead,
      validateCLNCardNumber,
      setIsValidCLNCardNumber,
      getAcceptedPaymentMethods,
      standardizeAddress
    } = this.props;

    let newOptions = options;

    if (offers) {
      const organic = offers.find(o => o.isOrganic === true);

      if (organic) {
        newOptions = mapOfferToOption(options, organic);
      }
    }

    const pathItemId = match.params.itemId;

    if (pathItemId >= 0 && offers && !(offer.id >= 0)) {
      return <NotFound />;
    }

    if (pathItemId >= 0 && offer && !(offer.id >= 0) && !offers) {
      return <Loading show withLogo />;
    }

    if (!(pathItemId >= 0) && !fromSelection) {
      goToSelection();
    }
    
    if (
      options &&
      options.length > 0 &&
      (selection.selection >= 0 || selectionSelected >= 0)
    ) {

      return (
        <div>
          <NavBar textTitle='' />
          <section className='main-container container-fluid'>
            <div className='row'>
              <div className='col-md-12'>
                <div className='container'>
                  <div className='row'>
                    <ItemDetail
                      item={
                        newOptions[selection.selection || selectionSelected]
                      }
                      offer={offer}
                      itemDetailIndex={
                        selection.itemDetailOption >= 0
                          ? selection.itemDetailOption
                          : selectionDetailSelected
                      }

                      currentStep={currentStep}
                      desktopAnimation={desktopAnimation}
                    />
                    <RegistrationRightPanel
                      item={
                        newOptions[selection.selection || selectionSelected]
                      }
                      itemDetailIndex={
                        selection.itemDetailOption >= 0
                          ? selection.itemDetailOption
                          : selectionDetailSelected
                      }
                      offer={offer}
                      currentStep={currentStep}
                      hasClubLaNacion={hasClubLaNacion}
                      isValidCardNumber={stepTwo.formData.isValidCardNumber}
                      fieldStep={stepOne.fieldStep}
                      nextStep={this.nextStep}
                      prevStep={this.prevStep}
                      changeHasClubLaNacion={changeHasClubLaNacion}
                      setFieldStep={setFieldStep}
                      showModal={stepOne.showModal}
                      changeShowModal={changeShowModal}
                      needAditionalData={needAditionalData}
                      setFormDataStepOne={setFormDataStepOne}
                      formDataStepOne={stepOne.formData}
                      setFormDataStepTwo={setFormDataStepTwo}
                      formDataStepTwo={stepTwo.formData}
                      errorsStepTwo={stepTwo.errors}
                      setFormDataStepThree={setFormDataStepThree}
                      formDataStepThree={stepThree.formData}
                      backFromRegistration={backFromRegistration}
                      setFormDataStepFour={setFormDataStepFour}
                      formDataStepFour={stepFour.formData}
                      saveLead={saveLead}
                      saveLeadStep={saveLeadStep}
                      validateCLNCardNumber={validateCLNCardNumber}
                      setIsValidCLNCardNumber={setIsValidCLNCardNumber}
                      acceptedPaymentMethods={stepFour.acceptedPaymentMethods}
                      getAcceptedPaymentMethods={getAcceptedPaymentMethods}
                      loading={loading}
                      standardizeAddress={standardizeAddress}
                      subscriptionOptions={this.props.backoffice.offers[1].items}
                    />
                    <MobileFillBg mobileAnimation={mobileAnimation} />
                  </div>
                </div>
              </div>
            </div>
          </section>
        </div>
      );
    }

    return <div />;
  }
}

const mapStateToProps = createStructuredSelector({
  backoffice: makeGetBackoffice(),
  subscription: makeGetSubscription()
});

const mapDispatchToProps = dispatch => ({
  getOffers: () => dispatch(backofficeActions.getOffers()),
  getSelections: () => dispatch(subscriptionActions.getSelections()),
  nextStep: () => dispatch(subscriptionActions.nextStep()),
  prevStep: () => dispatch(subscriptionActions.prevStep()),
  saveLeadStep: (formData, campaignId) =>
    dispatch(subscriptionActions.saveLeadStep(formData, campaignId)),
  goToSelection: () => dispatch(push(SELECTION)),
  goToStepThree: () => dispatch(push(REGISTRATION_DEFAULT)),
  backFromRegistration: () =>
    dispatch(subscriptionActions.backFromRegistration()),
  clearSubscriptionForm: () =>
    dispatch(subscriptionActions.clearSubscriptionForm()),
  changeHasClubLaNacion: () =>
    dispatch(subscriptionActions.changeHasClubLaNacion),
  setFieldStep: value => dispatch(subscriptionActions.setFieldStep(value)),
  changeShowModal: () => dispatch(subscriptionActions.changeShowModal()),
  setFormDataStepOne: formData =>
    dispatch(subscriptionActions.setFormDataStepOne(formData)),
  setFormDataStepTwo: formData =>
    dispatch(subscriptionActions.setFormDataStepTwo(formData)),
  setFormDataStepThree: formData =>
    dispatch(subscriptionActions.setFormDataStepThree(formData)),
  setFormDataStepFour: formData =>
    dispatch(subscriptionActions.setFormDataStepFour(formData)),
  saveLead: (formData, campaignId) =>
    dispatch(subscriptionActions.saveLead(formData, campaignId)),
  validateCLNCardNumber: (cardNumber, formData) =>
    dispatch(subscriptionActions.validateCLNCardNumber(cardNumber, formData)),
  setIsValidCLNCardNumber: (value, formData) =>
    dispatch(subscriptionActions.setIsValidCLNCardNumber(value, formData)),
  getAcceptedPaymentMethods: promotionId =>
    dispatch(subscriptionActions.getAcceptedPaymentMethods(promotionId)),
  standardizeAddress: (street, streetNumber, zipCode) =>
    dispatch(
      subscriptionActions.standardizeAddress(street, streetNumber, zipCode)
    ),
  sendSubscription: subscription =>
    dispatch(subscriptionActions.sendSubscription(subscription))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(RegistrationView);
