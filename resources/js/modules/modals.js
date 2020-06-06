export default {
    namespaced: true,
    state:{
        showModal: false,
        showModalPago: false,
        showModalAsist: false,
    },
    mutations:{
        muestraModal(state){
           state.showModal = true
        },

        muestraModalAsist(state){
           state.showModalAsist = true
        },
        ocultarModalAsist(state){
           state.showModalAsist = false
        },
        ocultaModal(state){
           state.showModal = false
        },
        muestraModalPago(state, tranfer){
           state.showModalPago = true
           state.imagenTransferencia = tranfer
           console.log(tranfer);
        },
        ocultaModalPago(state){
           state.showModalPago = false
        }
}


}