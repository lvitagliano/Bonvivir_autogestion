import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { CONSTANTS } from '../../config/constants';

import { Error } from '..';

class Input extends Component {
  static defaultProps = {
    id: '',
    maxLength: '',
    disabled: false,
    className: 'form-control input',
    required: false,
    divClassName: 'form-group',
    mask: CONSTANTS.VOID_FUNC,
    onChange: CONSTANTS.VOID_FUNC,
    onBlur: CONSTANTS.VOID_FUNC,
    children: null,
    error: '',
    value: '',
    accept: '',
    style: {}
  };

  static propTypes = {
    divClassName: PropTypes.string,
    inputName: PropTypes.string.isRequired,
    className: PropTypes.string,
    type: PropTypes.string.isRequired,
    labelName: PropTypes.string.isRequired,
    description: PropTypes.string.isRequired,
    placeholder: PropTypes.string.isRequired,
    ariaDescribedBy: PropTypes.string.isRequired,
    id: PropTypes.string,
    maxLength: PropTypes.string,
    disabled: PropTypes.bool,
    required: PropTypes.bool,
    mask: PropTypes.func,
    onChange: PropTypes.func,
    onBlur: PropTypes.func,
    children: PropTypes.node,
    error: PropTypes.string,
    value: PropTypes.string,
    accept: PropTypes.string,
    style: PropTypes.object
  };

  render() {
    const {
      divClassName,
      inputName,
      className,
      type,
      labelName,
      description,
      maxLength,
      placeholder,
      ariaDescribedBy,
      id,
      disabled,
      required,
      mask,
      onChange,
      onBlur,
      children,
      error,
      value,
      accept,
      style
    } = this.props;

    return (
      <div className={divClassName}>
        <label htmlFor={inputName} required name={labelName} id={labelName}>
          {description}
        </label>
        <input
          id={id}
          type={type}
          name={inputName}
          className={className}
          maxLength={maxLength}
          placeholder={placeholder}
          aria-describedby={ariaDescribedBy}
          disabled={disabled}
          required={required}
          onKeyDown={mask}
          onChange={onChange}
          onBlur={onBlur}
          value={value}
          accept={accept}
          style={style}
        />
        {children}
        {error && <Error errors={[error]} />}
      </div>
    );
  }
}

export default Input;
