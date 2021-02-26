import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { CONSTANTS } from '../../config/constants';

import { SelectionInformation } from '..';

class Selection extends Component {
  static defaultProps = {
    onClick: CONSTANTS.VOID_FUNC,
    onClickRadio: CONSTANTS.VOID_FUNC
  };

  static propTypes = {
    id: PropTypes.string.isRequired,
    item: PropTypes.shape({
      title: PropTypes.string.isRequired,
      subtitle: PropTypes.string.isRequired,
      tableTitle: PropTypes.string.isRequired,
      selectionDetails: PropTypes.arrayOf(
        PropTypes.shape({
          item: PropTypes.string.isRequired,
          commonPrice: PropTypes.string.isRequired,
          clubLaNacionPrice: PropTypes.string.isRequired
        })
      ).isRequired,
      imagePath: PropTypes.string.isRequired
    }).isRequired,
    selected: PropTypes.bool.isRequired,
    selectedDetail: PropTypes.number.isRequired,
    onClick: PropTypes.func,
    onClickRadio: PropTypes.func
  };

  render() {
    const {
      id,
      item: { title, subtitle, tableTitle, selectionDetails, imagePath },
      selected,
      selectedDetail,
      onClick,
      onClickRadio
    } = this.props;

    return (
      <div
        id={id}
        className='col helpers__text-center selection__desktop__container '
        onClick={onClick}
        onKeyDown={onClick}
        role='button'
        tabIndex='0'
      >
        <div className='row'>
          <div className='col'>
            <img
              src={imagePath}
              alt='product'
              className={
                selected
                  ? 'selection__image selection__image__selected'
                  : 'selection__image'
              }
            />
          </div>
        </div>
        <div className='row'>
          <div
            className={
              selected
                ? ' selection__top-arrow selection__top-arrow__show'
                : 'selection__top-arrow selection__top-arrow__hide'
            }
          />
          <div
            className={
              selected
                ? 'col-md-12 selection__card selection__card__select'
                : 'col-md-12 selection__card '
            }
          >
            <SelectionInformation
              title={title}
              subtitle={subtitle}
              selectionDetails={selectionDetails}
              tableTitle={tableTitle}
              selectionDetailSelected={selectedDetail}
              onClickRadio={onClickRadio}
            />
          </div>
        </div>
      </div>
    );
  }
}

export default Selection;
