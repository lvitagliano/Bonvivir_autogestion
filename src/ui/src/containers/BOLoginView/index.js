import React, { Component } from 'react';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import { createStructuredSelector } from 'reselect';
import { push } from 'connected-react-router';

import backofficeActions from '../../actions/backoffice';
import { BOLogin, Loading } from '../../components';
import { makeGetBackoffice } from '../../selectors/backoffice';
import { BACKOFFICE } from '../../routes';

class BOLoginView extends Component {
  static propTypes = {
    backoffice: PropTypes.object.isRequired,
    login: PropTypes.func.isRequired
  };

  render() {
    const {
      backoffice: { loading, loginError },
      login
    } = this.props;

    return (
      <div className='backoffice'>
        <div className='container'>
          <BOLogin handleSubmit={login} loginError={loginError} />
        </div>
        <Loading
          show={loading}
          className='loading-validation loading-validation__login'
        />
      </div>
    );
  }
}

const mapStateToProps = createStructuredSelector({
  backoffice: makeGetBackoffice()
});

const mapDispatchToProps = dispatch => ({
  login: user => dispatch(backofficeActions.login(user)),
  goToBackofficeHome: () => dispatch(push(BACKOFFICE))
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(BOLoginView);
