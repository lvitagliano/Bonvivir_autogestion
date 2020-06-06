<div class="modal fade" id="modal-imgperfil">
    <div class="modal-dialog">
        <div class="modal-content">

            
            <div class="modal-body">
                    <form id="FotoperfilForm" method="post" action="{{ route('subirfotoperfil') }}" enctype="multipart/form-data">
                   {{csrf_field()}}
                <div class="row">
                <div class="vanilla-rotate btn btn-primary btn-icon btn-circle btn-md" style="display: none; width: 49%;float: left;margin-bottom: 5px" id="r-90" data-deg="-90">
                <i class="material-icons">redo</i></div>

                <div class="vanilla-rotate btn btn-primary btn-icon btn-circle btn-md" style="display: none; width: 50%;float: left;margin-bottom: 5px"  id="r90" data-deg="90">
                <i class="material-icons">undo</i></div>
              </div>

			          <div class="">
                        <p style="color:red"><b>*Las fotos almacenadas en la nube debes descargarlas previamente.</b></p>
                </div>

                  <div class="form_row">
                    <div class="preview"></div>
                     <div class="progress" style="display:none">
                      <div class="progress-bar" role="progressbar" aria-valuenow="0"
                      aria-valuemin="0" aria-valuemax="100" style="width:0%;">
                        0%
                      </div>
                    </div>

                  <img src="{{asset('img/perfil.png')}}" width="90%" id="ima1"  style="margin-top: 10px;margin-left:15px; cursor: pointer;">
                  <div id="upload-demo" style="background-image:url('')"> </div>



                </div>
                <div class="form_row">
                <br>
                        <input type="file" required name="imageperfil" accept="image/x-png,image/gif,image/jpeg,image/jpg,image/JPG,image/PNG"  id="imageperfil" >

                </div>
   
            </div>
             </form>
             <div class="modal-footer">
                <input type="button"  class="btn btn-danger" name="btnimgperfilCanc" id="btnimgperfilCanc" value="CERRAR" />
                 <input type="submit"  class="btn btn-success" style="background-color: #31B404; border-color: #31B404" name="upload-image" id="upload-image"   value="ACEPTAR" />
            </div>




        </div>
    </div>
</div>

