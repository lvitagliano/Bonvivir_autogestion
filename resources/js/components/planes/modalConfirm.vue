<template>
  <div>
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container">
            <div class="modal-header">
              <h3 slot="header">Confirmar pago</h3>
            </div>
            <div class="modal-body ml-n5 mr-n5" style="width:100%; padding: 0; margin:0;">
              <h5>Tu plan configurado es:</h5>
              <ul>
                <li>
                  Cantidad de talentos requeridos:
                  <b>{{talentos}}</b>
                </li>
                <li>
                  Cantidad de talentos que podrás invitar:
                  <b>{{invita2}}</b>
                </li>
                <li>
                  Precio final del plan:
                  <b>$ {{final}}</b>
                </li>
              </ul>
            </div>
            <div class="modal-footer" style="margin-right: -20px;">
              <slot name="footer m-4">
                <button class="btn btn-sm btn-danger" @click="ocultaModal()">
                  <i class="mr-1 fa fa-times-circle"></i> Cancelar
                </button>
                <button class="btn btn-sm btn-success" @click="ocultaModal(), enviarForm()">
                 
                  <i class="mr-1 fa fa-check-circle"></i> Confirmar
                </button>
              </slot>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>
<style>
.modal-mask {
  position: fixed;
  z-index: 9998;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: rgba(0, 0, 0, 0.5);
  display: table;
  transition: opacity 0.3s ease;
}
.modal-wrapper {
  display: table-cell;
  vertical-align: middle;
}

.modal-container {
  width: 300px;
  margin: 0px auto;
  padding: 20px 30px;
  background-color: #fff;
  border-radius: 2px;
  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);
  transition: all 0.3s ease;
  font-family: Helvetica, Arial, sans-serif;
}

.modal-header h3 {
  margin-top: 0;
  color: #4f8ba7;
}

.modal-body {
  margin: 20px 0;
}

.modal-default-button {
  float: right;
}

.modal-enter {
  opacity: 0;
}

.modal-leave-active {
  opacity: 0;
}

.modal-enter .modal-container,
.modal-leave-active .modal-container {
  -webkit-transform: scale(1.1);
  transform: scale(1.1);
}
</style>
<script>
import { mapGetters, mapMutations, mapState } from "vuex";
export default {
     data() {
    return {
        pagos: [],
        final: 0
    }
     },
        created() {
     axios.get("/pagosPlanes").then(res => {
      this.pagos = res.data.plan;
    if(res.data.plan != null){
        this.descuento = this.pagos.monto
        this.final = this.precioFinal - this.descuento
    } else {
      this.final = this.precioFinal
    }
    });
  },
  computed: {
    ...mapState(["showModal", "talentos", "invita2", "precioFinal"])
  },
  methods: {
    ...mapMutations([
      "muestraModal",
      "ocultaModal",
      "cerraTalentos",
      "cerrarInvitados",
      "cerrarPrecio"
    ]),
    enviarForm(){
      this.$router.push('/planes/pagos')   
    }
  }
};
</script>