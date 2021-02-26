import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Form as FormFormik } from 'formik';

import labels from './labels';
import placeholders from './placeholders';
import { keys, aria } from './schema';

import { Input, BOButton } from '..';

class Form extends Component {
  static propTypes = {
    errors: PropTypes.object.isRequired,
    handleChange: PropTypes.func.isRequired,
    setFieldValue: PropTypes.func.isRequired,
    submitCount: PropTypes.number.isRequired,
    values: PropTypes.object.isRequired,
    showIsOrganicCheck: PropTypes.bool.isRequired,
    button: PropTypes.object.isRequired
  };

  handleOnChangeCheck = () => {
    const { values, setFieldValue } = this.props;

    setFieldValue(keys.isOrganic, !values.isOrganic);
  };

  getInputProps = propKey => {
    const { values } = this.props;

    return {
      inputName: keys[propKey],
      description: labels[propKey],
      labelName: `lbl${keys[propKey]}`,
      ariaDescribedBy: aria[propKey],
      placeholder: placeholders[propKey],
      value: values[propKey]
    };
  };

  render() {
    const {
      errors,
      handleChange,
      submitCount,
      values,
      showIsOrganicCheck,
      button
    } = this.props;

    return (
      <FormFormik className='registration__form mt-3'>
        <div className='container'>
          <div className='row'>
            <div className='col-md-3'>
              <Input
                {...this.getInputProps('title')}
                type='text'
                onChange={handleChange}
                error={submitCount > 0 ? errors.title || null : null}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col-md-3'>
              <Input
                {...this.getInputProps('description')}
                type='text'
                onChange={handleChange}
                error={submitCount > 0 ? errors.description || null : null}
              />
            </div>
          </div>
          {showIsOrganicCheck && (
            <div className='row'>
              <div className='col-md-3'>
                <div className='col-md-12'>
                  <label
                    className='checkbox'
                    htmlFor={keys.isOrganic}
                    name={keys.isOrganic}
                  >
                    <input
                      type='checkbox'
                      name={keys.isOrganic}
                      checked={values.isOrganic}
                      onChange={this.handleOnChangeCheck}
                    />
                    <span
                      className='checkmark'
                      role='button'
                      onClick={this.handleOnChangeCheck}
                      onKeyPress={this.handleOnChangeCheck}
                      tabIndex={0}
                    />
                    <p>{labels.isOrganic}</p>
                  </label>
                </div>
              </div>
            </div>
          )}
          <div className='row mt-4'>
            <div className='col-md-3'>
              <BOButton
                {...button}
                type='submit'
                divClassName='registration__container-button helpers__text-center'
                buttonClassName='button__primary'
                isBackgroundWhite
              />
            </div>
          </div>
        </div>
      </FormFormik>
    );
  }
}

export default Form;
