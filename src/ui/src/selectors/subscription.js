import { createSelector } from 'reselect';

const getSubscriptionState = ({ subscription }) => subscription;

const makeGetSubscription = () =>
  createSelector(
    getSubscriptionState,
    ({
      fromSelection,
      currentStep,
      desktopAnimation,
      mobileAnimation,
      loading,
      options,
      selectionSelected,
      selectionDetailSelected,
      subscriptionDates,
      hasClubLaNacion,
      needAditionalData,
      stepOne: { fieldStep, showModal, formData },
      stepTwo,
      stepThree,
      stepFour,
      responseSubscription
    }) => ({
      fromSelection,
      currentStep,
      desktopAnimation,
      mobileAnimation,
      loading,
      options,
      selectionSelected,
      selectionDetailSelected,
      subscriptionDates,
      hasClubLaNacion,
      needAditionalData,
      stepOne: {
        fieldStep,
        showModal,
        formData
      },
      stepTwo,
      stepThree,
      stepFour,
      responseSubscription
    })
  );

export { makeGetSubscription };
