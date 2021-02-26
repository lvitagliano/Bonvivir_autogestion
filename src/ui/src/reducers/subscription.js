import { createReducer } from 'reduxsauce';
import produce from 'immer';

import { getSubscriptionDetail } from '../utils/getSubscriptionDates';
import { options } from '../components/RegistrationStepThree/options';
import { CONSTANTS } from '../config/constants';
import {
  NEXT_STEP,
  PREV_STEP,
  CHANGE_HAS_CLUB_LA_NACION,
  SET_NEED_ADITIONAL_DATA,
  SET_FIELD_STEP,
  SET_SELECTION_SELECTED,
  SET_SELECTION_DETAIL_SELECTED,
  GET_SUBSCRIPTION_DATES,
  LOAD_SELECTIONS,
  SET_SELECTION_LOADING,
  GET_SELECTIONS,
  SET_FORM_DATA_STEP_ONE,
  SET_FORM_DATA_STEP_TWO,
  SET_FORM_DATA_STEP_THREE,
  SET_FORM_DATA_STEP_FOUR,
  CHANGE_SHOW_MODAL,
  GET_ACCEPTED_PAYMENT_METHODS,
  SET_ACCEPTED_PAYMENT_METHODS,
  SET_STANDARDIZED_ADDRESS,
  STANDARDIZE_ADDRESS,
  CLEAR_SUBSCRIPTION_FORM,
  SEND_SUBSCRIPTION,
  VALIDATE_CLN_CARD_NUMBER,
  SET_IS_VALID_CLN_CARD_NUMBER,
  SET_FROM_SELECTION,
  UNSET_FROM_SELECTION
} from '../actions/subscription';
import { defaultValues as defaultValuesStepOne } from '../components/RegistrationStepOne/schema';
import { defaultValues as defaultValuesStepTwo } from '../components/RegistrationStepTwo/schema';
import { defaultValues as defaultValuesStepThree } from '../components/RegistrationStepThree/schema';
import { defaultValues as defaultValuesStepFour } from '../components/RegistrationStepFour/schema';

const usuario = JSON.parse(localStorage.getItem('contact'));

const {
  INITIAL_STEP,
  INITIAL_SELECTION_SELECTED,
  INITIAL_SELECTION_DETAIL_SELECTED,
  INITIAL_FIELD_STEP,
  ANIMATIONS
} = CONSTANTS;

const INITIAL_STATE = {
  currentStep: usuario ? 2 : INITIAL_STEP,
  desktopAnimation: ANIMATIONS.DESKTOP[0],
  mobileAnimation: ANIMATIONS.MOBILE[0],
  loading: true,
  options: [],
  selectionSelected: INITIAL_SELECTION_SELECTED,
  selectionDetailSelected: INITIAL_SELECTION_DETAIL_SELECTED,
  subscriptionDates: { deliveryDates: null, renovationDate: null },
  hasClubLaNacion: false,
  fromSelection: false,
  needAditionalData: false,
  stepOne: {
    fieldStep: INITIAL_FIELD_STEP,
    showModal: false,
    formData: defaultValuesStepOne
  },
  stepTwo: {
    formData: defaultValuesStepTwo(true, false),
    validateWithApi: false,
    errors: {}
  },
  stepThree: {
    formData: defaultValuesStepThree(false)
  },
  stepFour: {
    formData: defaultValuesStepFour,
    acceptedPaymentMethods: []
  }
};

const clearSubscriptionForm = produce(subscription => {
  subscription.currentStep = INITIAL_STATE.currentStep;
  subscription.desktopAnimation = INITIAL_STATE.desktopAnimation;
  subscription.mobileAnimation = INITIAL_STATE.mobileAnimation;
  subscription.hasClubLaNacion = INITIAL_STATE.hasClubLaNacion;
  subscription.fromSelection = INITIAL_STATE.fromSelection;
  subscription.needAditionalData = INITIAL_STATE.needAditionalData;
  subscription.stepOne = INITIAL_STATE.stepOne;
  subscription.stepTwo = INITIAL_STATE.stepTwo;
  subscription.stepThree = INITIAL_STATE.stepThree;
  subscription.stepFour = INITIAL_STATE.stepFour;
  subscription.loading = false;
});

const nextStep = produce(subscription => {
  subscription.currentStep += 1;
  subscription.desktopAnimation =
    ANIMATIONS.DESKTOP[subscription.currentStep - 1];
  subscription.mobileAnimation =
    ANIMATIONS.MOBILE[subscription.currentStep - 1];
});

const prevStep = produce(subscription => {
  subscription.currentStep -= 1;
  subscription.desktopAnimation =
    ANIMATIONS.DESKTOP[subscription.currentStep - 1];
  subscription.mobileAnimation =
    ANIMATIONS.MOBILE[subscription.currentStep - 1];
});

const changeHasClubLaNacion = produce(subscription => {
  subscription.hasClubLaNacion = !subscription.hasClubLaNacion;
  subscription.stepTwo.formData.hasClubLaNacion = !subscription.stepTwo.formData
    .hasClubLaNacion;
});

const setNeedAditionalData = produce((subscription, { formData }) => {
  subscription.stepThree.formData = {
    ...formData,
    state: options[0].value
  };
  subscription.needAditionalData = true;
  subscription.loading = false;
});

const setFieldStep = produce((subscription, { value }) => {
  subscription.stepOne.fieldStep = value;
});

const changeShowModal = produce(subscription => {
  subscription.stepOne.showModal = !subscription.stepOne.showModal;
});

const setSelectionSelected = produce((subscription, { value }) => {
  subscription.selectionSelected = value;
  subscription.selectionDetailSelected = 0;
});

const setSelectionDetailSelected = produce((subscription, { value }) => {
  subscription.selectionDetailSelected = value;
});

const loadSelections = produce((subscription, { data }) => {
  subscription.options = data;
});

const setSelectionLoading = produce((subscription, { value }) => {
  subscription.loading = value;
});

const getSelections = produce(subscription => {
  subscription.loading = true;
});

const setFormDataStepOne = produce((subscription, { formData }) => {
  subscription.stepOne.formData = {
    ...subscription.stepOne.formData,
    ...formData
  };
});

const setFormDataStepTwo = produce((subscription, { formData }) => {
  subscription.stepTwo.formData = {
    ...subscription.stepTwo.formData,
    ...formData
  };
});

const setFormDataStepThree = produce((subscription, { formData }) => {
  subscription.stepThree.formData = {
    ...subscription.stepThree.formData,
    ...formData
  };
});

const setFormDataStepFour = produce((subscription, { formData }) => {
  subscription.stepFour.formData = {
    ...subscription.stepFour.formData,
    ...formData
  };
});

const validateCLNCardNumber = produce(subscription => {
  subscription.loading = true;
  subscription.stepTwo.validateWithApi = true;
});

const setIsValidCLNCardNumber = produce((subscription, { formData }) => {
  subscription.loading = false;
  subscription.hasClubLaNacion = true;
  subscription.stepTwo.formData = {
    ...formData,
    isValidCardNumber: true
  };
});

const getAcceptedPaymentMethods = produce(subscription => {
  subscription.loading = false;
});

const setAcceptedPaymentMethods = produce(
  (subscription, { acceptedPaymentMethods }) => {
    subscription.stepFour.acceptedPaymentMethods = acceptedPaymentMethods;
    subscription.loading = false;
  }
);

const standardizeAddress = produce(subscription => {
  subscription.loading = true;
});

const setStandardizedAddress = produce(
  (subscription, { standardizedAddress }) => {
    subscription.stepThree.formData = {
      ...subscription.stepThree.formData,
      ...standardizedAddress
    };
    subscription.needAditionalData = false;
    subscription.loading = false;
  }
);

const sendSubscription = produce(subscription => {
  subscription.loading = true;
});

const setFromSelection = produce(subscription => {
  subscription.fromSelection = true;
});

const unsetFromSelection = produce(subscription => {
  subscription.fromSelection = false;
});

const getSubscriptionDates = produce((subscription, { date }) => {
  subscription.subscriptionDates = getSubscriptionDetail(date);
});

const reducer = createReducer(INITIAL_STATE, {
  [CLEAR_SUBSCRIPTION_FORM]: clearSubscriptionForm,
  [NEXT_STEP]: nextStep,
  [PREV_STEP]: prevStep,
  [CHANGE_HAS_CLUB_LA_NACION]: changeHasClubLaNacion,
  [SET_NEED_ADITIONAL_DATA]: setNeedAditionalData,
  [SET_FIELD_STEP]: setFieldStep,
  [CHANGE_SHOW_MODAL]: changeShowModal,
  [SET_SELECTION_SELECTED]: setSelectionSelected,
  [SET_SELECTION_DETAIL_SELECTED]: setSelectionDetailSelected,
  [GET_SUBSCRIPTION_DATES]: getSubscriptionDates,
  [LOAD_SELECTIONS]: loadSelections,
  [SET_SELECTION_LOADING]: setSelectionLoading,
  [GET_SELECTIONS]: getSelections,
  [SET_FORM_DATA_STEP_ONE]: setFormDataStepOne,
  [SET_FORM_DATA_STEP_TWO]: setFormDataStepTwo,
  [SET_FORM_DATA_STEP_THREE]: setFormDataStepThree,
  [SET_FORM_DATA_STEP_FOUR]: setFormDataStepFour,
  [VALIDATE_CLN_CARD_NUMBER]: validateCLNCardNumber,
  [SET_IS_VALID_CLN_CARD_NUMBER]: setIsValidCLNCardNumber,
  [GET_ACCEPTED_PAYMENT_METHODS]: getAcceptedPaymentMethods,
  [SET_ACCEPTED_PAYMENT_METHODS]: setAcceptedPaymentMethods,
  [STANDARDIZE_ADDRESS]: standardizeAddress,
  [SET_STANDARDIZED_ADDRESS]: setStandardizedAddress,
  [SEND_SUBSCRIPTION]: sendSubscription,
  [SET_FROM_SELECTION]: setFromSelection,
  [UNSET_FROM_SELECTION]: unsetFromSelection
});

export default reducer;
