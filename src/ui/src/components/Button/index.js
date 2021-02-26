import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { CONSTANTS } from '../../config/constants';

class Button extends Component {
  static defaultProps = {
    divClassName: '',
    buttonClassName: '',
    onClick: CONSTANTS.VOID_FUNC,
    // eslint-disable-next-line no-undefined
    disabled: undefined
  };

  static propTypes = {
    description: PropTypes.string.isRequired,
    divClassName: PropTypes.string,
    buttonClassName: PropTypes.string,
    onClick: PropTypes.func,
    disabled: PropTypes.bool
  };

  render() {
    const {
      description,
      divClassName,
      buttonClassName,
      onClick,
      disabled
    } = this.props;

    return (
      <div className={divClassName}>
        <button
          type='submit'
          className={buttonClassName}
          onClick={onClick}
          disabled={disabled}
        >
          {description}
        </button>
      </div>
    );
  }
}

export default Button;
