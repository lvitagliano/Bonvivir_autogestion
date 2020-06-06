
require('./bootstrap');

import Vue from 'vue'
import Vuex from 'vuex'
import VueRouter from 'vue-router'

window.Vue = require('vue');
Vue.use(VueRouter);
Vue.use(Vuex);

// Vue.component('pagination', require('laravel-vue-pagination'));
Vue.component('indicaciones', require('./components/planes/indicaciones.vue').default);
Vue.component('cotizador', require('./components/planes/cotizador.vue').default);
Vue.component('modal', require('./components/planes/modalConfirm.vue').default);
Vue.component('transferencia', require('./components/planes/pagos/transferencia.vue').default);
Vue.component('otros', require('./components/planes/pagos/otros.vue').default);

Vue.component('modalPago', require('./components/planes/pagos/modalConfirmPago.vue').default);
import Routes from '@/js/routes.js';

const store = new Vuex.Store({
    state:{
        showModal: false,
        showModalPago: false,
        talentos: 100,
        invita2: 1,
        precioFinal: 1,
        imagenTransferencia:""
     },
     mutations:{
         muestraModal(state){
            state.showModal = true
         },
         ocultaModal(state){
            state.showModal = false
         },
         muestraModalPago(state, tranfer){
            state.showModalPago = true
            state.imagenTransferencia = tranfer
         },
         ocultaModalPago(state){
            state.showModalPago = false
         },
         cerraTalentos(state, cierre){
            state.talentos = cierre
         },
         cerrarInvitados(state, cierre){
            state.invita2 = cierre
         },
         cerrarPrecio(state, cierre){
            state.precioFinal = cierre
         }
    
     }
});

const app = new Vue({
    router: Routes,
    store,
    el: '#app',
});

export default app;
