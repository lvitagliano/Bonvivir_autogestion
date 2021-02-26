import React, { Component } from 'react';
import PropTypes, { string } from 'prop-types';
import uuidv1 from 'uuid/v1';
import classnames from 'classnames';

import { BOTableRow, BOButton } from '..';

class BOTable extends Component {
  static defaultProps = {
    isStriped: false,
    buttonHeader: null
  };

  static propTypes = {
    title: PropTypes.string.isRequired,
    columns: PropTypes.arrayOf(string).isRequired,
    rows: PropTypes.arrayOf(
      PropTypes.shape({
        content: PropTypes.object.isRequired,
        buttons: PropTypes.array
      })
    ).isRequired,
    isStriped: PropTypes.bool,
    buttonHeader: PropTypes.object
  };

  render() {
    const { title, columns, rows, isStriped, buttonHeader } = this.props;

    return (
      <div className='row'>
        <div className='col-md-12'>
          <h1 className='backoffice__h1'>
            {title}
            {buttonHeader && <BOButton {...buttonHeader} />}
          </h1>
        </div>
        <table
          className={classnames('ttable', 'table-striped', 'table-sm', {
            'table-striped': isStriped
          })}
        >
          <thead>
            <tr className='trr'>
              {columns.map(t => (
                <th className='thh' key={uuidv1()}>
                  {t}
                </th>
              ))}
            </tr>
          </thead>
          <tbody>
            {rows.map(r => (
              <BOTableRow
                key={uuidv1()}
                buttons={r.buttons}
                columns={r.content}
              />
            ))}
          </tbody>
        </table>
      </div>
    );
  }
}

export default BOTable;
