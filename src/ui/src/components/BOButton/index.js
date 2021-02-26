import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { CONSTANTS } from '../../config/constants';

class BOButton extends Component {
  static defaultProps = {
    type: 'button',
    onClick: CONSTANTS.VOID_FUNC
  };

  static propTypes = {
    icon: PropTypes.string.isRequired,
    value: PropTypes.string.isRequired,
    style: PropTypes.string.isRequired,
    type: PropTypes.string,
    onClick: PropTypes.func
  };

  render() {
    const { icon, value, type, onClick, style } = this.props;

    return (
      <button type='button' {...{ type }} className={style} onClick={onClick}>
        <i className={icon} />
        {value}
      </button>
    );
  }
}

export default BOButton;
