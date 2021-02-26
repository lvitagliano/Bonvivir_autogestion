import React, { Component } from 'react';
import PropTypes from 'prop-types';
import classnames from 'classnames';

import Cup from '../Cup';
import Logo from '../../resources/images/logo_violeta.png';
import { CONSTANTS } from '../../config/constants';

class Loading extends Component {
  constructor(props) {
    super(props);

    this.state = {
      animationIndex: 0
    };
  }

  componentDidMount() {
    this.interval = setInterval(() => {
      const { animationIndex } = this.state;
      const newIndex = animationIndex + 1;

      this.setState({
        animationIndex:
          newIndex === CONSTANTS.ANIMATIONS.DESKTOP.length ? 0 : newIndex
      });
    }, 1000);
  }

  componentWillUnmount() {
    clearInterval(this.interval);
  }

  static defaultProps = {
    withLogo: false,
    className: 'loading'
  };

  static propTypes = {
    className: PropTypes.string,
    show: PropTypes.bool.isRequired,
    withLogo: PropTypes.bool
  };

  render() {
    const { animationIndex } = this.state;
    const { className, show, withLogo } = this.props;

    return (
      <div
        className={classnames(className, {
          loading__show: show,
          loading__hide: !show
        })}
      >
        {withLogo && <img src={Logo} className='loading__logo' alt='logo' />}
        <Cup desktopAnimation={CONSTANTS.ANIMATIONS.DESKTOP[animationIndex]} />
      </div>
    );
  }
}

export default Loading;
