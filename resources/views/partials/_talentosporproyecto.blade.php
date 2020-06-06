    <div class="col-lg-4 col-md-6 col-sm-6">
    <h6>Talentos Invitados</h6>
    @foreach($proyectos->Seleccionados as $seleccionado)
    <a href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="{{$seleccionado->Talentos->id}}">
        <div class="media" style="width:100%">
            <a class="float-left" href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="{{$seleccionado->Talentos->id}}">
            <div class="avatar">
                <img class="media-object" alt="64x64" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$seleccionado->Talentos->id.'/540px_foto_'.$seleccionado->Talentos->id.'.png'}}">
            </div>
            </a>
            <div class="media-body">
            <p style="margin-top: 20px;margin-bottom: 0px; font-size: 13px">Talento {{$seleccionado->Talentos->id}}</p>             
            <p style="margin: 0px; font-size: 13px"><b> {{$seleccionado->Talentos->Talentos->Talento1->nombre}}  </b></p>   
            <p style="margin-top: 0px;margin-bottom: 0px; font-size: 13px">Presupuesto: {{$seleccionado->presupuesto}}</p>    
            </div>
        </div>
        </a>  
    @endforeach
	  </div>

      <div class="col-lg-4 col-md-6 col-sm-6">
    <h6>Talentos que Aceptaron</h6>
    @foreach($proyectos->Aceptados  as $aceptado)
    <a href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="{{$aceptado->Talentos->id}}">
        <div class="media" style="width:100%">
            <a class="float-left" href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="{{$aceptado->Talentos->id}}">
            <div class="avatar">
            <img class="media-object" alt="64x64" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$aceptado->Talentos->id.'/540px_foto_'.$aceptado->Talentos->id.'.png'}}">
            </div>
            </a>
            <div class="media-body">
            <p style="margin-top: 20px;margin-bottom: 0px; font-size: 13px">Talento {{$aceptado->Talentos->id}}</p>             
            <p style="margin: 0px; font-size: 13px"><b> {{$aceptado->Talentos->Talentos->Talento1->nombre}} </b></p>   
            <p style="margin-top: 0px;margin-bottom: 0px; font-size: 13px">Presupuesto: {{$aceptado->presupuesto}}</p>  
            </div>
        </div>
        </a>  
    @endforeach
	  </div>

    <div class="col-lg-4 col-md-6 col-sm-6">
    <h6>Talentos que Rechazaron</h6>
    @foreach($proyectos->Rechazados as $rechazado)
    <a href="#" data-toggle="modal" data-target="#elegirmodal" data-perfil-id="{{$rechazado->Talentos->id}}">
        <div class="media" style="width:100%">
        <img class="media-object" alt="64x64" src="{{'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$rechazado->Talentos->id.'/540px_foto_'.$rechazado->Talentos->id.'.png'}}">
            <div class="avatar">
                <img class="media-object" alt="64x64" src="{{$rechazado->Talentos->avatar}}">
            </div>
            </a>
            <div class="media-body">
            <p style="margin-top: 20px;margin-bottom: 0px; font-size: 13px">Talento {{$rechazado->Talentos->id}}</p>             
            <p style="margin: 0px; font-size: 13px"><b> {{$rechazado->Talentos->Talentos->Talento1->nombre}} </b></p>   
            <p style="margin-top: 0px;margin-bottom: 0px; font-size: 13px">Presupuesto: {{$rechazado->presupuesto}}</p>  
            </div>
        </div>
        </a>  
    @endforeach
	  </div>          
