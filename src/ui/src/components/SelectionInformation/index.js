import React, { Component } from 'react';
import PropTypes from 'prop-types';
import uuidv1 from 'uuid/v1';


import logoNacion from '../../resources/images/la-nacion.png';
import formattedNumbers from '../../utils/formattedNumbers';

class SelectionInformation extends Component {
  static propTypes = {
    title: PropTypes.string.isRequired,
    subtitle: PropTypes.string.isRequired,
    selectionDetails: PropTypes.arrayOf(
      PropTypes.shape({
        item: PropTypes.string.isRequired,
        commonPrice: PropTypes.number.isRequired,
        clubLaNacionPrice: PropTypes.number.isRequired
      })
    ).isRequired,
    tableTitle: PropTypes.string.isRequired,
    selectionDetailSelected: PropTypes.number.isRequired,
    onClickRadio: PropTypes.func.isRequired
  };

  onClickRadioButton = (e, disabled) => {
    const { onClickRadio } = this.props;

    onClickRadio(e, disabled);
  };

  render() {
    const {
      title,
      subtitle,
      selectionDetails,
      tableTitle,
      selectionDetailSelected
    } = this.props;

    return (
      <div className='row'>
        <div className='col selection__card '>
          <div className='row'>
            <div className='col'>
              <h4 className='item-bold'>{title}</h4>
            </div>
          </div>
          <div className='row'>
            <div className='col'>
              <p className='subtitle-bold'>{subtitle}</p>
            </div>
          </div>
          <div className='row'>
            <table className='selection__table'>
              <thead>
                <tr>
                  <th />
                  <th />
                  <th>
                    <p className='common-price-grey'>{tableTitle}</p>
                  </th>
                  <th>
                    <img src={logoNacion} alt='logo' />
                  </th>
                </tr>
              </thead>
              <tbody>
                {selectionDetails.map((td, i) => {
                  const uname= uuidv1();

                  return (
                  <tr key={i} 
                    onClick={() => {document.getElementsByName(`radio_${uname}`)[0] && document.getElementsByName(`radio_${uname}`)[0].click()}}              
                    className='selection__table__border-b'
                  >
                    <td>
                      <div className='selection__radio-button-placeholder'>
                        <input
                          id={`${i}`}
                          name={`radio_${uname}`}
                          type='radio'
                          value={i}
                          className='helpers__inline-b selection__radio-input'
                          checked={selectionDetailSelected === i}
                          onChange={e =>
                            this.onClickRadioButton(e, td.disabled)
                          }
                        />
                      </div>
                    </td>
                    <td>
                      <p className='item-bold bottles'>{td.item}</p>
                    </td>
                    <td>
                      <p className='subtitle-bold common-price-grey'>{`$${formattedNumbers(
                        td.commonPrice
                      )}`}</p>
                    </td>
                    <td>
                      <p className='item-bold'>
                        {`$${formattedNumbers(td.clubLaNacionPrice)}`}
                      </p>
                    </td>
                  </tr>
                )}
                )}
              </tbody>
            </table>
          </div>
        </div>
      </div>
    );
  }
}

export default SelectionInformation;
