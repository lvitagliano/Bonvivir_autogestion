import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Formik } from 'formik';

import { CONSTANTS } from '../../config/constants';

import Form from './form';
import { defaultSchema, defaultValues } from './schema';

class BONewOffer extends Component {
  static defaultProps = {
    initialValues: null,
    button: CONSTANTS.BACKOFFICE_CREATE
  };

  static propTypes = {
    onSubmit: PropTypes.func.isRequired,
    showIsOrganicCheck: PropTypes.bool.isRequired,
    button: PropTypes.object,
    initialValues: PropTypes.object
  };

  handleOnSubmit = formData => {
    const { onSubmit } = this.props;

    onSubmit(formData);
  };

  renderForm = () => props => {
    const { showIsOrganicCheck, button } = this.props;

    return (
      <Form
        showIsOrganicCheck={showIsOrganicCheck}
        button={button}
        {...props}
      />
    );
  };

  render() {
    const { initialValues } = this.props;

    return (
      <Formik
        initialValues={initialValues || defaultValues}
        validationSchema={defaultSchema}
        onSubmit={this.handleOnSubmit}
        render={this.renderForm()}
      />
    );
  }
}

export default BONewOffer;
