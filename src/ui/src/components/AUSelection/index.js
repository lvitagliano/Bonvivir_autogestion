import React, { Component } from 'react';
import PropTypes from 'prop-types';
import uuidv1 from 'uuid/v1';

import formattedNumbers from '../../utils/formattedNumbers';
import logoNacion from '../../resources/images/la-nacion.png';

import { Button } from '..';

const precio = 'Precio';

class AUSelection extends Component {
  static propTypes = {
    title: PropTypes.string.isRequired,
    selectionDetails: PropTypes.array.isRequired
  };

  render() {
    const {
      title,
      selectionDetails
      // item: {  imagePath }, //
      // selected,
    } = this.props;

    return (
      <div className='au-selection__selection-container'>
        <div className='row helpers__text-center'>
          <div className='col'>
            <div className='row'>
              <div className='col'>
                <h4 className='item-bold'>{title}</h4>
              </div>
            </div>
            <div className='row'>
              <div className='col'>
                <img alt='logo' src='' />
              </div>
            </div>
            <div className='row mb-2'>
              <table className='selection__table'>
                <thead>
                  <tr>
                    <th />
                    <th />
                    <th>
                      <p className='common-price-grey'>{precio}</p>
                    </th>
                    <th>
                      <img src={logoNacion} alt='logo' />
                    </th>
                  </tr>
                </thead>
                <tbody>
                  {selectionDetails.map(td => (
                    <tr key={uuidv1()} className='selection__table__border-b'>
                      <td />
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
                  ))}
                </tbody>
              </table>
            </div>
            <div>
              <div className='row'>
                <Button
                  description='Editar suscripción'
                  divClassName='col-md-12 au-selection__footer-button helpers__text-center'
                  buttonClassName='button__primary au-selection__selection-button'
                  onClick={() => {}}
                />
              </div>
              <div className='row'>
                <Button
                  description='Entregas'
                  divClassName='col-md-12 au-selection__footer-button helpers__text-center'
                  buttonClassName='button__primary au-selection__selection-button'
                  onClick={() => {}}
                />
              </div>
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default AUSelection;
