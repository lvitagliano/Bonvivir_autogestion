import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { connect } from 'react-redux';
import { push } from 'connected-react-router';

import { Button } from '../../components';
import { MESSAGES } from '../../config/messages';
import { SELECTION } from '../../routes';

const { NOT_FOUND_MSG, GO_TO_SELECTION_MSG } = MESSAGES;

class NotFound extends Component {
  static propTypes = {
    goToSelection: PropTypes.func.isRequired
  };

  render() {
    const { goToSelection } = this.props;

    return (
      <div className='helpers__text-center'>
        <br />
        <label htmlFor='button'>{NOT_FOUND_MSG}</label>
        <hr />
        <Button
          description={GO_TO_SELECTION_MSG}
          divClassName='helpers__text-center'
          buttonClassName='button__primary'
          onClick={goToSelection}
        />
      </div>
    );
  }
}

const mapDispatchToProps = dispatch => ({
  goToSelection: () => dispatch(push(SELECTION))
});

export default connect(
  null,
  mapDispatchToProps
)(NotFound);
