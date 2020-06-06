@extends('layouts.aceptLayout')

@section('content')
<style type="text/css">
 
    .fileUpload {
        position: relative;
        overflow: hidden;
        margin: 10px;
    }
    .fileUpload input.upload {
        position: absolute;
        top: 0;
        right: 0;
        margin: 0;
        padding: 0;
        font-size: 20px;
        cursor: pointer;
        opacity: 0;
        filter: alpha(opacity=0);
    }
    .error
    {
      color: red;
    }
    
    </style>


<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">

</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="container">
      <div class="row">
        <div class="col-md-8 ml-auto mr-auto mini-screen">
          <div class="profile" style="height: 80px;">
            <div class="avatar" style="float: initial;">
              @if ($usuario->avatar)
              <a href="#modal-imgperfil" data-toggle="modal">
                <img alt="Circle Image" style="max-height: 160px;" class="img-raised rounded-circle img-fluid" src="{{$usuario->avatar}}">
              </a>
               @else
               <a href="#modal-imgperfil" data-toggle="modal">
               <img alt="Circle Image" style="max-height: 160px;"  class="img-raised rounded-circle img-fluid" src="{{ asset('img/vatar2.png') }}">
              </a>
              @endif
        </div>
          </div>
        </div>
      </div>
 

      <div class="row" style="margin-top: 0px ml-auto mr-auto">          

        <div class=" ml-auto mr-auto">
           <div class="row">
            <div class="col-12 ml-auto mr-auto">
                <h2 style="color: #1f8089;text-align: center;"><b>Gracias {{$usuario->name?$usuario->name:$usuario->nombre}}!</b></h2> 
                <h3 style="color: #1f8089;text-align: center;"><b>La empresa {{$industria->Industria->razon_social}} agradece contar contigo</b></h3> 
                <h3 style="color: #1f8089;text-align: center;"><b>mucha suerte!</b></h3> 
            </div>
                 
            </div>

        </div>
      </div>


      <div class="row">          
        <div class="col-md-4 ml-auto mr-auto">
        </div>


      </div>


    </div>
  </div>
</div>



@endsection