import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { MESSAGES } from '../../config/messages';

import styles from './styles';

const { BOUNDARY_ERROR_MSG } = MESSAGES;

class ErrorBoundary extends Component {
  constructor(props) {
    super(props);
    this.state = {
      error: false
    };
  }

  static propTypes = {
    children: PropTypes.node.isRequired
  };

  static getDerivedStateFromError() {
    return { error: true };
  }

  render() {
    const { children } = this.props;
    const { error } = this.state;

    if (error) {
      return (
        <div style={styles.container}>
          <h1>{BOUNDARY_ERROR_MSG}</h1>
        </div>
      );
    }

    return children;
  }
}

export default ErrorBoundary;
