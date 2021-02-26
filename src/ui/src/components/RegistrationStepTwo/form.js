import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Form as FormFormik } from 'formik';

import { MESSAGES } from '../../config/messages';
import logoNacion from '../../resources/images/la-nacion.png';
import maskInputTextAsNumber from '../../utils/maskInputTextAsNumber';

import labels from './labels';
import placeholders from './placeholders';
import { options, index } from './options';
import { keys, aria, limits } from './schema';

import { Input, Button, Select, CheckBox, Error } from '..';


class Form extends Component {
  static propTypes = {
    changeHasClubLaNacion: PropTypes.func.isRequired,
    validateCLNCardNumber: PropTypes.func.isRequired,
    setIsValidCLNCardNumber: PropTypes.func.isRequired,
    setFormData: PropTypes.func.isRequired,
    setStatus: PropTypes.func.isRequired,
    errors: PropTypes.object.isRequired,
    submitCount: PropTypes.number.isRequired,
    handleChange: PropTypes.func.isRequired,
    setFieldValue: PropTypes.func.isRequired,
    submitForm: PropTypes.func.isRequired,
    values: PropTypes.object.isRequired,
    loading: PropTypes.bool.isRequired,
    isValidating: PropTypes.bool.isRequired,
    status: PropTypes.string.isRequired
  };

  handleOnChangeCheck = event => {
    const {
      setFieldValue,
      handleChange,
      values: { hasClubLaNacion }
    } = this.props;

    setFieldValue(keys.hasClubLaNacion, !hasClubLaNacion, keys.hasClubLaNacion);
    setFieldValue(keys.cardNumber, '');
    handleChange(event);
  };

  handleOnChangeSelect = event => {
    const { setFieldValue, handleChange } = this.props;

    setFieldValue(keys.cuit, '');
    setFieldValue(keys.dni, '');

    handleChange(event);
  };

  handleOnChangeCardNumber = event => {
    const { handleChange } = this.props;

    handleChange(event);
  };

  handleOnClickButton = () => {
    const { validateCLNCardNumber, values } = this.props;
    if (values.hasClubLaNacion) {
      if (!values.isValidCardNumber) {
        validateCLNCardNumber(values.isValidCardNumber, values);
      }
    }
  };

  getInputProps = propKey => {
    const { handleChange, values } = this.props;

    return {
      inputName: keys[propKey],
      labelName: `lbl${keys[propKey]}`,
      description: labels[propKey],
      placeholder: placeholders[propKey],
      ariaDescribedBy: aria[propKey],
      maxLength: limits.max[propKey],
      mask: maskInputTextAsNumber,
      onChange: handleChange,
      value: values[propKey]
    };
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

  render() {
    const { errors, submitCount, values } = this.props;
    const usuario = JSON.parse(localStorage.getItem("contact"));

    return (
      <FormFormik className='registration__form'>
        <Select disabled={usuario} 
          {...this.getSelectProps('proofOfPayment')}
          selectClassName='form-control input'
          options={options}
        />
        {
        values.proofOfPayment === index.endCostomer && (
          <Input {...this.getInputProps('dni')} type='text' value={usuario ? usuario.idNumber : null} disabled={usuario} />
        )}
        {submitCount > 0 &&
          Object.prototype.hasOwnProperty.call(errors, keys.dni) && (
            <Error errors={[errors.dni]} />
          )}

        {values.proofOfPayment === index.vatRegistered && (
          <Input {...this.getInputProps('cuit')} type='text' />
        )}
        {submitCount > 0 &&
          Object.prototype.hasOwnProperty.call(errors, keys.cuit) && (
            <Error errors={[errors.cuit]} />
          )}

        <p className='switch-p'>{labels.suscriptionLN}</p>

        <CheckBox
          className='switch'
          checkboxName={keys.hasClubLaNacion}
          checked={values.hasClubLaNacion}
          spanClassName='slider'
          onClick={this.handleOnChangeCheck}
        />
        {values.hasClubLaNacion ? (
          <div className='registration__card-container registration__card'>
            <div className='row'>
              <div className='col-md-12 helpers__text-right'>
                <img className='' src={logoNacion} alt='logo' />
              </div>

              <div className='col-md-12'>
                <Input
                  {...this.getInputProps('cardNumber')}
                  type='text'
                  onChange={this.handleOnChangeCardNumber}
                />
              </div>
            </div>
          </div>
        ) : (
          <div className='registration__card-container'>
            <div className='row'>
              <div className='col-md-4'>
                <img className='' src={logoNacion} alt='logo' />
              </div>
              <div className='col-md-6 helper__text-left'>
                {MESSAGES.NO_DISCOUNT_CLUB_LA_NACION}
              </div>
              <div className='col-md-2' />
            </div>
          </div>
        )}
        {submitCount > 0 &&
          Object.prototype.hasOwnProperty.call(errors, keys.cardNumber) && (
            <Error errors={[errors.cardNumber]} />
          )}

        <p className='registration__info'>
          {MESSAGES.MESSAGE_TIERRA_DEL_FUEGO}
        </p>
        <p className='required-fields'>{MESSAGES.REQUIRED_FIELDS}</p>
        <Button
          description={MESSAGES.BUTTON_CONTINUE}
          onClick={this.handleOnClickButton}
          divClassName='registration__container-button helpers__text-center'
          buttonClassName='button__primary'
        />
      </FormFormik>
    );
  }
}

export default Form;
