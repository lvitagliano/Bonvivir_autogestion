import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Form as FormFormik } from 'formik';
import moment from 'moment';

import { MESSAGES } from '../../config/messages';
import maskInputTextAsNumber from '../../utils/maskInputTextAsNumber';

import labels from './labels';
import { options } from './options';
import { keys, limits, aria } from './schema';
import placeholders from './placeholders';

import { Input, TextArea, Select, Button, Error } from '..';

class Form extends Component {
  static propTypes = {
    needAditionalData: PropTypes.bool.isRequired,
    subscriptionDates: PropTypes.object.isRequired,
    errors: PropTypes.object.isRequired,
    handleChange: PropTypes.func.isRequired,
    setFieldValue: PropTypes.func.isRequired,
    submitCount: PropTypes.number.isRequired,
    initialValues: PropTypes.object.isRequired,
    values: PropTypes.object.isRequired,
    standardizeAddress: PropTypes.func.isRequired
  };

  componentDidUpdate(prevProps) {
    const { setFieldValue, needAditionalData } = this.props;

    moment.locale('es');

    if (prevProps.needAditionalData !== needAditionalData) {
      setFieldValue(keys.needAditionalData, needAditionalData);
    }
  }

  handleOnBlurAddress = () => {
    const { standardizeAddress, values } = this.props;

    if (
      values.street !== '' &&
      values.streetNumber !== '' &&
      values.zipCode !== ''
    ) {
      standardizeAddress(values);
    }
  };

  getInputProps = propKey => {
    const { handleChange, values } = this.props;

    return {
      inputName: keys[propKey],
      maxLength: `${limits.max[propKey]}`,
      description: labels[propKey],
      labelName: `lbl${keys[propKey]}`,
      onChange: handleChange,
      ariaDescribedBy: aria[propKey],
      placeholder: placeholders[propKey],
      value: values[propKey]
    };
  };

  getTextAreaProps = propKey => {
    const { handleChange, values } = this.props;

    return {
      textAreaName: keys[propKey],
      maxLength: `${limits.max[propKey]}`,
      labelName: `lbl${keys[propKey]}`,
      description: labels[propKey],
      onChange: handleChange,
      rows: '4',
      cols: '50',
      value: values[propKey],
      placeholder: placeholders[propKey]
    };
  };

  getSelectProps = propKey => {
    const { handleChange, values } = this.props;

    return {
      selectName: keys[propKey],
      labelName: `lbl${keys[propKey]}`,
      description: labels[propKey],
      selectId: keys[propKey],
      onChange: handleChange,
      value: values[propKey]
    };
  };

  render() {
    const {
      errors,
      submitCount,
      needAditionalData,
      subscriptionDates: { deliveryDates }
    } = this.props;

    return (
      <FormFormik className='registration__form'>
        <div className='form-group'>
          <div style={{ display: 'flex', flexDirection: 'column' }}>
            <Input
              {...this.getInputProps('street')}
              type='text'
              onBlur={this.handleOnBlurAddress}
            />
            <p className='required-fields' style={{ fontSize: '11px' }}>
              (Si vivís en un barrio cerrado coloca el nombre aquí)
            </p>
          </div>
          <div style={{ display: 'flex', flexDirection: 'column' }}>
            <Input
              {...this.getInputProps('streetNumber')}
              type='text'
              mask={maskInputTextAsNumber}
              onBlur={this.handleOnBlurAddress}
            />
            <p className='required-fields' style={{ fontSize: '11px' }}>
              (Si vivís en un barrio privado coloca la manzana, torre, sección,
              piso, lote o unidad funcional aquí)
            </p>
          </div>
          {submitCount > 0 &&
            (Object.prototype.hasOwnProperty.call(errors, keys.street) ||
              Object.prototype.hasOwnProperty.call(
                errors,
                keys.streetNumber
              )) && <Error errors={[errors.street, errors.streetNumber]} />}
        </div>
        <div className='form-group'>
          <div className='registration__address-cod'>
            <Input
              {...this.getInputProps('zipCode')}
              type='text'
              divClassName=''
              mask={maskInputTextAsNumber}
              onBlur={this.handleOnBlurAddress}
            />
            <div className='registration__apartment-date'>
              <Input
                {...this.getInputProps('floorApartment')}
                type='text'
                divClassName=''
              />
              <Input
                {...this.getInputProps('apartment')}
                type='text'
                divClassName=''
              />
            </div>
          </div>
          {submitCount > 0 &&
            (Object.prototype.hasOwnProperty.call(errors, keys.zipCode) ||
              Object.prototype.hasOwnProperty.call(
                errors,
                keys.floorApartment
              ) ||
              Object.prototype.hasOwnProperty.call(errors, keys.apartment)) && (
              <Error
                errors={[
                  errors.zipCode,
                  errors.floorApartment,
                  errors.apartment
                ]}
              />
            )}
        </div>
        {needAditionalData && (
          <div>
            <div className='error-input margin-error'>
              <i className='fas fa-exclamation-triangle' />
              <p className='error-input'>{MESSAGES.ADDITIONAL_DATA}</p>
            </div>
            <Input
              {...this.getInputProps('neighborhood')}
              type='text'
              error={submitCount > 0 ? errors.neighborhood || null : null}
            />
            <Input
              {...this.getInputProps('zone')}
              type='text'
              error={submitCount > 0 ? errors.zone || null : null}
            />
            <Select
              {...this.getSelectProps('state')}
              selectClassName='form-control input'
              options={options}
            />
            <Input
              {...this.getInputProps('country')}
              type='text'
              selectClassName='ml-2'
            />
            <TextArea
              style={{ padding: '15px' }}
              {...this.getTextAreaProps('additionalData')}
            />
          </div>
        )}

        <p className='registration__info'>{MESSAGES.SHIPPING_INFORMATION_1}</p>
        <p className='registration__info'>{MESSAGES.SHIPPING_INFORMATION_2}</p>
        {deliveryDates ? (
          <p className='registration__info'>{`- La entrega será entre ${moment(
            deliveryDates.start
          ).format('DD')} y el ${moment(deliveryDates.end).format(
            'DD'
          )} de ${moment(deliveryDates.start).format('MMMM')} `}</p>
        ) : null}
        <p className='required-fields'>{MESSAGES.REQUIRED_FIELDS}</p>
        <Button
          description={MESSAGES.BUTTON_CONTINUE}
          divClassName='registration__container-button helpers__text-center'
          buttonClassName='button__primary'
        />
      </FormFormik>
    );
  }
}

export default Form;
