import React, { Component, Fragment, useState, useEffect } from 'react';
import axios from "axios";
import PropTypes from 'prop-types'
import { withRouter } from 'react-router-dom';
import queryString from 'query-string';
import EditFormSubs from './editFormSubs'

const editSubscriptions = props => {
  let params = props.match.params.subscriptionId

  return (
    <Fragment>
      <EditFormSubs params={params}/>
    </Fragment>
  )
}

export default withRouter(editSubscriptions)
