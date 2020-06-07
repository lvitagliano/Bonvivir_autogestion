@extends('layouts.principal')

@section('content')
<style type="text/css">

#selectPlan {
  display: none;
}
#tipoPagos div {
  display: none;
}

.pepe {
  display: flex;
  align-items: center;
  justify-content: center;
}
.circularBtn {
  border: 1px solid rgb(200, 198, 198);  
  margin: 5px;
  padding: 5px;
}
.colorHead {
  color: white;
  font-weight: 500;
}

.card-pricing ul {
    list-style: none;
    padding: 0;
    max-width: 90%;
}
.p {
  color: rgb(141, 137, 137);
  font-weight: 500;
}
.cardT {
  margin-bottom: 3.5rem;
  margin-top: 3.5rem;
  font-weight: 700;
}
.imgPrice {
  background: url('../assets/img/footer-wave.png');
  background-repeat: no-repeat;
  background-size: 120% 100%;
}
li:active {
    color: #FA6417;
    text-decoration: none;
}
hr.new3 {
  border: 1px solid white;
}
hr.new4 {
  border: 1px solid ;
}
hr.new4 {
  border: 1px solid rgb(194, 194, 194);
}

  </style>

<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">
    <div class="col-7 ml-auto text-left align-items-end c-name"><h3 style="color: white" class="c-mini-name">
    <b>{{$usuario->industria->razon_social ? strtoupper($usuario->industria->razon_social) : "Nombre de la Empresa" }}</b>&nbsp;
          <a href="#" data-toggle="modal" data-target="#NombreEmpresa"><i class="material-icons" style="font-size:14px; cursor: pointer;color:white">border_color</i></a></h3>
             <p style="margin-top: -15px;margin-bottom: 0px; font-size: 13px; color:white" class="c-mini-subname">
             {{$usuario->industria->slogan ? strtoupper($usuario->industria->slogan) : "Slogan de la Empresa.." }}</p></div>
</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto mini-screen">
          <div class="profile text-left" style="height: 80px;">
            <div class="avatar">
              @if ($usuario->avatar)
              <a href="#modal-imgperfil" data-toggle="modal">
                <img alt="Circle Image" style="max-height: 160px;" class="img-raised rounded-circle img-fluid" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$usuario->id.'/540px_foto_'.$usuario->id.'.png'}}">
              </a>
               @else
               <a href="#modal-imgperfil" data-toggle="modal">
               <img alt="Circle Image" style="max-height: 160px;"  class="img-raised rounded-circle img-fluid" src="{{ asset('img/vatar2.png') }}">
              </a>
              @endif
        </div>
            <div class="menu-navegador">
              <ul class="">
                      <li class="list-horizontal">
                              <a class="btn-nav" href="{{ route('buscar') }}">
                                <i class="material-icons">search</i> Buscar
                              </a>
                            </li>
                      <li class="list-horizontal">
                        <a class="btn-nav" href="{{ route('misproyectos') }}">
                          <i class="material-icons">grade</i> Mis Proyectos
                        </a>
                      </li>
                      <li class="list-horizontal">
                              <a class="btn-nav" href="#">
                                <i class="material-icons">forum</i> Chat
                              </a>
                            </li>
                    </ul>
        </div>
          </div>
        </div>

        <div class="line-black">
                    <h5 class="in-line-black">Pagos</h5>
        </div>
      </div>
  
      
<div class="content" style="margin-top: -40px">
  <div>
    <div  style="text-align: -webkit-center;">
      <form id="pagoForm" method="post" enctype="multipart/form-data" action="{{route('guardarPago')}}">
        {{csrf_field()}}
                <div class="col-md-4">
                    <div style="text-align: -webkit-center;">
                            <div >
            
                              <div id="Pedido" >
                              <h1>Tu pedido {{ $idProj }}</h1>
                               <div class="circularBtn col-12 align-content-center">
                                <div>
                                  <div>
                                    <div style="float: left;">
                                    <h3>Sub total</h3>
                                    <h3>Items</h3>
                                    <h3>Total</h3>
                                  </div>
                                    <div style="float: right;">
                                      <h3>$ {{$planes[0]->monto}}</h3>
                                      <h3>$ 0</h3>
                                      <h3>$ {{$planes[0]->monto}}</h3>
                                    </div>
                                  </div>
                                </div>
                                <br /><br /><br /><br />
                                <hr class="new5">
                                <br />
                                <br /><br />
                                <hr class="new4">
                                <br />
                                <select class="selectpicker"  data-live-search="true"  id="tipo_pago" name="tipo_pago" data-style="select-with-transition form-control; color:#A1A1A1;width:80%" 
                                  title="TIPO DE PAGO" data-size="5">
                                       <option disabled> TIPO DE PAGO</option>
                                       <option value="Transferencia">Transferencia Bancaria</option>
                                       <option value="Otros" disabled>Otros Pagos</option>
                                   </select>
                        </div>

                  
                                <br />
                                <button onclick="functionHidde()" class="btn btn-primary btn-round mb-3" role="tab" data-toggle="tab">
                                  Continuar pedido
                                </button>
                                <br /><br /><br /><br /><br />
                              </div>

                              <div id="Transferencia" style="display:none" >
                                <h2>Transferencia bancaria</h2>
                                <ul style="color:black">
                                  <li>Hacer el ACH a la cuenta: IvoTalents</li>
                                  <li>Nombre de la cuenta : Cuenta bancaria Acm Four Company   </li>
                                  <li>Nombre del Banco: Credicorpbank </li>
                                  <li>Tipo de cuenta : Cuenta Corriente </li>
                                  <li>Nro : # 4010314895 </li>
                                </ul>
                    
                                <br />
                                <h4 style="float:left">Adjuntar comprobante de recibo</h4>
                                <div class="col-md-5 col-sm-8">
                                  <div class="fileinput fileinput-new text-center" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail img-raised">
                                      <img src='../assets/img/image_placeholder.jpg' alt="...">
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail img-raised"></div>
                                    <div>
                                      <span class="btn btn-raised btn-round btn-default btn-file">
                                        <span class="fileinput-new">Seleccionar imagen</span>
                                        <span class="fileinput-exists">Cambiar</span>
                                        <input type="file" name="..." id="imagebanco" name="imagebanco"/>
                                      </span>
                                      <a href="#"  name="imagebanco" class="btn btn-danger btn-round fileinput-exists" data-dismiss="fileinput"><i class="fa fa-times"></i> Remover</a>
                                    </div>
                                  </div>
                                </div>
                                <input type="text" name="project" id="project" value={{$idProj}} hidden>
                                <br />
                                <button  type="submit" class="btn btn-primary btn-round mb-3" id="pedido" name="pedido" >
                                  Realizar pago
                                </button>
                                <br />

                                <hr class="new4">
                    
                                <h4 align="center">
                                    Los pagos realizados vía ACH tienen un período de comprobación de 12 horas. <br />
                                    Una vez comprobado usted podrá acceder a su solicitud.
                                    </h4><br /><br /><br /><br /><br />
                         </div>

                          </div>
                        
                    </div>
                
                </div>

      </form>
      </div>
  </div>
</div>

    </div>
  </div>
</div>
<div class="flotante">
    <div class="flotante-line">
        <h5 class="flotante-in-line">Perfil</h5>
    </div> 
    <div style="margin-top: 30px;margin-bottom: 50px;">
    <ul class="ul-foot">
        <li class="list-horizontal">
                <a class="btn-nav-foot" href="{{ route('buscar') }}">
                  <i class="material-icons">search</i>
                </a>
              </li>
        <li class="list-horizontal">
          <a class="btn-nav-foot" href="{{ route('misproyectos') }}">
            <i class="material-icons">grade</i>
          </a>
        </li>
        <li class="list-horizontal">
                <a class="btn-nav-foot" href="#">
                  <i class="material-icons">forum</i>
                </a>
              </li>
      </ul>  
    </div> 
</div> 
@endsection

@section('scripts')


<script type="text/javascript">

function functionHidde() {
  var x = document.getElementById("Transferencia");
  var y = document.getElementById("Pedido");
  if (x.style.display === "none") {
    x.style.display = "block";
    y.style.display = "none";
  } else {
    x.style.display = "none";
    y.style.display = "block";
  }



}


</script>




@endsection