import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Formik } from 'formik';
import { connect } from 'react-redux';
import { createStructuredSelector } from 'reselect';

import subscriptionActions from '../../actions/subscription';
import { makeGetSubscription } from '../../selectors/subscription';

import Form from './form';
import { defaultSchema } from './schema';

class RegistrationStepThree extends Component {
  static propTypes = {
    needAditionalData: PropTypes.bool.isRequired,
    onClickButton: PropTypes.func.isRequired,
    setFormData: PropTypes.func.isRequired,
    standardizeAddress: PropTypes.func.isRequired,
    formData: PropTypes.object.isRequired,
    subscription: PropTypes.object.isRequired,
    subscriptionDates:PropTypes.object.isRequired,
    getSubscriptionDates: PropTypes.func.isRequired
  };

  componentDidMount = () => {
    const { getSubscriptionDates } = this.props;

    getSubscriptionDates();
  }

  handleOnSubmit = formData => {
    const { setFormData, onClickButton } = this.props;

    setFormData(formData);
    onClickButton();
  };

  renderForm = (initialValues,subscriptionDates) => props => {
    const { needAditionalData, standardizeAddress } = this.props;

    return (
      <Form
        needAditionalData={needAditionalData}
        standardizeAddress={standardizeAddress}
        {...props}
        initialValues={initialValues}
        subscriptionDates={subscriptionDates}
      />
    );
  };

  render() {
    const { formData, needAditionalData ,subscription:{subscriptionDates}} = this.props;
    const initialValues = { ...formData, needAditionalData };

    return (
      <Formik
        enableReinitialize
        initialValues={initialValues}
        validationSchema={defaultSchema}
        onSubmit={this.handleOnSubmit}
        render={this.renderForm(initialValues,subscriptionDates)}
      />
    );
  }
}

const mapStateToProps = createStructuredSelector({
  subscription: makeGetSubscription()
});

const mapDispatchToProps = dispatch => ({
  getSubscriptionDates: () => dispatch(subscriptionActions.getSubscriptionDates()),
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(RegistrationStepThree);

