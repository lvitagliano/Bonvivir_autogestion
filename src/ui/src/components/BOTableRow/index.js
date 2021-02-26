import React, { Component } from 'react';
import PropTypes from 'prop-types';
import uuidv1 from 'uuid/v1';

import { BOButton } from '..';

class BOTableRow extends Component {
  static propTypes = {
    buttons: PropTypes.arrayOf(
      PropTypes.shape({
        icon: PropTypes.string.isRequired,
        value: PropTypes.string.isRequired,
        onClick: PropTypes.func
      })
    ).isRequired,
    columns: PropTypes.object.isRequired
  };

  columnsRender = () => {
    const { columns } = this.props;
    const keys = Object.keys(columns);

    return keys.map(k => <td key={uuidv1()}>{columns[k]}</td>);
  };

  render() {
    const { buttons } = this.props;

    return (
      <tr className='trr'>
        {this.columnsRender()}
        <td className='tdd'>
          {buttons.map(b => (
            <BOButton key={uuidv1()} {...b} />
          ))}
        </td>
      </tr>
    );
  }
}

export default BOTableRow;
