import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { CONSTANTS } from '../../config/constants';

class Checkbox extends Component {
  static defaultProps = {
    onClick: CONSTANTS.VOID_FUNC,
    onChange: CONSTANTS.VOID_FUNC,
    disabled: false,
    required: false
  };

  static propTypes = {
    className: PropTypes.string.isRequired,
    checkboxName: PropTypes.string.isRequired,
    checked: PropTypes.bool.isRequired,
    spanClassName: PropTypes.string.isRequired,
    onClick: PropTypes.func,
    onChange: PropTypes.func,
    disabled: PropTypes.bool,
    required: PropTypes.bool,
    tabIndex: PropTypes.string
  };

  render() {
    const {
      className,
      checkboxName,
      checked,
      spanClassName,
      onClick,
      onChange,
      disabled,
      required,
      tabIndex
    } = this.props;

    return (
      <label
        className={className}
        htmlFor={checkboxName}
        name={checkboxName}
        onClick={onClick}
        tabIndex={tabIndex}
      >
        <input
          type='checkbox'
          checked={checked}
          disabled={disabled}
          required={required}
          onChange={onChange}
          onClick={onClick}
          onKeyDown={onClick}
        />
        <span className={spanClassName} />
      </label>
    );
  }
}

export default Checkbox;
