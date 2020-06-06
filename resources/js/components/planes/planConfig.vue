<template>
  <div class="p-5 justify-content-md-center m-1">
    
    <div class="ml-2 mr-2 mt-n4" style="text-align: center;"> <h2> <b>Plan configurable</b> 
     <a v-if="currentUrl"
            id="show-modal"
           @click="volverAtras()"
            class="btn btn-secondary btn-md mt-n4" style="float-right"
          >
            <i class="mr-1 fa fa-arrow-circle-left"></i> Volver
          </a> 
    </h2> 
    <p style="font-size:18px;">
      Debes elegir la cantidad de talentos requeridos para tu proyecto. Verás el cálculo de su precio.
    </p>
    </div>
    <h2 v-if="showPago" style="color:red">Existe un plan activo!</h2>
    <div class="row justify-content-md-center">
      <div class="mr-2 mt-2 mb-2 align-items-center sombras">
        <button
          :disabled="compareSuma"
          class="btn mt-2 mb-0"
          @click="tweenedNumber++; number++"
          @keyup.enter="sumar"
          style="border-radius: 90px 90px 0 0;padding: 0.001rem 2.35rem; background-color: #62b4c5; border-color: #62b4c5;"
        >
          <p style="font-size:35px;">+</p>
        </button>

        <div class="col align-self-center mt-2">
          <p style=" font-size:18px;">N° de Talentos</p>
          <div v-if="!compareResta">
            <p class="text-center ml-2" style="font-size:25px">
              <b>{{ numeroPre }}</b>
            </p>
          </div>
          <div v-else>
            <p class="text-center ml-2" style="font-size:25px">
              <b>-</b>
            </p>
          </div>
          <div
            style="background-color: rgb(192, 192, 224); margin-right: -8px; margin-left: -8px;"
          >
            <p class="text-center ml-2 pt-2 pb-2" style="font-size:25px">
              <b>{{ animatedNumber }}</b>
            </p>
          </div>
          <div v-if="!compareSuma">
            <p class="text-center ml-2" style="font-size:25px">
              <b>{{ numeroPost }}</b>
            </p>
          </div>
          <div v-else>
            <p class="text-center ml-2" style="font-size:25px">
              <b>-</b>
            </p>
          </div>
        </div>
        <button
          class="btn align-self-end mt-3"
          :disabled="compareResta"
          @click="tweenedNumber--; number--"
          @keyup.enter="restar"
          style="border-radius: 0 0 90px 90px; padding: 0.001rem 2.35rem;
        background-color: #62b4c5;
             border-color: #62b4c5;"
        >
          <p style=" font-size:35px;">-</p>
        </button>
      </div>
      <!-- <div class="mr-1 mt-2 mb-2  ml-1 align-items-center sombras">
        <p class="align-self-center"></p>
        <br />
        <br />
        <br />
        <div class="col align-self-center mt-3">
          <p class="align-self-center" style="font-size:16px">N° Invitados</p>
          <div v-if="!compareResta">
            <p class="text-center ml-2" style="font-size:25px">
              <b>{{ invitadosPre }}</b>
            </p>
          </div>
          <div v-else>
            <p class="text-center ml-2" style="font-size:25px">
              <b>-</b>
            </p>
          </div>
          <div
            style="background-color: rgb(192, 192, 224); margin-right: -15px; margin-left: -14px;"
          >
            <p class="text-center ml-2 pt-2 pb-2" style="font-size:25px">
              <b>{{ invitados }}</b>
            </p>
          </div>
          <div v-if="!compareSuma">
            <p class="text-center ml-2" style="font-size:25px">
              <b>{{ invitadosPost }}</b>
            </p>
          </div>
          <div v-else>
            <p class="text-center ml-2" style="font-size:25px">
              <b>-</b>
            </p>
          </div>
        </div>
        <br />
      </div> -->
      <div class="ml-2 mt-2 mb-2  align-items-center sombras">
        <p class="align-self-center"></p>
        <br />
        <br />
        <br />
        <div class="col align-self-center mt-3">
          <p style="font-size:20px">Monto $</p>
          <div v-if="!compareResta">
            <p class="text-center ml-2" style="font-size:25px">
              <b>$ {{ descuentoPre }}</b>
            </p>
          </div>
          <div v-else>
            <p class="text-center ml-2" style="font-size:25px">
              <b>$ -</b>
            </p>
          </div>
          <div
            style="background-color: rgb(192, 192, 224); margin-right: -8px; margin-left: -8px;"
          >
            <p class="text-center ml-2 pt-2 pb-2" style="font-size:25px">
              <b>$ {{ descuento }}</b>
            </p>
          </div>
          <div v-if="!compareSuma">
            <p class="text-center ml-2" style="font-size:25px">
              <b>$ {{ descuentoPost }}</b>
            </p>
          </div>
          <div v-else>
            <p class="text-center ml-2" style="font-size:25px">
              <b>$ -</b>
            </p>
          </div>
        </div>
        <br />
      </div>
      <div class="align-items-center ml-5">
        <div class="align-items-end mt-5" v-if="tipoEntrada == 'P'">
          <button
            :disabled="number != lacomparacion"
            id="show-modal"
            @click="muestraModal(); cerraTalentos(animatedNumber); cerrarInvitados(invitados); cerrarPrecio(descuento)"
            class="btn btn-success btn-md mt-5"
          >
            <i class="mr-1 fa fa-check-circle"></i> Pagar
          </button>
        </div> 
      </div>
    </div>
    <br />

    <indicaciones />
    <hr style="border-top:1px solid" />
    <div class="row justify-content-md-center m-4">
      <p style="font-size:18px;">
        <i class="fa fa-check-circle"></i> Si deseas asistente de casting, luego de la selección contáctanos por el icono de whatsapp.
      </p>
 <br />
      <br />
      <br />
      <br />
    </div>
    <modal v-if="showModal" @close="showModal = false"></modal>
  </div>
</template>
<style>
.sombras {
  width: 120px;
  height: 330px;
  background-color: rgb(245, 245, 247);
  border-radius: 90px / 100px;
  text-align: center;
  -webkit-box-shadow: 9px 9px 14px -9px rgba(0, 0, 0, 0.75);
  -moz-box-shadow: 9px 9px 14px -9px rgba(0, 0, 0, 0.75);
  box-shadow: 9px 9px 14px -9px rgba(0, 0, 0, 0.75);
}
</style>
<script>
import { mapGetters, mapMutations, mapState } from "vuex";
export default {
  data() {
    return {
      showPago: false,
      showBtnPago: true,
      number: 1,
      numeroAnt: 1,
      numeroDesp: 1,
      invitadoAnt: 1,
      invitadoDesp: 1,
      tweenedNumber: 1,
      precio: 0,
      usuario: [],
      rolUser: [],
      planes: [],
      pagos: [],
      showBtnSuma: true,
      showBtnResta: true,
      alerta: "",
      invitado: 0,
      descontado: 0,
      descontadoAnt: 0,
      descontadoDesp: 0,
      tipoEntrada: '',
      ids:0,
      currentUrl:'',
      lacomparacion: '',
    };
  },
  beforeMount(){
      this.currentUrl = '';
  },
  mounted(){
this.currentUrl = this.$route.params.pathMatch;
var planesURL = '';
var configurableURL = '';
     if(this.currentUrl == ""){
       configurableURL = "/planConfigurableIndustria";
       planesURL = "/pagosPlanes";
     }else{
       this.ids = this.currentUrl.substring(2);
       configurableURL = "/planConfigurableIndustria/"+this.ids;
       planesURL = "/pagosPlanes/"+this.ids;
       this.tipoEntrada = this.currentUrl.substring(1, 2);
     }

    axios.get(configurableURL).then(res => {
      this.planes = res.data.planes;
      this.rolUser = res.data.rolUser;
      this.usuario = res.data.usuario;
      if(res.data.CastingsSeleccionados){
        this.number = res.data.CastingsSeleccionados;
        this.lacomparacion = res.data.CastingsSeleccionados;
      }
    });
    axios.get(planesURL).then(res => {
      this.pagos = res.data;
      if (this.pagos.plan != null) {
        if (this.pagos.plan.talentos > 0) {
          this.showPago = true;
          this.showBtnPago = false;
          this.number = this.pagos.plan.talentos;
          this.invitado = this.pagos.plan.invitados;
        }
      }
    });
  },
  created() {

    },
  computed: {
    ...mapState(["showModal", "talentos", "invita2", "precioFinal"]),

    animatedNumber() {
      return this.tweenedNumber.toFixed(0);
    },
    numeroPre() {
      this.numeroAnt = this.number - 1;
      return this.numeroAnt;
    },
    numeroPost() {
      this.numeroDesp = this.number + 1;
      return this.numeroDesp;
    },
    descuento() {
      if (this.number > 1) {
        this.descontado =
          this.number * this.planes.MontoUnidad -
          (this.number * this.planes.MontoUnidad * this.planes.Descuento) / 100;
      } else {
        this.descontado = this.number * this.planes.MontoUnidad;
      }
      return this.descontado.toFixed(0);
    },
    descuentoPre() {
      if (this.numeroAnt > 1) {
        this.descontadoAnt =
          this.numeroAnt * this.planes.MontoUnidad -
          (this.numeroAnt * this.planes.MontoUnidad * this.planes.Descuento) /
            100;
      } else {
        this.descontadoAnt = this.numeroAnt * this.planes.MontoUnidad;
      }
      return this.descontadoAnt.toFixed(0);
    },
    descuentoPost() {
      if (this.numeroDesp > 1) {
        this.descontadoDesp =
          this.numeroDesp * this.planes.MontoUnidad -
          (this.numeroDesp * this.planes.MontoUnidad * this.planes.Descuento) /
            100;
      } else {
        this.descontadoDesp = this.numeroDesp * this.planes.MontoUnidad;
      }
      return this.descontadoDesp.toFixed(0);
    },
    invitados() {
      var varUno;
      var varDos;

      if (this.number == this.planes.Corte1) {
        this.invitado = this.number * this.planes.Proporcion1;
      } else if (
        this.number > this.planes.Corte1 &&
        this.number < this.planes.Corte2
      ) {
        varUno = this.number - this.planes.Corte1;
        this.invitado =
          this.planes.Corte1 * this.planes.Proporcion1 +
          varUno * this.planes.Proporcion2;
      } else if (
        this.number >= this.planes.Corte2 &&
        this.number <= this.planes.Corte3
      ) {
        varUno = this.number - this.planes.Corte2;
        varDos = this.number - varUno - this.planes.Corte1;
        this.invitado =
          this.planes.Corte1 * this.planes.Proporcion1 +
          varDos * this.planes.Proporcion2 +
          varUno * this.planes.Proporcion3;
      }
      return this.invitado;
    },
    invitadosPre() {
      var varUno;
      var varDos;

      if (this.numeroAnt == this.planes.Corte1) {
        this.invitadoAnt = this.numeroAnt * this.planes.Proporcion1;
      } else if (
        this.numeroAnt > this.planes.Corte1 &&
        this.numeroAnt < this.planes.Corte2
      ) {
        varUno = this.numeroAnt - this.planes.Corte1;
        this.invitadoAnt =
          this.planes.Corte1 * this.planes.Proporcion1 +
          varUno * this.planes.Proporcion2;
      } else if (
        this.numeroAnt >= this.planes.Corte2 &&
        this.numeroAnt <= this.planes.Corte3
      ) {
        varUno = this.numeroAnt - this.planes.Corte2;
        varDos = this.numeroAnt - varUno - this.planes.Corte1;
        this.invitadoAnt =
          this.planes.Corte1 * this.planes.Proporcion1 +
          varDos * this.planes.Proporcion2 +
          varUno * this.planes.Proporcion3;
      }
      return this.invitadoAnt;
    },
    invitadosPost() {
      var varUno;
      var varDos;

      if (this.numeroDesp == this.planes.Corte1) {
        this.invitadoDesp = this.numeroDesp * this.planes.Proporcion1;
      } else if (
        this.numeroDesp > this.planes.Corte1 &&
        this.numeroDesp < this.planes.Corte2
      ) {
        varUno = this.numeroDesp - this.planes.Corte1;
        this.invitadoDesp =
          this.planes.Corte1 * this.planes.Proporcion1 +
          varUno * this.planes.Proporcion2;
      } else if (
        this.numeroDesp >= this.planes.Corte2 &&
        this.numeroDesp <= this.planes.Corte3
      ) {
        varUno = this.numeroDesp - this.planes.Corte2;
        varDos = this.numeroDesp - varUno - this.planes.Corte1;
        this.invitadoDesp =
          this.planes.Corte1 * this.planes.Proporcion1 +
          varDos * this.planes.Proporcion2 +
          varUno * this.planes.Proporcion3;
      }
      return this.invitadoDesp;
    },
    compareSuma() {
      if (this.planes.Corte3 > this.number) {
        this.showBtnSuma = false;
      } else {
        this.showBtnSuma = true;
      }
      return this.showBtnSuma;
    },
    compareResta() {
      if (this.showPago) {
        if (this.pagos.plan.talentos >= this.number) {
          this.showBtnResta = true;
          this.showBtnPago = false;
        } else {
          this.showBtnResta = false;
          this.showBtnPago = true;
        }
      } else {
        if (this.number <= 1) {
          this.showBtnResta = true;
        } else {
          this.showBtnResta = false;
        }
      }

      return this.showBtnResta;
    },
    talentoAdquirido() {
      this.talentos = this.tweenedNumber;
      return this.talentos;
    }
  },
  watch: {
    number(newValue) {
      TweenLite.to(this.$data, 0.9, { tweenedNumber: newValue });
    }
  },
  methods: {
    ...mapMutations([
      "muestraModal",
      "ocultaModal",
      "cerraTalentos",
      "cerrarInvitados",
      "cerrarPrecio"
    ]),
    volverAtras(){
      window.location.href = "/unproyecto/"+this.ids
    }
    
  }
};
</script>
