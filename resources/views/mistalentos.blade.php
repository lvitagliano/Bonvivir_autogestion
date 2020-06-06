@extends('layouts.principal')

@section('content')


<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">
    <div class="col-7 ml-auto text-left align-items-end c-name"><h3 style="color: white" class="c-mini-name">
    <b>{{$usuario->industria->razon_social ? strtoupper($usuario->industria->razon_social) : "Nombre de la Empresa" }}</b>&nbsp;</h3>
             <p style="margin-top: -15px;margin-bottom: 0px; font-size: 13px; color:white" class="c-mini-subname">
             {{$usuario->industria->slogan ? strtoupper($usuario->industria->slogan) : "Slogan de la Empresa.." }}</p></div>
</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto">
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
                        <a class="btn-nav" href="{{ route('home') }}">
                          <i class="material-icons">account_circle</i> Perfil
                        </a>
                      </li>

                        <li class="list-horizontal">
                                <a class="btn-nav" href="{{ route('buscar') }}">
                                  <i class="material-icons">search</i> Buscar
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
            <h5 class="in-line-black">Favoritos</h5>
</div>
      </div>
      <br>

      <div class="row">          
        <div class="col-md-12 ml-auto mr-auto" style="margin-top: -100px">
                <div class="col-12"><h4 style="color: #1f8089"><b>MIS TALENTOS</b></h4></div>

                <div class="loader" id="loader"></div>

                <div class="row" id="resultados" style="visibility:hidden;">
            
                </div>

                <div style="height: 155px"></div>
        </div>

     
      </div>

    </div>
  </div>
</div>

<div class="flotante">
    <div class="flotante-line">
        <h5 class="flotante-in-line">Mis talentos</h5>
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


<!-- Register Modal -->
<div class="modal fade" id="elegirmodal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-signup">
            <div class="modal-content">
                <div class="card card-signup card-plain" style="padding:0px">
                      <div class="modal-body" style="padding:0px" id="mbody">
                        
                      </div>
                </div>
            </div>
        </div>
    </div>
    <!--  End Modal -->

@endsection


@section('scripts')

 <script>


//CARGA DE LOS RESULTADOS INICIALES DE BUSQUEDA RAPIDA.
$(document).ready(function() {

$.ajax({
      url: "{{route('listarTalentoGusto')}}",
        type:"GET",
        beforeSend: function(){
          $('#resultados').css("visibility", "hidden");
                      $('#loader').css("display", "block");
                      $('#loader').css("visibility", "visible");
          $('#loader').html('<div class="loading" style="opacity: .9;"><img src="https://loading.io/spinners/palette-ring/index.svg" alt="loading" /><br/>Un momento, por favor...</div>');
            },
            
            success:function(data) {
              
              $('#resultados').fadeIn(1000).html(data);

            },
            complete: function(){
              $('#resultados').waitForImages(function() {
                      $('#loader').css("display", "none");
                      $('#resultados').css("visibility", "visible");
                 });

              
              
            }
    });
});


 $('#elegirmodal').on('show.bs.modal', function(e) {
    var dependent = $(e.relatedTarget).data('perfil-id');
    var _token = '{{csrf_token()}}';
    $.ajax({
           url: "{{ route('elegirtalento')}}",
           method: "POST",
           data:{ _token:_token, dependent:dependent },
           success:function(result)
             {
               $('#mbody').html(result);
             }
          })
});


</script>


@endsection
