import React, { Component } from 'react';
import PropTypes from 'prop-types';

class Select extends Component {
  static defaultProps = {
    disabled: false,
    required: false,
    selectClassName: 'form-control input',
    divClassName: 'form-group'
  };

  static propTypes = {
    divClassName: PropTypes.string,
    selectName: PropTypes.string.isRequired,
    labelName: PropTypes.string.isRequired,
    description: PropTypes.string.isRequired,
    selectId: PropTypes.string.isRequired,
    selectClassName: PropTypes.string,
    options: PropTypes.arrayOf(
      PropTypes.shape({
        value: PropTypes.string.isRequired,
        description: PropTypes.string.isRequired
      })
    ).isRequired,
    disabled: PropTypes.bool,
    required: PropTypes.bool,
    onChange: PropTypes.func.isRequired,
    value: PropTypes.string.isRequired
  };

  render() {
    const {
      divClassName,
      selectName,
      labelName,
      description,
      selectId,
      selectClassName,
      options,
      disabled,
      required,
      onChange,
      value
    } = this.props;

    return (
      <div className={divClassName}>
        <label htmlFor={selectName} name={labelName} id={labelName}>
          {description}
        </label>
        <select
          id={selectId}
          name={selectName}
          className={selectClassName}
          disabled={disabled}
          required={required}
          onChange={onChange}
          value={value}
        >
          {options.map(o => (
            <option key={o.value} value={o.value}>
              {o.description}
            </option>
          ))}
        </select>
      </div>
    );
  }
}

export default Select;
