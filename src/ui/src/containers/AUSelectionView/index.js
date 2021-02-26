import React, { Component } from 'react';
import uuidv1 from 'uuid/v1';

import { AUSelection, AUNavBar, Button } from '../../components';

const selections = [
  {
    title: 'Selección Exclusiva',
    selectionDetails: [
      { item: '1 Botella', commonPrice: '125', clubLaNacionPrice: '120' },
      { item: '2 Botella', commonPrice: '135', clubLaNacionPrice: '130' }
    ]
  },
  {
    title: 'Selección Exclusiva Blanca',
    selectionDetails: [
      { item: '1 Botella', commonPrice: '125', clubLaNacionPrice: '120' },
      { item: '2 Botella', commonPrice: '135', clubLaNacionPrice: '130' }
    ]
  },
  {
    title: 'Selección Alta Gama',
    selectionDetails: [
      { item: '1 Botella', commonPrice: '125', clubLaNacionPrice: '120' },
      { item: '2 Botella', commonPrice: '135', clubLaNacionPrice: '130' }
    ]
  }
];

const title = 'Mis Suscripciones';

class AUSelectionView extends Component {
  render() {
    return (
      <div>
        <AUNavBar />
        <h4
          className='au-selection___title'
          style={{
            color: '#707070',
            fontSize: '20px',
            fontFamily: 'Roboto-Bold',
            textAlign: 'center',
            marginTop: '4%',
            marginBottom: '5%'
          }}
        >
          {title}
        </h4>
        <div className='container container-fluid'>
          <div className='row'>
            {selections.map(s => (
              <div key={uuidv1()} className='col-xs-12 col-md-4'>
                <AUSelection
                  title={s.title}
                  selectionDetails={s.selectionDetails}
                />
              </div>
            ))}
          </div>
          <div className='row'>
            <Button
              description='+ Sumar una nueva selección'
              divClassName='col-md-12 helpers__text-center'
              buttonClassName='au-selection__add-button'
              onClick={() => {}}
            />
          </div>
        </div>
      </div>
    );
  }
}

export default AUSelectionView;
