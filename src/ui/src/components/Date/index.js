import React, { Component } from 'react';
import PropTypes from 'prop-types';
import uuidv1 from 'uuid/v1';

import { CONSTANTS } from '../../config/constants';
import { MESSAGES } from '../../config/messages';

class Date extends Component {
  static defaultProps = {
    selectClassName: 'form-control input',
    disabled: false,
    required: false,
    onChange: CONSTANTS.VOID_FUNC
  };

  static propTypes = {
    dateName: PropTypes.string.isRequired,
    labelName: PropTypes.string.isRequired,
    description: PropTypes.string.isRequired,
    defaultDay: PropTypes.string.isRequired,
    defaultMonth: PropTypes.string.isRequired,
    defaultYear: PropTypes.string.isRequired,
    divClassName: PropTypes.string.isRequired,
    selectClassName: PropTypes.string,
    disabled: PropTypes.bool,
    required: PropTypes.bool,
    prefixName: PropTypes.string.isRequired,
    prefixId: PropTypes.string.isRequired,
    maxYear: PropTypes.number.isRequired,
    minYear: PropTypes.number.isRequired,
    onChange: PropTypes.func
  };

  render() {
    const {
      dateName,
      labelName,
      description,
      defaultDay,
      defaultMonth,
      defaultYear,
      divClassName,
      selectClassName,
      disabled,
      required,
      prefixName,
      prefixId,
      maxYear,
      minYear,
      onChange
    } = this.props;

    const days = Array(31).fill(1);

    const years = Array(maxYear - minYear + 1).fill(1);

    return (
      <div>
        <label htmlFor={dateName} name={labelName} id={labelName}>
          {description}
        </label>
        <div className={divClassName}>
          <select
            id={`${prefixId}.day`}
            name={`${prefixName}.day`}
            className={selectClassName}
            disabled={disabled}
            required={required}
            onChange={onChange}
            value={defaultDay}
          >
            <option value='-1'> {MESSAGES.DEFAULT_DAY} </option>
            {days.map((d, i) => (
              <option key={uuidv1()} value={i + 1}>
                {i + 1}
              </option>
            ))}
          </select>
          <select
            id={`${prefixId}.month`}
            name={`${prefixName}.month`}
            className={selectClassName}
            disabled={disabled}
            required={required}
            onChange={onChange}
            value={defaultMonth}
          >
            <option value='-1'> {MESSAGES.DEFAULT_MONTH} </option>
            {CONSTANTS.MONTHS.map((m, i) => (
              <option key={uuidv1()} value={i + 1}>
                {m}
              </option>
            ))}
          </select>
          <select
            id={`${prefixId}.year`}
            name={`${prefixName}.year`}
            className={selectClassName}
            disabled={disabled}
            required={required}
            onChange={onChange}
            value={defaultYear}
          >
            <option value='-1'> {MESSAGES.DEFAULT_YEAR} </option>
            {years.map((y, i) => (
              <option key={uuidv1()} value={minYear + i}>
                {minYear + i}
              </option>
            ))}
          </select>
        </div>
      </div>
    );
  }
}

export default Date;
