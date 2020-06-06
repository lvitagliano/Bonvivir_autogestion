<template>
  <div>
    <transition name="modal">
      <div class="modal-mask">
        <div class="modal-wrapper">
          <div class="modal-container">
            <div class="modal-header">
              <h3 slot="header" style="text-align: center;">Confirmar asistencia</h3>
            </div>
            <div class="modal-body ml-n5 mr-n5" style="width:100%; padding: 0; margin:0;">
              <h5>Confirmando asistente:</h5>
              <ul>
                <li>Seleccionas la cantidad de talentos para tu proyecto.</li>
                <li>Monto disponible por papel o rol del talento.</li>
                <li>Busca los perfiles que más te gusten.</li>
                <li>Invítalos a que formen parte de tu proyecto.</li>
              </ul>
            </div>
            <div class="modal-footer" style="margin-right: -20px;">
              <slot name="footer m-4">
                <button class="btn btn-sm btn-danger" @click="ocultarModalAsist()">
                  <i class="mr-1 fa fa-times-circle"></i> Cancelar
                </button>
                <a class="btn btn-sm btn-success" @click="ocultarModalAsist();">
                  <i class="mr-1 fa fa-check-circle"></i> Confirmar
                </a>
              </slot>
            </div>
          </div>
        </div>
      </div>
    </transition>
  </div>
</template>
<script>
import { mapGetters, mapMutations, mapState } from "vuex";
export default {
  computed: {},
  methods: {
    ...mapMutations("modals", [
      "muestraModalAsist",
      "ocultarModalAsist",
      "muestraModalAsistConfirm",
      "ocultarModalAsistConfirm"
    ])
  }
};
</script>

