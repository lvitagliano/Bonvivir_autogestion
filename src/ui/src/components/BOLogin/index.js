import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Formik } from 'formik';

import { defaultSchema, defaultValues } from './schema';
import Form from './form';

class BOLogin extends Component {
  static propTypes = {
    handleSubmit: PropTypes.func.isRequired,
    loginError: PropTypes.bool.isRequired
  };

  renderForm = () => props => {
    const { loginError } = this.props;

    return <Form loginError={loginError} {...props} />;
  };

  render() {
    const { handleSubmit } = this.props;

    return (
      <Formik
        initialValues={defaultValues}
        validationSchema={defaultSchema}
        render={this.renderForm()}
        onSubmit={handleSubmit}
      />
    );
  }
}

export default BOLogin;
