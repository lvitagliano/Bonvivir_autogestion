import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { CONSTANTS } from '../../config/constants';

class TextArea extends Component {
  static defaultProps = {
    className: 'form-control input',
    divClassName: 'form-group',
    maxLength: '',
    onChange: CONSTANTS.VOID_FUNC,
    disabled: false,
    required: false,
    value: '',
    style: {}
  };

  static propTypes = {
    textAreaName: PropTypes.string.isRequired,
    labelName: PropTypes.string.isRequired,
    description: PropTypes.string.isRequired,
    rows: PropTypes.string.isRequired,
    cols: PropTypes.string.isRequired,
    className: PropTypes.string,
    divClassName: PropTypes.string,
    maxLength: PropTypes.string,
    onChange: PropTypes.func,
    disabled: PropTypes.bool,
    required: PropTypes.bool,
    value: PropTypes.string,
    placeholder: PropTypes.string.isRequired,
    style: PropTypes.object
  };

  render() {
    const {
      textAreaName,
      labelName,
      description,
      rows,
      cols,
      className,
      divClassName,
      maxLength,
      onChange,
      disabled,
      required,
      value,
      placeholder,
      style
    } = this.props;

    return (
      <div className={divClassName}>
        <label htmlFor={textAreaName} name={labelName} id={labelName}>
          {description}
        </label>
        <textarea
          rows={rows}
          cols={cols}
          className={className}
          name={textAreaName}
          maxLength={maxLength}
          disabled={disabled}
          required={required}
          onChange={onChange}
          value={value}
          placeholder={placeholder}
          style={style}
        />
      </div>
    );
  }
}

export default TextArea;
