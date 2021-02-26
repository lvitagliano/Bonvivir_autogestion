import React, { Component } from 'react';
import { connect } from 'react-redux';
import { createStructuredSelector } from 'reselect';
import { Route } from 'react-router-dom';
import PropTypes from 'prop-types';
import 'moment/locale/es';

import backofficeActions from '../../actions/backoffice';
import { makeGetBackoffice } from '../../selectors/backoffice';
import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';

class Div extends Component {
  render() {
    return <div />;
  }
}

// eslint-disable-next-line react/no-multi-comp
class PrivateRoute extends Component {
  static propTypes = {
    backoffice: PropTypes.object.isRequired,
    component: PropTypes.any.isRequired,
    isAuthenticated: PropTypes.any.isRequired,
    goToLogin: PropTypes.any.isRequired
  };

  componentDidMount() {
    const { isAuthenticated } = this.props;

    isAuthenticated();
  }

  componentDidUpdate() {
    const { goToLogin } = this.props;
    const {
      backoffice: { isAuthenticated, loginError }
    } = this.props;

    if (loginError || !isAuthenticated) {
      goToLogin();
    }
  }

  renderComponent() {
    const { component: RenderComponent } = this.props;
    const {
      backoffice: { isAuthenticated, loginError }
    } = this.props;

    if (isAuthenticated && !loginError) {
      return RenderComponent;
    }

    return Div;
  }

  render() {
    const { ...rest } = this.props;

    const RenderComponent = this.renderComponent();

    return <Route {...rest} component={RenderComponent} />;
  }
}

const mapStateToProps = createStructuredSelector({
  backoffice: makeGetBackoffice()
});

const mapDispatchToProps = dispatch => ({
  isAuthenticated: () => dispatch(backofficeActions.isAuthenticated()),
  goToLogin: () => dispatch(backofficeActions.goToLogin())
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(PrivateRoute);
