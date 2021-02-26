import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { MESSAGES } from '../../config/messages';

import { SelectionInformation } from '..';

class SelectionMobile extends Component {
  static propTypes = {
    options: PropTypes.arrayOf(
      PropTypes.shape({
        title: PropTypes.string.isRequired,
        subtitle: PropTypes.string.isRequired,
        tableTitle: PropTypes.string.isRequired,
        selectionDetails: PropTypes.arrayOf(
          PropTypes.shape({
            item: PropTypes.string.isRequired,
            commonPrice: PropTypes.number.isRequired,
            clubLaNacionPrice: PropTypes.number.isRequired
          })
        ).isRequired,
        imagePathMobile: PropTypes.string.isRequired
      })
    ).isRequired,
    selectionSelected: PropTypes.number.isRequired,
    selectionDetailSelected: PropTypes.number.isRequired,
    onClickSelection: PropTypes.func.isRequired,
    onClickRadio: PropTypes.func.isRequired
  };

  render() {
    const {
      options,
      selectionSelected,
      selectionDetailSelected,
      onClickSelection,
      onClickRadio
    } = this.props;

    return (
      <div className='col helpers__text-center selection__mobile__container'>
        <div className='row'>
          <h4 className='col-md-12 selection__h4-mobile'>
            {MESSAGES.TITLE_REGISTRATION}
          </h4>
        </div>
        <div className='row'>
          {options.map((o, i) => (
            <div
              id={`${i}`}
              key={i}
              className='col selection__img-phone'
              onClick={onClickSelection}
              onKeyDown={onClickSelection}
              role='button'
              tabIndex='0'
            >
              <img
                className='img-fluid'
                src={o.imagePathMobile}
                alt='selection item'
              />
              {selectionSelected === i && (
                <div className='selection__top-arrow' />
              )}
            </div>
          ))}
        </div>
        <SelectionInformation
          title={options[selectionSelected].title}
          subtitle={options[selectionSelected].subtitle}
          selectionDetails={options[selectionSelected].selectionDetails}
          tableTitle={options[selectionSelected].tableTitle}
          selectionDetailSelected={selectionDetailSelected}
          onClickRadio={onClickRadio}
        />
      </div>
    );
  }
}

export default SelectionMobile;
