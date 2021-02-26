import React, { Component } from 'react';

import Logo from '../../resources/images/logo.png';
import { MESSAGES } from '../../config/messages';

class AUNavBar extends Component {
  render() {
    return (
      <div className='au-navbar'>
        <nav
          className='navbar navbar-default navbar-fixed-top au-navbar__navbar-bon align-center'
          role='navigation'
        >
          <div className='col au-navbar__margin-col'>
            <button
              type='button'
              className='navbar-toggle au-navbar__navbartogglebutton au-navbar__button-bon col-3'
              data-toggle='collapse'
              data-target='#navbar-collapse-main'
            >
              <i className='fas fa-bars' />
            </button>
            <a href='https://www.bonvivir.com/'>
              <img
                className='au-navbar__logo-bonvi margin-right'
                alt='logo'
                src={Logo}
                width='160px'
              />
            </a>
            <div
              className='au-navbar__margin-top collapse navbar-collapse text-left'
              id='navbar-collapse-main'
            >
              <ul className='nav navbar-nav navbar-right au-navbar__margin-nav au-navbar__flex-nav'>
                <li className='au-navbar__text'>{MESSAGES.MY_SUBS}</li>
                <li className='au-navbar__text'>{MESSAGES.QUERIES}</li>
                <li className='au-navbar__text'>{MESSAGES.MY_ORDER}</li>
                <li className='au-navbar__text'>{MESSAGES.MY_ACCOUNT}</li>
                <li className='au-navbar__text'>{MESSAGES.LOG_OUT}</li>
              </ul>
            </div>
          </div>
        </nav>
      </div>
    );
  }
}

export default AUNavBar;
