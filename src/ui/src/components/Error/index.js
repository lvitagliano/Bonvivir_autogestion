import React, { Component } from 'react';
import PropTypes, { string } from 'prop-types';

class Error extends Component {
  static propTypes = {
    errors: PropTypes.arrayOf(string).isRequired
  };

  render() {
    const { errors } = this.props;

    return (
      <div className='error-input'>
        <div>
          <i className='fas fa-exclamation-triangle' />
        </div>
        <div>
          <p>{errors.map(error => error && `${error}. `)}</p>
        </div>
      </div>
    );
  }
}

export default Error;
