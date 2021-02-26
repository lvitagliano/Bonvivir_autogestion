import React, { Component, Fragment, useState,useEffect } from 'react';
import axios from "axios";
import StaticProfile from '../../components/profile/staticProfile';
import EditProfile from '../../components/profile/editProfile';
import { NavBar } from '../../components';
import { CONSTANTS } from '../../config/constants';

const Profile = () => {

  const [editState, setEditState] = useState(false)
  const [state, setState] = useState({ isLoading: false, data: [], adress: [] })
  const usuario = JSON.parse(localStorage.getItem("contact"));
  const { GET_CONTACT_LOCAL } = CONSTANTS;
  
function hadleChangeEdit(editable) {
  setEditState(editable)
}

useEffect(() => {
  componentDidMount();
}, []);

  function componentDidMount() {
    setState({ isLoading: true });
    axios.get(GET_CONTACT_LOCAL + usuario.idNumber)
    .then(result => setState({
      data: result.data,
      isLoading: false
    }))
      .catch(error => setState({
        error,
        isLoading: false
      }));
  }
 
    if (state.error) {
      return <p>{state.error.message}</p>;
    }
 
    if (state.isLoading) {
      return <p>Cargando ...</p>;
    }

    return (
      <Fragment>
      <NavBar textTitle='' />
      <section className='container-fluid'>
        <div className='row'>
          <div className='col-md-12'>
            <div className='container'>
            { !editState ?  <StaticProfile handleChange={hadleChangeEdit} cliente = {state.data} /> :   <EditProfile handleChange={hadleChangeEdit} cliente = {state.data}/> }
        </div>
          </div>
        </div>
      </section>
    </Fragment>
    );
  }
 
export default Profile;

