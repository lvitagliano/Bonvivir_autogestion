<template>
  <div style="width:100%">
    <div class="p-5 justify-content-md-center col-md-4" style=" position:center;">
      <h2>MÉTODOS DE PAGO</h2>
      <select class="custom-select" v-on:change="changeLink">
        <option value="01" selected>Transferencia</option>
        <option value="02">Otros</option>
      </select>
    </div>

    <div class="row m-2">
      <div class="col-md-7 m-1 mt-n3">
        <transferencia v-if="showTransferencia" />
        <otros v-if="showOtros" />
      </div>
      <div class="col-md-4">
        <div class="p-2 ml-3 mr-2">
          <div
            class="col-12 p-2 ml-2"
            style="border-radius:10%;
      box-shadow:2px 2px 2px 2px rgba(249, 249, 249, 0.14), 1px 2px 1px -2px rgba(255, 255, 255, 0.2), 0 1px 5px 0 rgba(255, 255, 255, 0.12);
      background: transparent linear-gradient(180deg, #3272D9 0%, #2BAAF0 100%) 0% 0% no-repeat padding-box;
      "
          >
            <div row class="mr-2">
              <h3 id="input_titulo" style="color: ghostwhite;">
                Plan elegido:
                <br />Configurado Manualmente
              </h3>
              <br />
              <br />
              <div style="font-size: 1.2rem;color: white;">
                <span id="montoPlan" class="pl-2 pr-2" style="float:right;">$ {{price}}.00</span>Monto del plan
              </div>
              <!-- <div v-if="showDescuento" style="font-size: 1.2rem;color: white;">
                <span id="montoPlan" class="pl-2 pr-2" style="float:right;">$ -{{descuento}}</span>Descuento
              </div>-->
              <hr class="new3" />
              <div style="font-size: 1.2rem;color: white;">
                <span id="totalPlan" class="pl-2 pr-2" style="float:right">$ {{final}}.00</span>Total
              </div>
              <br />
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters, mapMutations, mapState } from "vuex";

export default {
  data() {
    return {
      pagoslink: [
        { text: "Transferencia", value: "01" },
        { text: "Otros", value: "02" }
      ],
      showTransferencia: false,
      showOtros: false,
      showDescuento: false,
      pagos: [],
      descuento: 0,
      final: 0,
      currentUrl: "",
      ids: "",
      cantPersonas: 0,
      montoUnidad: 0,
      descuento: 0,
      talent:0,
      price:0,
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
    this.$store.state.talentos = this.talent;
    this.$store.state.precioFinal = this.price;  
    this.$store.state.invita2 = 0;
  },
  created() {},
  computed: {
    ...mapState(["showModal", "talentos", "invita2", "precioFinal"]),

  },
  methods: {
    ...mapMutations([
      "muestraModal",
      "ocultaModal",
      "cerraTalentos",
      "cerrarInvitados",
      "cerrarPrecio"
    ]),
    changeLink: function(event) {
      if (event.target.value == "01") {
        this.showTransferencia = true;
        this.showOtros = false;
      } else if (event.target.value == "02") {
        this.showTransferencia = false;
        this.showOtros = true;
      }
    }
  }
};
</script>