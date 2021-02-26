import React, { Component } from 'react';
import PropTypes from 'prop-types';

import CopaSvg from '../../resources/images/copita.png';

class Cup extends Component {
  static propTypes = {
    desktopAnimation: PropTypes.number.isRequired,
    size:PropTypes.string
  };

  static defaultProps = {
    size:''
  }
  

  render() {
    const { desktopAnimation,size } = this.props;
    const offset = (size==='sm' ? 20:0);
    
    return (
      <div className={`cup-container`}>
        <img className={`${size}cup`} alt='glass' src={CopaSvg} />
        <div className='bowl'>
          <div className={`${size}inner`}>
            <div
              style={{ transform: `translate(0, ${desktopAnimation + offset }px)` }}
              className='fill'
              id='fill'
            >
              <svg
                className='waveShape'
                x='0px'
                y='0px'
                xmlns='http://www.w3.org/2000/svg'
                width='300'
                height='300'
                viewBox='0 0 300 300'
                version='1.1'
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

export default Cup;
