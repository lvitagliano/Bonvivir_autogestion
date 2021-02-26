import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Formik } from 'formik';

import Form from './form';
import { defaultSchema } from './schema';

class RegistrationStepTwo extends Component {
  static propTypes = {
    hasClubLaNacion: PropTypes.bool.isRequired,
    isValidCardNumber: PropTypes.bool.isRequired,
    changeHasClubLaNacion: PropTypes.func.isRequired,
    validateCLNCardNumber: PropTypes.func.isRequired,
    setIsValidCLNCardNumber: PropTypes.func.isRequired,
    onClickButton: PropTypes.func.isRequired,
    setFormData: PropTypes.func.isRequired,
    formData: PropTypes.object.isRequired,
    errors: PropTypes.object.isRequired,
    loading: PropTypes.bool.isRequired
  };

  handleOnSubmit = formData => {
    const { setFormData, onClickButton } = this.props;
      
    setFormData(formData);
    onClickButton();
  };

  renderForm = () => props => {
    const {
      changeHasClubLaNacion,
      validateCLNCardNumber,
      setIsValidCLNCardNumber,
      setFormData,
      loading
    } = this.props;

    return (
      <Form
        changeHasClubLaNacion={changeHasClubLaNacion}
        validateCLNCardNumber={validateCLNCardNumber}
        setIsValidCLNCardNumber={setIsValidCLNCardNumber}
        setFormData={setFormData}
        loading={loading}
        {...props}
      />
    );
  };

  render() {
    const { formData, hasClubLaNacion } = this.props;

    return (
      <Formik
        enableReinitialize
        initialValues={{
          ...formData,
          hasClubLaNacion
        }}
        validationSchema={defaultSchema}
        onSubmit={this.handleOnSubmit}
        render={this.renderForm()}
      />
    );
  }
}

export default RegistrationStepTwo;
