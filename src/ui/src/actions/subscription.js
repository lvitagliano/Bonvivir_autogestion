import { createActions } from 'reduxsauce';

const { Types, Creators } = createActions(
  {
    clearSubscriptionForm: null,
    nextStep: null,
    prevStep: null,
    changeHasClubLaNacion: null,
    setFieldStep: ['value'],
    changeShowModal: null,
    setSelectionSelected: ['value'],
    setSelectionDetailSelected: ['value'],
    getSubscriptionDates: null,
    setNeedAditionalData: ['formData'],
    loadSelections: ['data'],
    setSelectionLoading: ['value'],
    getSelections: null,
    setFormDataStepOne: ['formData'],
    setFormDataStepTwo: ['formData'],
    setFormDataStepThree: ['formData'],
    setFormDataStepFour: ['formData'],
    saveLead: ['formData', 'campaignId'],
    validateCLNCardNumber: ['cardNumber', 'formData'],
    setIsValidCLNCardNumber: ['value', 'formData'],
    setAcceptedPaymentMethods: ['acceptedPaymentMethods'],
    getAcceptedPaymentMethods: ['promotionId'],
    saveLeadStep: ['formData', 'saveLeadStep'],
    setFromSelection: null,
    goToRegistration: ['referId'],
    backFromRegistration: null,
    unsetFromSelection: null,
    standardizeAddress: ['formData'],
    setStandardizedAddress: ['standardizedAddress'],
    sendSubscription: ['subscription']
  },
  {
    prefix: 'SUBSCRIPTION/'
  }
);

const {
  clearSubscriptionForm,
  nextStep,
  prevStep,
  changeHasClubLaNacion,
  setNeedAditionalData,
  setFieldStep,
  changeShowModal,
  setSelectionSelected,
  setSelectionDetailSelected,
  getSubscriptionDates,
  backFromRegistration,
  loadSelections,
  setSelectionLoading,
  getSelections,
  setFormDataStepOne,
  saveLeadStep,
  goToRegistration,
  setFormDataStepTwo,
  setFormDataStepThree,
  setFromSelection,
  unsetFromSelection,
  setFormDataStepFour,
  saveLead,
  validateCLNCardNumber,
  setIsValidCLNCardNumber,
  getAcceptedPaymentMethods,
  setAcceptedPaymentMethods,
  standardizeAddress,
  setStandardizedAddress,
  sendSubscription
} = Creators;

const {
  CLEAR_SUBSCRIPTION_FORM,
  NEXT_STEP,
  PREV_STEP,
  CHANGE_HAS_CLUB_LA_NACION,
  SET_NEED_ADITIONAL_DATA,
  SET_FIELD_STEP,
  SET_FROM_SELECTION,
  UNSET_FROM_SELECTION,
  CHANGE_SHOW_MODAL,
  GO_TO_REGISTRATION,
  BACK_FROM_REGISTRATION,
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
  SAVE_LEAD,
  VALIDATE_CLN_CARD_NUMBER,
  SAVE_LEAD_STEP,
  SET_IS_VALID_CLN_CARD_NUMBER,
  GET_ACCEPTED_PAYMENT_METHODS,
  SET_ACCEPTED_PAYMENT_METHODS,
  STANDARDIZE_ADDRESS,
  SET_STANDARDIZED_ADDRESS,
  SEND_SUBSCRIPTION
} = Types;

export {
  Types,
  clearSubscriptionForm,
  nextStep,
  prevStep,
  changeHasClubLaNacion,
  setNeedAditionalData,
  setFieldStep,
  backFromRegistration,
  changeShowModal,
  setSelectionSelected,
  setSelectionDetailSelected,
  getSubscriptionDates,
  loadSelections,
  setSelectionLoading,
  getSelections,
  setFormDataStepOne,
  setFormDataStepTwo,
  goToRegistration,
  setFormDataStepThree,
  setFormDataStepFour,
  setFromSelection,
  unsetFromSelection,
  saveLead,
  validateCLNCardNumber,
  setIsValidCLNCardNumber,
  getAcceptedPaymentMethods,
  setAcceptedPaymentMethods,
  saveLeadStep,
  standardizeAddress,
  setStandardizedAddress,
  sendSubscription,
  CLEAR_SUBSCRIPTION_FORM,
  NEXT_STEP,
  PREV_STEP,
  CHANGE_HAS_CLUB_LA_NACION,
  SET_NEED_ADITIONAL_DATA,
  SET_FIELD_STEP,
  CHANGE_SHOW_MODAL,
  SET_FROM_SELECTION,
  UNSET_FROM_SELECTION,
  SET_SELECTION_SELECTED,
  SET_SELECTION_DETAIL_SELECTED,
  GET_SUBSCRIPTION_DATES,
  GO_TO_REGISTRATION,
  LOAD_SELECTIONS,
  SET_SELECTION_LOADING,
  BACK_FROM_REGISTRATION,
  GET_SELECTIONS,
  SAVE_LEAD_STEP,
  SET_FORM_DATA_STEP_ONE,
  SET_FORM_DATA_STEP_TWO,
  SET_FORM_DATA_STEP_THREE,
  SET_FORM_DATA_STEP_FOUR,
  SAVE_LEAD,
  VALIDATE_CLN_CARD_NUMBER,
  SET_IS_VALID_CLN_CARD_NUMBER,
  GET_ACCEPTED_PAYMENT_METHODS,
  SET_ACCEPTED_PAYMENT_METHODS,
  STANDARDIZE_ADDRESS,
  SET_STANDARDIZED_ADDRESS,
  SEND_SUBSCRIPTION
};

export default Creators;