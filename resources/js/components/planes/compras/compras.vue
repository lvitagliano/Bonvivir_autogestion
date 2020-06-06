<template>
  <div class="pl-5 justify-content-md-center col-md-12" style="text-align: -webkit-center;">
    <div v-if="showPagos" class="col-md-10" style="width:100%; text-align: start;">
      <h2>Planes Activos</h2>
      <div class="row">
        <div v-if="showPagos" class="col-md-5">
  <h3>Asistencia de casting</h3>
      <ul v-for="(item, index) in planAsist" :key="index">
        <li>
          <b>Modo de pago:</b>
          {{item.tipo_pago}}
        </li>
         <li>
          <b>Id proyecto:</b>
          {{item.id_proyecto}}
        </li>
        <li>
          <b>Cantidad de talentos requeridos:</b>
          {{item.talentos}}
        </li>
        <li>
          <b>Cantidad de invitados:</b>
          {{item.invitados}}
        </li>
        <li>
          <b>Monto:</b>
          ${{item.monto}}
        </li>
        <hr>
   </ul>
   
</div>
<div  class="col-md-5">
  <h3>Planes configurados</h3>
      <ul>
        <li>
          <b>Modo de pago:</b>
          {{this.pagosConf.tipo_pago}}
        </li>
         <li>
          <b>Id proyecto:</b>
          {{this.pagosConf.id_proyecto}}
        </li>
        <li>
          <b>Cantidad de talentos requeridos:</b>
          {{this.pagosConf.talentos}}
        </li>
        <li>
          <b>Cantidad de invitados:</b>
          {{this.pagosConf.invitados}}
        </li>
        <li>
          <b>Monto:</b>
          ${{this.pagosConf.monto}}
        </li>
        <hr> 
   </ul>
   <div class="col-md-12">
      <a href="/planes" class="btn btn-success btn-lg mt-5" style="color:white; float: right;">
        <i class="mr-1 fa fa-check-circle"></i> Mejora tu plan
      </a>
</div>
</div>


      </div>

<br><br><br>

    </div>

    <div v-if="!showPagos" class="col-md-8" style="width:100%; text-align: start;">
      <h2>No Posees Planes Activos!</h2>

      <a href="/planes" class="btn btn-success btn-lg mt-5" style="color:white; float: right;">
        <i class="mr-1 fa fa-check-circle"></i> Configura tu plan
      </a>
    </div>
  </div>
</template>
<script>
export default {
  data() {
    return {
      planAsist: [],
      pagosConf: [],
      showPagos: true,
      fecha: "",
      tipo_pago: "",
      talentos: 0,
      invitados: 0,
      monto: 0, 
      pepe: 0
    };
  },
  created() {
    axios.get("/listarPagosPlanes").then(res => {
    this.planAsist = res.data.planAsist;


if(res.data.planConf){
this.pagosConf.tipo_pago = " - ";
      this.pagosConf.id_proyecto = " - ";
      this.pagosConf.talentos = " - "; 
      this.pagosConf.invitados = " - ";
}else{
  this.pagosConf.tipo_pago = " - ";
      this.pagosConf.id_proyecto = " - ";
      this.pagosConf.talentos = " - "; 
      this.pagosConf.invitados = " - ";
}


    if (res.data.planAsist.length < 1 && res.data.planConf == null) {
          this.showPagos = false;       
      } else {
        this.showPagos = true;
      }
      
    });
  }
};
</script>