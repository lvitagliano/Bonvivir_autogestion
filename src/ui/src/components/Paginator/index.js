import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { CONSTANTS } from '../../config/constants';

class Paginator extends Component {
  static defaultProps = {
    qtyShowPages: 3
  };

  static propTypes = {
    divClassName: PropTypes.string.isRequired,
    qtyPages: PropTypes.number.isRequired,
    changePage: PropTypes.func.isRequired,
    actualPage: PropTypes.number.isRequired,
    qtyShowPages: PropTypes.number
  };

  showPages = i => {
    const { actualPage, qtyShowPages, qtyPages } = this.props;

    const dat = Math.ceil(qtyShowPages / 2);

    return (actualPage <= dat && i <= qtyShowPages) ||
      (actualPage > qtyPages - dat && i > qtyPages - qtyShowPages)
      ? true
      : actualPage - dat < i && i < actualPage + dat;
  };

  render() {
    const { divClassName, qtyPages, changePage, actualPage } = this.props;

    const pages = new Array(qtyPages);

    pages.fill(1);

    return (
      <div className={divClassName}>
        <nav aria-label='Page navigation example'>
          <ul className='pagination justify-content-center'>
            <li
              className={`page-item ${
                actualPage === 1 ? 'disabled' : 'page-item'
              }`}
            >
              <span className='page-link' onClick={() => changePage(1)}>
                {CONSTANTS.BACKOFFICE_GO_TO_FIRST_PAGE}
              </span>
            </li>
            <li
              className={`page-item ${
                actualPage === 1 ? 'disabled' : 'page-item'
              }`}
            >
              <span
                className='page-link'
                onClick={() => changePage(actualPage - 1)}
              >
                {CONSTANTS.BACKOFFICE_PREVIOUS}
              </span>
            </li>
            {pages.map(
              (_, i) =>
                this.showPages(i + 1) && (
                  <li
                    className={`page-item ${
                      actualPage === i + 1 ? 'page-item active' : 'page-item'
                    }`}
                  >
                    <span
                      className='page-link'
                      onClick={() => changePage(i + 1)}
                    >
                      {i + 1}
                    </span>
                  </li>
                )
            )}
            <li
              className={`page-item ${
                actualPage === qtyPages ? 'disabled' : 'page-item'
              }`}
            >
              <span
                className='page-link'
                onClick={() => changePage(actualPage + 1)}
              >
                {CONSTANTS.BACKOFFICE_NEXT}
              </span>
            </li>
            <li
              className={`page-item ${
                actualPage === qtyPages ? 'disabled' : 'page-item'
              }`}
            >
              <span className='page-link' onClick={() => changePage(qtyPages)}>
                {CONSTANTS.BACKOFFICE_GO_TO_LAST_PAGE}
              </span>
            </li>
          </ul>
        </nav>
      </div>
    );
  }
}

export default Paginator;
