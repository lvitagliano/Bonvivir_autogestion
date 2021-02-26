import React, { Component } from 'react';
import PropTypes from 'prop-types';

class MobileFillBg extends Component {
  static propTypes = {
    mobileAnimation: PropTypes.number.isRequired
  };

  render() {
    const { mobileAnimation } = this.props;

    return (
      <div className='mobileBG  hidden-lg hiddenMobile'>
        <div className='bowlMobile'>
          <div className='innerMobile'>
            <div
              style={{ transform: `translateY(${mobileAnimation}vh)` }}
              className='fillMobile'
              id='fillMobile'
            >
              <svg
                className='waveShapeMobile'
                xmlns='http://www.w3.org/2000/svg'
                version='1.1'
                width='300'
                height='300'
                viewBox='0 0 300 300'
              >
                <path d='M300,300V2.5c0,0-0.6-0.1-1.1-0.1c0,0-25.5-2.3-40.5-2.4c-15,0-40.6,2.4-40.6,2.4 c-12.3,1.1-30.3,1.8-31.9,1.9c-2-0.1-19.7-0.8-32-1.9c0,0-25.8-2.3-40.8-2.4c-15,0-40.8,2.4-40.8,2.4c-12.3,1.1-30.4,1.8-32,1.9 c-2-0.1-20-0.8-32.2-1.9c0,0-3.1-0.3-8.1-0.7V300H300z' />
              </svg>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default MobileFillBg;
