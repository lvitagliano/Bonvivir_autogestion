import React, { Component } from 'react';
import { connect } from 'react-redux';
import PropTypes from 'prop-types';
import { createStructuredSelector } from 'reselect';

import {
  BOErrorList,
  BOHeader,
  Loading,
  Button,
  Input,
  Paginator
} from '../../components';
import backofficeActions from '../../actions/backoffice';
import { makeGetBackoffice } from '../../selectors/backoffice';
import { MESSAGES } from '../../config/messages';
import { CONSTANTS } from '../../config/constants';
import BackTables from '../../components/BackOfficeTables/backOfficeTable';

class BOErrorListView extends Component {
  static propTypes = {
    backoffice: PropTypes.object.isRequired,
    getSubscriptionsWithError: PropTypes.func.isRequired,
    setErrorNumberSearch: PropTypes.func.isRequired,
    setPageSubscriptionWithError: PropTypes.func.isRequired,
    getTotalSubscriptionsWithError: PropTypes.func.isRequired
  };

  componentDidMount = () => this.getSubscriptionsWithError();

  componentDidUpdate = prevProps => {
    const {
      backoffice: { pageSubscriptionWithError }
    } = this.props;

    if (
      prevProps.backoffice.pageSubscriptionWithError !==
      pageSubscriptionWithError
    ) {
      this.getSubscriptionsWithError();
    }
  };

  getSubscriptionsWithError = () => {
    const {
      getSubscriptionsWithError,
      getTotalSubscriptionsWithError,
      backoffice: { errorNumberSearch, qtyPerPage, pageSubscriptionWithError }
    } = this.props;

    getSubscriptionsWithError(
      errorNumberSearch,
      qtyPerPage,
      pageSubscriptionWithError
    );
    getTotalSubscriptionsWithError(errorNumberSearch, 1000000, 1);
  };

  onPaginatorChange = page => {
    const { setPageSubscriptionWithError } = this.props;

    setPageSubscriptionWithError(page);
  };

  handleOnClickSearch = () => {
    const {
      backoffice: { pageSubscriptionWithError }
    } = this.props;

    this.onPaginatorChange(CONSTANTS.BACKOFFICE_INITIAL_PAGE);

    if (pageSubscriptionWithError === CONSTANTS.BACKOFFICE_INITIAL_PAGE) {
      this.getSubscriptionsWithError();
    }
  };

  handleOnChange = event => {
    const { setErrorNumberSearch } = this.props;

    setErrorNumberSearch(event.target.value);
  };

  handleDownload = (filename, text) => {
    const element = document.createElement('a');

    element.setAttribute(
      'href',
      `data:text/plain;charset=utf-8,${encodeURIComponent(text)}`
    );
    element.setAttribute('download', filename);

    element.style.display = 'none';
    document.body.appendChild(element);

    element.click();

    document.body.removeChild(element);
  };

  convertToCSV = objArray => {
    const array =
      typeof objArray !== 'object' ? JSON.parse(objArray) : objArray;
    let str = '';

    for (let i = 0; i < array.length; i++) {
      let line = '';

      for (const index in array[i]) {
        if (line !== '') {
          line += ';';
        }

        line += array[i][index];
      }

      str += `${line}\r\n`;
    }

    return str;
  };

  exportCSVFile = (fileName, items) => {
    const headers = {
      id: 'Id',
      name: 'Nombre',
      promotion: 'Promocion',
      schema: 'Esquema',
      paymentmethodid: 'Metodo de pago',
      externalid: 'Id Externa',
      creditcard: 'Tarjeta de Credito',
      clublanacioncard: 'Tarjeta CLN',
      createdat: 'Creado el',
      updatedat: 'Modificado el',
      errorcode: 'Cod. de error',
      errormessage: 'Mensaje de error',
      bonvivirid: 'Id de Bonvivir',
      customerfirstname: 'Nombre del Cliente',
      customerlastname: 'Apellido del Cliente',
      customertype: 'Tipo Doc',
      customeridnumber: 'Num Doc',
      customerbirthDate: 'Fecha de nacimiento',
      customeremail: 'Email',
      customergender: 'Genero',
      customertaxtype: 'Tipo de Comprobante',
      customerareacode: 'Cod. Area',
      customerphone: 'Telefono',
      street: 'Calle',
      doornumber: 'Altura',
      apartment: 'Dpto.',
      floor: 'Piso',
      district: 'Distrito',
      state: 'Provincia',
      zipcode: 'Codigo Postal',
      country: 'Pais'
    };

    if (headers) {
      items.unshift(headers);
    }

    const jsonObject = JSON.stringify(items);

    const csv = this.convertToCSV(jsonObject);

    const exportName = `${fileName}.csv` || 'export.csv';

    const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });

    if (navigator.msSaveBlob) {
      navigator.msSaveBlob(blob, exportName);
    } else {
      const link = document.createElement('a');

      if (link.download !== undefined) {
        const url = URL.createObjectURL(blob);

        link.setAttribute('href', url);
        link.setAttribute('download', exportName);
        link.style.visibility = 'hidden';
        document.body.appendChild(link);
        link.click();
        document.body.removeChild(link);
      }
    }
  };

  generateArray = dat => {
    const subscriptionsToExport = [];

    dat.map(c => {
      subscriptionsToExport.push({
        id: c.id,
        name: c.name,
        promotion: c.promotion,
        schema: c.schema,
        paymentmethodid: c.paymentMethod,
        externalid: c.externalId,
        creditcard: c.creditCard,
        clublanacioncard: c.cln,
        createdat: c.createdAt,
        updatedat: c.updatedAt,
        errorcode: c.errorCode,
        errormessage: c.errorMessage,
        bonvivirid: c.customer.bonvivirId,
        customerfirstname: c.customer.firstName,
        customerlastname: c.customer.lastName,
        customertype: c.customer.idType,
        customeridnumber: c.customer.idNumber,
        customerbirthDate: c.customer.birthDate,
        customeremail: c.customer.email,
        customergender: c.customer.gender,
        customertaxtype: c.customer.taxType,
        customerareacode: c.customer.areaCode,
        customerphone: c.customer.phoneNumber,
        street: c.address.street,
        doornumber: c.address.doorNumber,
        apartment: c.address.apartment,
        floor: c.address.floor,
        district: c.address.district,
        state: c.address.state,
        zipcode: c.address.zipCode,
        country: 'Argentina'
      });
    });

    return subscriptionsToExport;
  };

  getDate = () => {
    const today = new Date();
    const dd = String(today.getDate()).padStart(2, '0');
    const mm = String(today.getMonth() + 1).padStart(2, '0');
    const yyyy = today.getFullYear();

    return String(`${mm}/${dd}/${yyyy}`);
  };

  handleOnClickExport = () => {
    const { backoffice: totalSubscriptionsWithError } = this.props;

    this.exportCSVFile(
      this.getDate(),
      this.generateArray(
        totalSubscriptionsWithError.totalSubscriptionsWithError
      )
    );
  };

  renderContent = () => {
    const {
      backoffice: {
        subscriptionsWithError,
        errorNumberSearch,
        subscriptionsWithErrorTotalQuantity,
        qtyPerPage,
        pageSubscriptionWithError
      }
    } = this.props;

    const rows = subscriptionsWithError.map(swe => {
      const { customer, address, ...props } = swe;

      const { id: idCustomer, ...propsCustomer } = customer;
      const { id: idAddress, ...propsAddress } = address;

      return {
        content: {
          ...props,
          idCustomer,
          ...propsCustomer,
          idAddress,
          ...propsAddress
        },
        buttons: []
      };
    });

    const EXPORT = 'Exportar a CSV';

    return (
      <div className='fixed'>
        <BOHeader
          className='row'
          title={MESSAGES.BACKOFFICE_HEADER_TITLE.ERROR_LIST}
        />

        <section className='row '>
          <div
            className='col-md-12 d-flex flex-row-reverse'
            style={{ paddingRight: '20px' }}
          >
            <div>
              <Button
                onClick={this.handleOnClickExport}
                description={EXPORT}
                divClassName='registration__container-button'
                buttonClassName='buttons-backoffice'
              />
            </div>
          </div>
        </section>
        <section className='col-md-12'>
          <div className='container-fluid'>
            <div className='row'>
              <div className='col-md-12 p-2'>
                <BackTables
                  title={MESSAGES.BACKOFFICE_ERROR_LIST_TITTLE}
                  columns={MESSAGES.BACKOFFICE_ERROR_LIST_TABLE_TH}
                  rows={rows}
                  isStriped
                />
              </div>
            </div>
          </div>
        </section>
      </div>
    );
  };

  render() {
    const {
      backoffice: { loading, subscriptionsWithError }
    } = this.props;

    return loading || !subscriptionsWithError ? (
      <Loading show withLogo />
    ) : (
      this.renderContent()
    );
  }
}

const mapStateToProps = createStructuredSelector({
  backoffice: makeGetBackoffice()
});

const mapDispatchToProps = dispatch => ({
  getSubscriptionsWithError: (errorCode, quantityPerPage, page) =>
    dispatch(
      backofficeActions.getSubscriptionsWithError(
        errorCode,
        quantityPerPage,
        page
      )
    ),
  setErrorNumberSearch: value =>
    dispatch(backofficeActions.setErrorNumberSearch(value)),
  setPageSubscriptionWithError: value =>
    dispatch(backofficeActions.setPageSubscriptionWithError(value)),
  getTotalSubscriptionsWithError: (errorCode, quantityPerPage, page) =>
    dispatch(
      backofficeActions.getTotalSubscriptionsWithError(
        errorCode,
        quantityPerPage,
        page
      )
    )
});

export default connect(
  mapStateToProps,
  mapDispatchToProps
)(BOErrorListView);
