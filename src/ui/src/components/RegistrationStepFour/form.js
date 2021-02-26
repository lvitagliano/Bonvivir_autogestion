import React, { Component, useState } from 'react';
import { Form as FormFormik } from 'formik';
import PropTypes from 'prop-types';
import moment from 'moment';
import ReCAPTCHA from 'react-google-recaptcha';

import { MESSAGES } from '../../config/messages';
import maskInputTextAsNumber from '../../utils/maskInputTextAsNumber';
import { getCardTypeByValue } from '../../utils/cardTypesMock';

import placeholders from './placeholders';
import labels from './labels';
import { keys, limits, aria } from './schema';

import { Input, Button, Error } from '..';

const recaptchaRef = React.createRef();

class Form extends Component {
  state = {
    ready: false,
    disabled: false
  };

  static propTypes = {
    errors: PropTypes.object.isRequired,
    handleChange: PropTypes.func.isRequired,
    setFieldValue: PropTypes.func.isRequired,
    submitCount: PropTypes.number.isRequired,
    values: PropTypes.object.isRequired,
    acceptedPaymentMethods: PropTypes.array.isRequired,
    subscriptionDates: PropTypes.object.isRequired,
    setFormDataStepFour: PropTypes.object.isRequired
  };

  handleOnChangeCheck = () => {
    const { values, setFieldValue } = this.props;

    setFieldValue(
      keys.authorizationClubBonvivir,
      !values.authorizationClubBonvivir
    );
  };

  handleCardNumberChange = event => {
    const { handleChange, setFieldValue, acceptedPaymentMethods } = this.props;
    const card = getCardTypeByValue(event.target.value);
    let validPaymentMethod = '';

    if (card.guid) {
      const filteredPaymentMethods = acceptedPaymentMethods.filter(
        pm => pm.issuerId === card.guid
      );

      validPaymentMethod =
        filteredPaymentMethods.length > 0 ? filteredPaymentMethods[0].id : '';
    }

    setFieldValue(keys.paymentMethodId, validPaymentMethod);
    setFieldValue(keys.cardType, { ...card });

    handleChange(event);
  };

  getInputProps = propKey => {
    const { values } = this.props;

    return {
      inputName: keys[propKey],
      maxLength: `${limits.max[propKey]}`,
      description: labels[propKey],
      labelName: `lbl${keys[propKey]}`,
      ariaDescribedBy: aria[propKey],
      placeholder: placeholders[propKey],
      value: values[propKey]
    };
  };

  handleOnChange = ev => {
    const { setFormDataStepFour, setFieldValue } = this.props;

    if (ev.target.selectedIndex === 1) {
      this.setState({ disabled: false });
    } else {
      this.setState({ disabled: true });
      setFieldValue('cardNumber', '');
      setFormDataStepFour({ cardNumber: '' });
    }
  };

  render() {
    const {
      errors,
      handleChange,
      submitCount,
      values,
      subscriptionDates: { renovationDate }
    } = this.props;

    return (
      <FormFormik className='registration__form'>
        <div className='form-group'>
          <div
            className='row'
            style={{ display: 'flex', alignItems: 'center' }}
          >
            <div className='col-md-6'>
              <label
                htmlFor={keys.suscriptionCard}
                required
                name={this.labelName}
              >
                {labels.suscriptionCard}
              </label>
            </div>
            <div
              className='col-md-6'
              style={{
                display: 'flex',
                alignItems: 'center',
                justifyContent: 'flex-end'
              }}
            >
              <img
                src='/images/tarjetas_bv_club.png'
                alt='logo'
                style={{ width: '200px' }}
              />
            </div>
          </div>

          <p style={{ fontSize: '12px', margin: '15px 0' }}>
            {`Aceptamos tarjetas de crédito Visa, Mastecard, American Express y
            Tarjeta Naranja.`}
          </p>
        </div>
        <div className='registration__card-container registration__card '>
          <div className='row'>
            <div
              className='col-md-12 helpers__text-right'
              style={{
                marginBottom: '10px',
                display: 'flex',
                flexDirection: 'row-reverse',
                justifyContent: 'space-between',
                alignItems: 'center'
              }}
            >
              <img
                src={getCardTypeByValue(values.cardNumber).image}
                alt='logo'
              />

              <select
                className='form-control'
                onChange={this.handleOnChange}
                style={{ width: '223px' }}
              >
                <option value=' ' disabled selected hidden>
                  Seleccione un tipo de tarjeta
                </option>
                <option value={1}>Tarjeta de credito</option>
                <option value={2}>Tarjeta de debito</option>
              </select>
            </div>

            <span
              hidden={!this.state.disabled}
              style={{
                fontSize: '12px',
                color: '#cf1b1b',
                width: '80%',
                margin: '0 auto 10px auto',
                textAlign: 'center'
              }}
            >
              No aceptamos tarjetas de débito Visa Electron, Mastecard Maestro
              ni tarjetas recargables
            </span>
            <div className='col-md-12'>
              <Input
                {...this.getInputProps('cardNumber')}
                type='text'
                onChange={this.handleCardNumberChange}
                mask={maskInputTextAsNumber}
                disabled={this.state.disabled}
                id='cardNumber'
              />
            </div>

            <div className='col-md-12'>
              <Input
                {...this.getInputProps('cardOwner')}
                type='text'
                onChange={handleChange}
                disabled={this.state.disabled}
                id='cardOwner'
              />
            </div>
          </div>
        </div>
        {submitCount > 0 &&
          (Object.prototype.hasOwnProperty.call(errors, keys.cardNumber) ||
            Object.prototype.hasOwnProperty.call(errors, keys.cardOwner)) && (
            <Error errors={[errors.cardNumber, errors.cardOwner]} />
          )}
        <div className='registration__authorization-clubBonvivir'>
          {renovationDate ? (
            <p
              style={{ fontSize: '12px', margin: '15px 0', color: '#762057' }}
            >{` El primer cobro se realizará el día ${moment(
              renovationDate
            ).format('DD/MM/YYYY')}`}</p>
          ) : null}
          <label
            className='checkbox'
            htmlFor='authorizationClubBonvivir'
            name='authorizationClubBonvivir'
          >
            <input
              type='checkbox'
              name={keys.authorizationClubBonvivir}
              checked={values.authorizationClubBonvivir}
              onChange={this.handleOnChangeCheck}
            />
            <span
              className='checkmark'
              role='button'
              onClick={this.handleOnChangeCheck}
              onKeyPress={this.handleOnChangeCheck}
              tabIndex={0}
            />
            <p>
              {MESSAGES.AUTHORIZATION_CLUB_BONVIVIR}
              <a
                href={MESSAGES.AUTHORIZATION_CLUB_BONVIVIR_LINK}
                target='_blank'
                rel='noopener noreferrer'
              >
                {MESSAGES.TERMS_AND_CONDITIONS_WEB}
              </a>
            </p>
          </label>
          {submitCount > 0 &&
            Object.prototype.hasOwnProperty.call(
              errors,
              keys.authorizationClubBonvivir
            ) && <Error errors={[errors.authorizationClubBonvivir]} />}
        </div>
        <p className='required-fields'>{MESSAGES.REQUIRED_FIELDS}</p>
        <ReCAPTCHA
          ref={recaptchaRef}
          sitekey='6LfvDvYUAAAAAOl78mPYDeTqAi8JrPwkBEdtu1Rt'
          onChange={() => {
            this.setState({ ready: true });
          }}
        />
        <br />
        <Button
          disabled={!this.state.ready}
          description={MESSAGES.BUTTON_SUSCRIBE}
          divClassName='registration__container-button helpers__text-center'
          buttonClassName='button__primary'
        />
      </FormFormik>
    );
  }
}

export default Form;
