import React, { Component } from 'react';
import PropTypes from 'prop-types';
import { Formik } from 'formik';

import getByteArrayFromInputFile from '../../utils/getByteArrayFromInputFile';

import Form from './form';
import { defaultSchema, defaultValues, keys } from './schema';

import { Loading } from '..';

class BONewItem extends Component {
  static propTypes = {
    onSubmit: PropTypes.func.isRequired,
    loading: PropTypes.bool.isRequired,
    newItemError: PropTypes.string.isRequired,
    itemValues: PropTypes.object,
    isEdit: PropTypes.bool
  };

  static defaultProps = {
    itemValues: defaultValues,
    isEdit: false
  };

  handleOnSubmit = async formData => {
    const { onSubmit } = this.props;
    // New fields to prevent error on form reload

    if (formData.desktopImage) {
      formData.desktopImageFile = await getByteArrayFromInputFile(
        `[name='${keys.desktopImage}']`
      );
    }

    if (formData.mobileImage) {
      formData.mobileImageFile = await getByteArrayFromInputFile(
        `[name='${keys.mobileImage}']`
      );
    }

    delete formData.isEdit;

    onSubmit(formData);
  };

  renderForm = () => props => {
    const { newItemError } = this.props;

    return <Form newItemError={newItemError} {...props} />;
  };

  render() {
    const { isEdit, loading, itemValues } = this.props;

    return (
      <>
        <Formik
          initialValues={{ ...itemValues, isEdit }}
          validationSchema={defaultSchema}
          onSubmit={this.handleOnSubmit}
          render={this.renderForm()}
        />
        <Loading
          className='loading-validation'
          show={loading}
          withLogo={false}
        />
      </>
    );
  }
}

export default BONewItem;
