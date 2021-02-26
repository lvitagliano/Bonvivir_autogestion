import React, { Component } from 'react';
import PropTypes from 'prop-types';

import Logo from '../../resources/images/logo.png';
import { BACKOFFICE } from '../../routes';
import { CONSTANTS } from '../../config/constants';

import { BOButton } from '..';

class BOHeader extends Component {
  static defaultProps = {
    button: null,
    onClickButton: CONSTANTS.VOID_FUNC,
    logOutButton: null,
    logOut: CONSTANTS.VOID_FUNC,
    errorListButton: null,
    goToSubscriptionsWithError: CONSTANTS.VOID_FUNC
  };

  static propTypes = {
    title: PropTypes.string.isRequired,
    button: PropTypes.object,
    errorListButton: PropTypes.object,
    logOutButton: PropTypes.object,
    onClickButton: PropTypes.func,
    logOut: PropTypes.func,
    goToSubscriptionsWithError: PropTypes.func,
    exportButton: PropTypes.object
  };

  render() {
    const {
      title,
      button,
      onClickButton,
      logOut,
      logOutButton,
      errorListButton,
      goToSubscriptionsWithError,
      exportButton
    } = this.props;

    return (
      <header className='backoffice__header'>
        <div className='row'>
          <div className='col'>
            <div className='col align-self-end text-right'>
              {logOutButton && (
                <BOButton
                  {...errorListButton}
                  onClick={goToSubscriptionsWithError}
                />
              )}
              {errorListButton && (
                <BOButton {...logOutButton} onClick={logOut} />
              )}
            </div>
          </div>
        </div>
        <div className='col'>
          <div className='row'>
            <a className='col-md-3' href={BACKOFFICE}>
              <img src={Logo} id='logoBO' width='200' height='70' alt='' />
            </a>
          </div>
          <div className='row'>
            <div className='col'>
              <h1 className='backoffice__h1'>{title}</h1>
            </div>
            {button && (
              <div className='col text-right'>
                <BOButton {...button} onClick={onClickButton} />
              </div>
            )}
          </div>
        </div>
      </header>
    );
  }
}

export default BOHeader;
