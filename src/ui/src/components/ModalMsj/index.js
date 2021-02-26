import React, { Component } from 'react';
import PropTypes from 'prop-types';

import { options } from '../RegistrationStepThree/options';

class ModalMsj extends Component {
  static propTypes = {
    title: PropTypes.string.isRequired,
    subtitle: PropTypes.string.isRequired,
    description: PropTypes.string.isRequired,
    data: PropTypes.object.isRequired
  };

  render() {
    const { title, subtitle, description, data } = this.props;
    const cityOptions = options.find(
      o => o.value === data.stepThree.formData.state
    );

    return (
      <section className='ModalMsj' style={{ margin: "2em 0", padding: "0" }}>
        <div>
          <h1 className='ModalMsj__h1' > {`${title} ${data.stepOne.formData.name}!`}</h1>
          <h2 className='ModalMsj__h2'>{subtitle}</h2>
          <hr className='ModalMsj__hr' />
          <p className='ModalMsj__p'>{description}</p>
          <p className='ModalMsj__p'>
            <br/>
            Por favor revisa tu casilla de correo 
            <br/> y ante cualquier consulta llamanos al 
            <br/>
            <span style={{ color: "#cf1b1b"}}>(11) 5555-6937</span>
          </p>
        </div>
        <br />

        {/* <div style={{ padding: '20px' }}>
          <h2 className='ModalMsj__h2'>Datos Personales</h2>
          <div>
            <p className='ModalMsj__p'>Nombre completo:</p>
            <p>
              {`${data.stepOne.formData.name 
                } ${ 
                data.stepOne.formData.lastName}`}
            </p>
          </div>
          <div>
            <p className='ModalMsj__p'>Sexo:</p>
            <p>{data.stepOne.formData.gender}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Número telefónico:</p>
            <p>{`${data.stepOne.formData.cod  } ${  data.stepOne.formData.tel}`}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Email:</p>
            <p>{data.stepOne.formData.email}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Tipo de documento:</p>
            <p>{data.stepTwo.formData.dni === '' ? 'CUIT' : 'DNI'}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Número de documento:</p>
            <p>
              {data.stepTwo.formData.dni === ''
                ? data.stepTwo.formData.cuit
                : data.stepTwo.formData.dni}
            </p>
          </div>
          <div>
            <p className='ModalMsj__p'>Fecha de nacimiento:</p>
            <p>
              {`${data.stepOne.formData.date.day 
                }/${ 
                data.stepOne.formData.date.month 
                }/${ 
                data.stepOne.formData.date.year}`}
            </p>
          </div>
          <h2 className='ModalMsj__h2'>Datos de envío</h2>

          <div>
            <p className='ModalMsj__p'>Calle:</p>
            <p>{data.stepThree.formData.street}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Altura:</p>
            <p>{data.stepThree.formData.streetNumber}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Código postal:</p>
            <p>{data.stepThree.formData.zipCode}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Piso:</p>
            <p>{data.stepThree.formData.floorApartment}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Depto:</p>
            <p>{data.stepThree.formData.apartment}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Barrio:</p>
            <p>{data.stepThree.formData.neighborhood}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Partido:</p>
            <p>{data.stepThree.formData.zone}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Provincia:</p>
            <p>{cityOptions.description}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>País:</p>
            <p>{data.stepThree.formData.country}</p>
          </div>
          <div
            style={
              data.stepThree.formData.additionalData == ''
                ? { display: 'none' }
                : {}
            }
          >
            <p className='ModalMsj__p'>Datos adicionales:</p>
            <p>{data.stepThree.formData.additionalData}</p>
          </div>
          <h2 className='ModalMsj__h2'>Datos de pago</h2>

          <div>
            <p className='ModalMsj__p'>Titular de tarjeta:</p>
            <p>{data.stepFour.formData.cardOwner}</p>
          </div>
          <div>
            <p className='ModalMsj__p'>Número de tarjeta de crédito:</p>
            <p>
              {`XXXX-XXXX-XXXX-${  data.stepFour.formData.cardNumber.substr(12)}`}
            </p>
          </div>
          <div>
            <p className='ModalMsj__p'>Club la nacion:</p>
            <p>
              {data.stepTwo.formData.hasClubLaNacion
                ? data.stepTwo.formData.cardOwner
                : 'No'}
            </p>
          </div>
          <div
            style={
              data.stepTwo.formData.hasClubLaNacion ? {} : { display: 'none' }
            }
          >
            <p className='ModalMsj__p'>Número de la tarjeta Club la nacion:</p>
            <p>{data.stepTwo.formData.cardNumber}</p>
          </div> */}
        {/* </div> */}
      </section>
    );
  }
}

export default ModalMsj;
