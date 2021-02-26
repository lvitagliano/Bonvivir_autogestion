import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Formik } from 'formik';

import Form from './form';
import { defaultSchema } from './schema';

class RegistrationStepOne extends Component {
  static propTypes = {
    fieldStep: PropTypes.number.isRequired,
    setFieldStep: PropTypes.func.isRequired,
    showModal: PropTypes.bool.isRequired,
    changeShowModal: PropTypes.func.isRequired,
    onClickButton: PropTypes.func.isRequired,
    setFormData: PropTypes.func.isRequired,
    formData: PropTypes.object.isRequired,
    saveLead: PropTypes.func.isRequired,
    campaignId: PropTypes.string.isRequired,
    saveLeadStep: PropTypes.func.isRequired
  };

  handleOnSubmit = formData => {
    const { setFormData, onClickButton, saveLeadStep, campaignId } = this.props;
    
    saveLeadStep(formData, campaignId);
    setFormData(formData);
    onClickButton();
  };

  handleOnChange = event => {
    const { fieldStep, setFieldStep } = this.props;
    const newStep = Number(event.target.id) + 1;

    if (fieldStep < newStep) {
      setFieldStep(newStep);
    }
  };

  renderForm = () => props => {
    const {
      fieldStep,
      showModal,
      changeShowModal,
      saveLead,
      campaignId
    } = this.props;

    return (
      <Form
        fieldStep={fieldStep}
        onChange={this.handleOnChange}
        showModal={showModal}
        changeShowModal={changeShowModal}
        saveLead={saveLead}
        campaignId={campaignId}
        {...props}
      />
    );
  };

  render() {
    const { formData } = this.props;

    return (
      <Formik
        initialValues={formData}
        validationSchema={defaultSchema}
        onSubmit={this.handleOnSubmit}
        render={this.renderForm()}
      />
    );
  }
}

export default RegistrationStepOne;
