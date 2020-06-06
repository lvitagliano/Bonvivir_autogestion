<template>
  <div class="col-12 m-1">
    <form name="le_form" method="GET" enctype="multipart/form-data">
      <h3>Transferencia bancaria</h3>

      <ul style="color:black">
        <li>Hacer el ACH a la cuenta: IvoTalents</li>
        <li>Nombre de la cuenta : Cuenta bancaria Acm Four Company</li>
        <li>Nombre del Banco: Credicorpbank</li>
        <li>Tipo de cuenta : Cuenta Corriente</li>
        <li>Nro : # 4010314895</li>
      </ul>

      <br />
      <h4 style="float:left">Adjuntar comprobante de recibo</h4>
      <br />
      <div class="col-12 m-1">
      <input type="file" @change="uploadImage($event)" style="float:right; font-size:12px" id="file-input" name="file-input" />
       <br /></div>
      <br />
      <hr class="new4" />
      <h4 align="center">
        Los pagos realizados vía ACH tienen un período de comprobación de 12 horas.
        <br />Una vez comprobado usted podrá acceder a su solicitud.
      </h4>

      <div class="align-content-center text-center pt-2">
        <a href="#" class="btn btn-simple" @click="volverAtras()">
          <router-link class="m-1 text-white" to="/planes">Volver</router-link>
        </a>
        <button
          :disabled="!showBtnConfirm"
          class="btn btn-success btn-simple"
          @click="agregar()"
        >Finalizar Pago</button>
      </div>
      <br />
      <br />
      <br />
      <br />
      <br />
      <modalPago v-if="showModalPago" @close="showModalPago = false"></modalPago>
    </form>
  </div>
</template>

<script>
import { mapGetters, mapMutations, mapState } from "vuex";

export default {
  http: {
    headers: {
      "X-CSRF-Token": $("meta[name=_token]").attr("content")
    }
  },
  data() {
    return {
      continuarMode: false,
      imagen: "",
      datos: "",
      file: [],
      configuracion: "",
      corte: 0,
      showBtnConfirm: false
    };
  },
  mounted() {
    this.showTransferencia = true;
    this.currentUrl = this.$route.params.pathMatch;
    var configurableURL = "";
    if (this.currentUrl == "") {
      configurableURL = "/pagosPlanes";
    } else {
      this.ids = this.currentUrl.substring(2);
      configurableURL = "/pagosPlanes/" + this.ids;
    }
    axios.get(configurableURL).then(res => {
      this.talent = res.data.CastingsSeleccionados;
      this.montoUnidad = res.data.planes.MontoUnidad;
      this.descuento = res.data.planes.Descuento;
      if (this.montoUnidad > 1) {
        this.price =
          this.talent * this.montoUnidad -
          (this.talent * this.montoUnidad * this.descuento) / 100;
        this.final = this.price;
      } else {
        this.price = this.talent * this.montoUnidad; 
      }
    });
  },
  computed: {
    ...mapState([
      "showModal",
      "talentos",
      "invita2",
      "precioFinal",
      "showModalPago",
      "imagenTransferencia"
    ]),
    ver() {
      return this.continuarMode;
    },
    imagenTranfer() {
      return this.imagen;
    }
  },
  methods: {
    ...mapMutations([
      "muestraModal",
      "ocultaModal",
      "cerraTalentos",
      "cerrarInvitados",
      "cerrarPrecio",
      "muestraModalPago",
      "ocultaModalPago",
      "processFile",
      "cargrImagen"
    ]),

    uploadImage(event) {
      if(event.target.files[0]){
      this.showBtnConfirm = true
      }else{
        this.showBtnConfirm = false
      }
      let data = new FormData();
      data.append("name", event.target.files[0].name);
      data.append("file", event.target.files[0]);
      data.append("talentos", this.talent);
      data.append("proyecto", this.ids);
      data.append("invitados", 0);
      data.append("monto", this.price);
      this.datos = data;
    },

    agregar() {
      axios
        .post("/pagosPlanes", this.datos)
        .then(response => {
          
        })
        .catch(error => {
          console.log(error.response);
        });
        this.$router.push('/unproyecto/'+this.ids);
        window.location.reload();
    },

    volverAtras(){
      window.location.href = "/unproyecto/"+this.ids
    },
  }
};
</script>