import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Form as FormFormik } from 'formik';

import { CONSTANTS } from '../../config/constants';
import maskInputTextAsNumber from '../../utils/maskInputTextAsNumber';

import { options } from './options';
import labels from './labels';
import placeholders from './placeholders';
import { keys, aria } from './schema';

import { Input, BOButton, Error, Select } from '..';

class Form extends Component {
  static propTypes = {
    errors: PropTypes.object.isRequired,
    handleChange: PropTypes.func.isRequired,
    setFieldValue: PropTypes.func.isRequired,
    submitCount: PropTypes.number.isRequired,
    values: PropTypes.object.isRequired,
    newItemError: PropTypes.string.isRequired,
    isEdit: PropTypes.bool
  };

  static defaultProps = {
    isEdit: false
  };

  handleOnChangeCheck = () => {
    const { values, setFieldValue } = this.props;

    setFieldValue(keys.isOrganic, !values.isOrganic);
  };

  getSelectProps = propKey => {
    const { values } = this.props;

    return {
      selectName: keys[propKey],
      labelName: `lbl${keys[propKey]}`,
      description: labels[propKey],
      selectId: keys[propKey],
      onChange: this.handleOnChangeSelect,
      value: values[propKey]
    };
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
      newItemError,
      isEdit
    } = this.props;

    return (
      <FormFormik className='mt-3'>
        <div className='container'>
          <div className='row'>
            <div className='col-md-6'>
              <Select
                {...this.getSelectProps('selection')}
                selectClassName='form-control input'
                onChange={handleChange}
                options={options}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col-md-6'>
              <Input
                {...this.getInputProps('title')}
                type='text'
                onChange={handleChange}
                error={submitCount > 0 ? errors.title || null : null}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col-md-6'>
              <Input
                {...this.getInputProps('description')}
                type='text'
                onChange={handleChange}
                error={submitCount > 0 ? errors.description || null : null}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col-md-6'>
              <Input
                {...this.getInputProps('desktopImage')}
                type='file'
                onChange={handleChange}
                isEdit={isEdit}
                error={submitCount > 0 ? errors.desktopImage || null : null}
                accept={CONSTANTS.BACKOFFICE_ACCEPT_FILES}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col-md-6'>
              <Input
                {...this.getInputProps('mobileImage')}
                type='file'
                isEdit={isEdit}
                onChange={handleChange}
                error={submitCount > 0 ? errors.mobileImage || null : null}
                accept={CONSTANTS.BACKOFFICE_ACCEPT_FILES}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col-md-3'>
              <Input
                {...this.getInputProps('basePriceId')}
                type='text'
                onChange={handleChange}
              />
            </div>
            <div className='col-md-3'>
              <Input
                {...this.getInputProps('basePrice')}
                type='text'
                onChange={handleChange}
                mask={maskInputTextAsNumber}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col-md-6'>
              {submitCount > 0 &&
                (Object.prototype.hasOwnProperty.call(errors, keys.basePrice) ||
                  Object.prototype.hasOwnProperty.call(
                    errors,
                    keys.basePriceId
                  )) && (
                  <Error errors={[errors.basePrice, errors.basePriceId]} />
                )}
            </div>
          </div>
          <div className='row'>
            <div className='col-md-3'>
              <Input
                {...this.getInputProps('clubLaNacionId')}
                type='text'
                onChange={handleChange}
              />
            </div>
            <div className='col-md-3'>
              <Input
                {...this.getInputProps('clubLaNacionPrice')}
                type='text'
                onChange={handleChange}
                mask={maskInputTextAsNumber}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col-md-6'>
              {submitCount > 0 &&
                (Object.prototype.hasOwnProperty.call(
                  errors,
                  keys.clubLaNacionId
                ) ||
                  Object.prototype.hasOwnProperty.call(
                    errors,
                    keys.clubLaNacionPrice
                  )) && (
                  <Error
                    errors={[errors.clubLaNacionId, errors.clubLaNacionPrice]}
                  />
                )}
            </div>
          </div>
          <div className='row'>
            <div className='col-md-3'>
              <Input
                {...this.getInputProps('tierraDelFuegoId')}
                type='text'
                onChange={handleChange}
              />
            </div>
            <div className='col-md-3'>
              <Input
                {...this.getInputProps('tierraDelFuegoPrice')}
                type='text'
                onChange={handleChange}
                mask={maskInputTextAsNumber}
              />
            </div>
          </div>
          <div className='row'>
            <div className='col-md-6'>
              {submitCount > 0 &&
                (Object.prototype.hasOwnProperty.call(
                  errors,
                  keys.tierraDelFuegoId
                ) ||
                  Object.prototype.hasOwnProperty.call(
                    errors,
                    keys.tierraDelFuegoPrice
                  )) && (
                  <Error
                    errors={[
                      errors.tierraDelFuegoId,
                      errors.tierraDelFuegoPrice
                    ]}
                  />
                )}
            </div>
          </div>
          <div className='row'>
            <div className='col-md-6'>
              <Input
                {...this.getInputProps('schemaId')}
                type='text'
                onChange={handleChange}
                error={submitCount > 0 ? errors.schemaId || null : null}
              />
            </div>
          </div>
          <div className='row mt-4 mb-4'>
            <div className='col-md-2'>
              <BOButton
                {...CONSTANTS.BACKOFFICE_CREATE}
                type='submit'
                divClassName='registration__container-button helpers__text-center'
                buttonClassName='button__primary'
                isBackgroundWhite
              />
            </div>
            {newItemError && (
              <div className='col-md-12'>
                <Error errors={[newItemError]} />
              </div>
            )}
          </div>
        </div>
      </FormFormik>
    );
  }
}

export default Form;
