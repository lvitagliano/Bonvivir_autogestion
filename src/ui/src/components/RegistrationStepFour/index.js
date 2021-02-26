import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Formik } from 'formik';
import { connect } from 'react-redux';
import { createStructuredSelector } from 'reselect';

import subscriptionActions from '../../actions/subscription';
import { makeGetSubscription } from '../../selectors/subscription';

import Form from './form';
import { defaultSchema } from './schema';

class RegistrationStepFour extends Component {
  static propTypes = {
    subscription: PropTypes.object.isRequired,
    onClickButton: PropTypes.func.isRequired,
    setFormData: PropTypes.func.isRequired,
    formData: PropTypes.object.isRequired,
    acceptedPaymentMethods: PropTypes.array.isRequired,
    getAcceptedPaymentMethods: PropTypes.func.isRequired,
    promotionId: PropTypes.string.isRequired,
    subscriptionDates: PropTypes.object.isRequired,
    getSubscriptionDates: PropTypes.func.isRequired,
    setFormDataStepFour: PropTypes.func.isRequired
  };

  componentDidMount() {
    const {
      getAcceptedPaymentMethods,
      promotionId,
      getSubscriptionDates
    } = this.props;

    getSubscriptionDates();
    getAcceptedPaymentMethods(promotionId);
  }

  handleOnSubmit = formData => {
    const { setFormData, onClickButton } = this.props;

    setFormData(formData);
    onClickButton();
  };

  renderForm = subscriptionDates => props => {
    const { acceptedPaymentMethods, setFormDataStepFour } = this.props;

    return (
      <Form
        acceptedPaymentMethods={acceptedPaymentMethods}
        subscriptionDates={subscriptionDates}
        setFormDataStepFour={setFormDataStepFour}
        {...props}
      />
    );
  };

  render() {
    const {
      formData,
      acceptedPaymentMethods,
      subscription: { subscriptionDates }
    } = this.props;

    return (
      <Formik
        initialValues={formData}
        validationSchema={defaultSchema(acceptedPaymentMethods)}
        onSubmit={this.handleOnSubmit}
        render={this.renderForm(subscriptionDates)}
      />
    );
  }
}

const mapStateToProps = createStructuredSelector({
  subscription: makeGetSubscription()
});

const mapDispatchToProps = dispatch => ({
  getSubscriptionDates: () =>
    dispatch(subscriptionActions.getSubscriptionDates()),
  setFormDataStepFour: formData =>
    dispatch(subscriptionActions.setFormDataStepFour(formData))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(RegistrationStepFour);
