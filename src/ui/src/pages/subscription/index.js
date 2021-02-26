import React, { Component, Fragment, useState,useEffect } from 'react';
import '../../../node_modules/bootstrap/dist/css/bootstrap.min.css';
import { NavBar } from '../../components';
import Subscriptions from '../../components/subscription/subscriptions'


const Subscription = () => {
 

  return (
    <Fragment>
    <NavBar textTitle='' />
    {/* //main-container  */}
    <section className='container-fluid'>
      <div className='row'>
        <div className='col-md-12'>
          <div className='container'>
        <Subscriptions />
      </div>
          </div>
        </div>
      </section>
    </Fragment>
  );
};

export default Subscription;