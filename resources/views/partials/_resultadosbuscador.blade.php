<style>

.showme {
  display: none;
}

.showhim:hover .showme {
  display: block;
}

.card{
  margin-top: 0px;
  margin-bottom: 0px;
  

}
</style>
<?php 

$i = 0;

?>

@foreach($candidatos as $candidato)


<?php 

$avatario ="";

       $avatario = 'https://ivotalent.s3-accelerate.amazonaws.com/files/thumbs/profile/'.$candidato->id.'/540px_foto_'.$candidato->id.'.png';

?>

 <?php 
            $year = date("Y");

            $dia=date("d");
            $mes=date("m");
            $ano=date("Y");
            $dianaz=$candidato->dia;
            $mesnaz=$candidato->mes;
            $anonaz=$candidato->anio;
            if (($mesnaz == $mes) && ($dianaz > $dia)) {
            $ano=($ano-1); }
            if ($mesnaz > $mes) {
            $ano=($ano-1);}
            $edades=($ano-$anonaz);
          ?>



<?php if($i == 0){ ?>

<div class="col-lg-6 col-md-12">
  <div class="card card-product card-plain">
  <div class="card-header card-header-image showhim" style="position: relative;">
       <a href="#" data-toggle="modal" data-target="#elegirmodal"  data-perfil-id="{{$candidato->id}}">
        <img height="auto" src="{{$avatario}}" alt="">
        </a>
          <div class="colored-shadow" style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1; height:auto"></div><div class="colored-shadow"
          style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1;"></div></div>
      <div class="card-footer">
    
    </div>
  </div>
</div>

<?php } ?>

<?php if($i == 1){ ?>
  <div class="col-lg-6 col-md-12">
    <div class="row">
<?php } ?>

<?php if(($i == 1)||($i == 2)||($i == 3)||($i == 4)){ ?>
<div class="col-6">
  <div class="card card-product card-plain">
  <div class="card-header card-header-image showhim" style="position: relative;">

          <a href="#" data-toggle="modal" data-target="#elegirmodal"  data-perfil-id="{{$candidato->id}}">
        <img height="auto" src="{{$avatario}}" alt="">
        </a>
          <div class="colored-shadow" style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1; height:auto"></div><div class="colored-shadow"
     style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1;"></div></div>


    <div class="card-footer">
    
    </div>
  </div>
</div>
<?php } ?>

<?php if(($i == 4)){ ?>
    </div>
 </div>
<?php } ?>

<?php if(($i == 5)||($i == 6)||($i == 7)||($i == 8)){ ?>

  <div class="col-lg-3 col-md-6">
  <div class="card card-product card-plain">
    <div class="card-header card-header-image showhim" style="position: relative;">

          <a href="#" data-toggle="modal" data-target="#elegirmodal"  data-perfil-id="{{$candidato->id}}">
        <img height="auto" src="{{$avatario}}" alt="">
        </a>
          <div class="colored-shadow" style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1; height:auto"></div><div class="colored-shadow"
     style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1;"></div></div>

    <div class="card-footer">
    
    </div>
  </div>
</div>

<?php } ?>




<?php if(($i == 9)){ ?>
  <div class="col-lg-6 col-md-12">
    <div class="row">
<?php } ?>

<?php if(($i == 9)||($i == 10)||($i == 11)||($i == 12)){ ?>
<div class="col-6">
  <div class="card card-product card-plain">
  <div class="card-header card-header-image showhim" style="position: relative;">
 
          <a href="#" data-toggle="modal" data-target="#elegirmodal"  data-perfil-id="{{$candidato->id}}">
        <img height="auto" src="{{$avatario}}" alt="">
        </a>
          <div class="colored-shadow" style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1; height:auto"></div><div class="colored-shadow"
     style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1;"></div></div>

    <div class="card-footer">
    
    </div>
  </div>
</div>
<?php } ?>

<?php if(($i == 12)){ ?>
    </div>
 </div>
<?php } ?>


<?php if($i == 13){ ?>

<div class="col-lg-6 col-md-12">
  <div class="card card-product card-plain">
  <div class="card-header card-header-image showhim" style="position: relative;">
 
          <a href="#" data-toggle="modal" data-target="#elegirmodal"  data-perfil-id="{{$candidato->id}}">
        <img height="auto" src="{{$avatario}}" alt="">
        </a>
          <div class="colored-shadow" style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1; height:auto"></div><div class="colored-shadow"
     style="background-image: url(https://industria.ivotalents.com/img/loader.gif); opacity: 1;"></div></div>

    <div class="card-footer">
    
    </div>
  </div>
</div>

<?php } ?>


  <?php $i++;  ?>    
  
<?php if($i == 14){
  
  $i = 0;

} ?>

@endforeach



<div class="col-12" id="remove-row">
    <input type="hidden" id="offset" name="offset" value="0"/>
    <a id="btn-more" style="cursor: pointer">Cargar mas Talentos  </a>
</div>


