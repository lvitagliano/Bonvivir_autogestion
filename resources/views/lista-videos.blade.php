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
    
    .absolute {
      position: fixed;
      float: right;
}
    </style>


<div class="page-header" data-parallax="true" style="background-image: url('../assets/img/city-profile-two.jpg'); height: 240px;">

</div>
<div class="main main-raised bkg-ind">
  <div class="profile-content">
    <div class="container">

      <div class="row" style="margin-top: 0px ml-auto mr-auto">   

		  
		 
        
        @foreach($videos as $video)
          <div class="col-4 col-offset-2" style="text-align: center;">
            <div class="card card-pricing" style="margin-top:5px">
              <div class="card-body">
                <video poster="/path/to/poster.jpg" id="player" width="320" height="240"  playsinline controls>
                  <source src="https://ivotalent.s3-accelerate.amazonaws.com/{{$video}}" type="video/mp4" />
                  <source src="https://ivotalent.s3-accelerate.amazonaws.com/{{$video}}" type="video/mov" />
              </video>
              <br>
                <a href="https://ivotalent.s3-accelerate.amazonaws.com/{{$video}}"> {{substr(substr($video,27),0,-4)}}</a><br>
              </div>
            </div>
         
   
          </div>
         @endforeach
    </div>
  </div>
</div>



@endsection