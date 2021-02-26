import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Form as FormFormik } from 'formik';

import { MESSAGES } from '../../config/messages';
import ERROR_MESSAGES from '../../config/errorMessages';

import placeholders from './placeholders';
import labels from './labels';
import { keys, aria } from './schema';

import { Input, Button, Error } from '..';

class Form extends Component {
  static propTypes = {
    handleChange: PropTypes.func.isRequired,
    values: PropTypes.object.isRequired,
    errors: PropTypes.object.isRequired,
    submitCount: PropTypes.number.isRequired,
    loginError: PropTypes.bool.isRequired
  };

  getInputProps = propKey => {
    const { handleChange, values } = this.props;

    return {
      inputName: keys[propKey],
      description: labels[propKey],
      labelName: `lbl${keys[propKey]}`,
      ariaDescribedBy: aria[propKey],
      placeholder: placeholders[propKey],
      value: values[propKey],
      onChange: handleChange,
      className: 'input'
    };
  };

  render() {
    const { submitCount, errors, loginError } = this.props;

    return (
      <div className='container'>
        <div className='col-md-12 backoffice-login-form'>
          <FormFormik className='col-md-4 backoffice-login-form__form margin-lo'>
            <img src='images/logo.png' alt='logo-bonvivir' />
            <div className='form-group'>
              <Input
                {...this.getInputProps('username')}
                type='text'
                error={submitCount > 0 ? errors.username || null : null}
              />
            </div>
            <div className='form-group'>
              <Input
                {...this.getInputProps('password')}
                type='password'
                error={submitCount > 0 ? errors.password || null : null}
              />
              {loginError && (
                <div className='col-md-12 p-0'>
                  <Error errors={[ERROR_MESSAGES.USER_VALID]} />
                </div>
              )}
              <div className='col-md-12 p-0'>
                <Button
                  description={MESSAGES.BUTTON_LOGIN}
                  divClassName='bo_loginform__container-button helpers__text-center'
                  buttonClassName='btn-login'
                />
              </div>
            </div>
          </FormFormik>
        </div>
      </div>
    );
  }
}

export default Form;
