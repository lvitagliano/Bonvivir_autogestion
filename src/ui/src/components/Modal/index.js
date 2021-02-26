import React, { Component } from 'react';
import PropTypes from 'prop-types';

class Modal extends Component {
  static defaultProps = {
    showClose: true
  };

  static propTypes = {
    children: PropTypes.node.isRequired,
    handleClose: PropTypes.func.isRequired,
    showClose: PropTypes.bool
  };

  handleClose = event => {
    const { handleClose } = this.props;

    if (event.target.classList.contains('custom-modal')) {
      handleClose();
    }
  };

  render() {
    const { children, handleClose, showClose } = this.props;

    return (
      <div
        className='custom-modal'
        onClick={this.handleClose}
        role='button'
        onKeyPress={this.handleClose}
        tabIndex={0}
      >
        <div className='custom-modal-content'>
          <div className='custom-modal-header'>
            {showClose && (
              <span
                className='close'
                onClick={handleClose}
                role='button'
                onKeyPress={handleClose}
                tabIndex={-1}
              >
                <i className='fas fa-times' />
              </span>
            )}
          </div>
          <div className='custom-modal-body'>{children}</div>
          <div className='custom-modal-footer' />
        </div>
      </div>
    );
  }
}

export default Modal;
