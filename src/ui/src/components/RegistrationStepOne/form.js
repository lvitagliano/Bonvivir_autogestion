import React, { Component } from 'react';
import PropTypes from 'prop-types';
import moment from 'moment';
import { Form as FormFormik } from 'formik';

import { MESSAGES } from '../../config/messages';
import maskInputTextAsNumber from '../../utils/maskInputTextAsNumber';
import boxes from '../../resources/images/boxes.png';
import truck from '../../resources/images/truck.png';
import logoNacion from '../../resources/images/la-nacion.png';
import cards from '../../resources/images/cards.png';

import labels from './labels';
import placeholders from './placeholders';
import { keys, limits, ids, aria } from './schema';
import { options } from './options';
import { Date, Input, Button, Error, Modal, Select } from '..';

class Form extends Component {
  static propTypes = {
    changeShowModal: PropTypes.func.isRequired,
    errors: PropTypes.object.isRequired,
    fieldStep: PropTypes.number.isRequired,
    handleChange: PropTypes.func.isRequired,
    showModal: PropTypes.bool.isRequired,
    onChange: PropTypes.func.isRequired,
    saveLead: PropTypes.func.isRequired,
    setFieldValue: PropTypes.func.isRequired,
    validateForm: PropTypes.func.isRequired,
    submitForm: PropTypes.func.isRequired,
    submitCount: PropTypes.number.isRequired,
    values: PropTypes.object.isRequired,
    campaignId: PropTypes.string.isRequired
  };

  handleSaveLead = () => {
    const {
      changeShowModal,
      saveLead,
      submitForm,
      validateForm,
      values,
      campaignId
    } = this.props;

    validateForm().then(errors => {
      if (Object.entries(errors).length === 0) {
        saveLead({ ...values }, campaignId);
        changeShowModal();
      } else {
        submitForm();
      }
    });
  };


  handleOnChange = event => {
    const { onChange, handleChange } = this.props;

    onChange(event);
    handleChange(event);
  };

  handleDateOnChange = event => {
    const {
      setFieldValue,
      values: { date }
    } = this.props;

    setFieldValue(event.target.name, event.target.value);

    const year =
      event.target.name === keys.year ? event.target.value : date.year;
    const month =
      event.target.name === keys.month ? event.target.value : date.month;
    const day = event.target.name === keys.day ? event.target.value : date.day;

    const dateObject = moment(
      `${year.padStart(4, '0')}-${month.padStart(2, '0')}-${day.padStart(
        2,
        '0'
      )}`,
      'YYYY-MM-DD',
      true
    );

    setFieldValue(keys.dateObject, dateObject.isValid() ? dateObject : null);
  };

  getInputProps = propKey => {
    const { fieldStep, values } = this.props;

    return {
      inputName: keys[propKey],
      maxLength: `${limits.max[propKey]}`,
      description: labels[propKey],
      labelName: `lbl${keys[propKey]}`,
      onChange: this.handleOnChange,
      ariaDescribedBy: aria[propKey],
      placeholder: placeholders[propKey],
      id: ids[propKey],
      disabled: fieldStep < Number(ids[propKey]),
      value: values[propKey]
    };
  };

  getDateProps = propKey => {
    const { fieldStep, values } = this.props;

    return {
      dateName: keys[propKey],
      labelName: `lbl${keys[propKey]}`,
      description: labels[propKey],
      prefixName: keys[propKey],
      prefixId: keys[propKey],
      disabled: fieldStep < Number(ids[propKey]),
      onChange: this.handleDateOnChange,
      defaultDay: values[propKey].day,
      defaultMonth: values[propKey].month,
      defaultYear: values[propKey].year,
      minYear: limits.min[propKey].year(),
      maxYear: limits.max[propKey].year()
    };
  };

  handleOnChangeSelect = event => {
    const { handleChange } = this.props;

    handleChange(event);

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
    const { errors, submitCount, showModal, changeShowModal } = this.props;

    return (
      <FormFormik className='registration__form'>
        <Input
          {...this.getInputProps('name')}
          type='text'
          error={submitCount > 0 ? errors.name || null : null}
        />
        <Input
          {...this.getInputProps('lastName')}
          type='text'
          error={submitCount > 0 ? errors.lastName || null : null}
        />
        
        <Select
          {...this.getSelectProps('gender')}
          selectClassName='form-control input'
          options={options}
        />

          <br/>

        <div className='form-group'>
          <div className='registration__container-tel'>
            <Input
              {...this.getInputProps('cod')}
              divClassName=''
              type='text'
              mask={maskInputTextAsNumber}
            />
            <Input
              {...this.getInputProps('tel')}
              divClassName='input-number'
              type='text'
              mask={maskInputTextAsNumber}
            />
          </div>
          {submitCount > 0 &&
            (Object.prototype.hasOwnProperty.call(errors, keys.cod) ||
              Object.prototype.hasOwnProperty.call(errors, keys.tel)) && (
              <Error errors={[errors.cod, errors.tel]} />
            )}
        </div>

        <Input
          {...this.getInputProps('email')}
          type='email'
          error={submitCount > 0 ? errors.email || null : null}
        />
        <div className='form-group'>
          <Date
            {...this.getDateProps('date')}
            divClassName='form-group__date'
            selectClassName='form-control input'
          />
          {submitCount > 0 &&
            Object.prototype.hasOwnProperty.call(errors, keys.date) && (
              <Error errors={[errors.date.date]} />
            )}
        </div>
        <p className='required-fields'>{MESSAGES.REQUIRED_FIELDS}</p>
        <Button
          description={MESSAGES.BUTTON_CONTINUE}
          divClassName='registration__container-button helpers__text-center'
          buttonClassName='button__primary'
        />
        <br />
        <div className='helpers__text-center'>
          <span
            className='registration__link'
            onClick={this.handleSaveLead}
            role='button'
            onKeyPress={this.handleSaveLead}
            tabIndex={0}
          >
            {MESSAGES.LEAD}
          </span>
        </div>
        {showModal && (
          <Modal handleClose={changeShowModal}>
            <div className='helpers__text-center'>
              <img
                className='registration__modal--boxes'
                src={boxes}
                alt='cajas'
              />
              <p className='registration__modal--text'>{MESSAGES.THANKS}</p>
              <p className='registration__modal--text'>
                {MESSAGES.LEAD_MODAL_DESCRIPTION}
              </p>
              <div className='registration__modal--images-container'>
                <div className='truck-container'>
                  <img className='truck' src={truck} alt='camion' />
                  <p className='truck-information'>
                    {MESSAGES.LEAD_MODAL_SHIPPING_INFORMATION}
                  </p>
                </div>
                <img src={logoNacion} alt='logo la nacion' />
                <img className='cards' src={cards} alt='tarjetas' />
              </div>
              <span className='registration__modal--information'>
                {MESSAGES.LEADL_MODAL_INFORMATION_1}
              </span>
              <p className='registration__modal--information'>
                {MESSAGES.LEADL_MODAL_INFORMATION_2}
              </p>
            </div>
          </Modal>
        )}
      </FormFormik>
    );
  }
}

export default Form;
