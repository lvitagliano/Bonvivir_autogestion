import React, { Component } from 'react';
import classnames from 'classnames';
import PropTypes from 'prop-types';

import { MESSAGES } from '../../config/messages';
import iconCup from '../../resources/images/icon-cup.png';

class RegistrationSteps extends Component {
  static propTypes = {
    currentStep: PropTypes.number.isRequired,
    prevStep: PropTypes.func.isRequired
  };

  render() {
    const { currentStep, prevStep } = this.props;

    return (
      <div>
        <div className='registration__cup-steps'>
          <div
            className={classnames('step', { 'step--active': currentStep >= 1 })}
          >
            <img src={iconCup} alt='cup' />
          </div>
          <div className='registration__Right-container__line-separator' />
          <div
            className={classnames('step', { 'step--active': currentStep >= 2 })}
          >
            <img src={iconCup} alt='cup' />
          </div>
          <div className='registration__Right-container__line-separator' />
          <div
            className={classnames('step', { 'step--active': currentStep >= 3 })}
          >
            <img src={iconCup} alt='cup' />
          </div>
          <div className='registration__Right-container__line-separator' />
          <div
            className={classnames('step', { 'step--active': currentStep >= 4 })}
          >
            <img src={iconCup} alt='cup' />
          </div>
        </div>

        <div className='registration__title helpers__flex'>
          <button type='submit' className='hidden-xs' onClick={prevStep}>
            <i className='fas fa-arrow-left' />
          </button>
          <h3 className='title__h3'>
            {MESSAGES.TITLE_REGISTRATION_STEP[currentStep - 1]}
          </h3>
        </div>
      </div>
    );
  }
}

export default RegistrationSteps;
