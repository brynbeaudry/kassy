@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
<link href="{{ asset('css/camera.css') }}" rel="stylesheet">
<style media="screen">

#about.container {
  margin-left: 1em;
  margin-right: 1em;
}

#lean_overlay {
  position: fixed;
  z-index:100;
  top: 0px;
  left: 0px;
  height:100%;
  width:100%;
  background: #000;
  display: none;
}

/*This is how you can actually get the image*/
.cameraSlide.cameracurrent {
  width: 100%;
  height: 200px;
}

</style>
@endsection
@section('scripts')
<script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
<script type='text/javascript'  src="{{ asset('js/jquery.mobile.customized.min.js')}}"></script>
<script type='text/javascript'  src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
<script type='text/javascript' src="{{ asset('js/camera.min.js')}}"></script>
<script type='text/javascript' src="{{ asset('js/jquery.leanModal.min.js')}}"></script>
</script>
<script>
$(function(){
  var height = $("#about > div > div:nth-child(1) > div > div").height()
  $('#camera_wrap').camera({
    loader: 'none',
    pagination: false,
    thumbnails: false,
    hover: false,
    opacityOnGrid: false,
    imagePath: '../images/',
    height: '' + height + 'px',
    barPosition: 'top',
    time : 2000,


  });
  /*jQuery('#camera_wrap_2').camera({
  height: '400px',
  loader: 'bar',
  pagination: false,
  thumbnails: true
});*/
});
</script>
@endsection
@section('content')
<div class="container" id="about">
  <div class="row">
    <div class="col-md-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <!--<img class="img-responsive" src="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg" alt=""> -->
          <article class="">
            <h1>Kassandra Klassen</h1>
            <p>Kassandra Klassen is a Vancouver based visual artist. Her work intersects drawing and painting to capture the geography of her experience. She uses her work as a way to map the landscapes of consciousness and thought. Influenced by the lush and dramatic scenery of her home province of British Columbia, Klassen's work ebbs and flows, reaching up into mountainous peaks and soft valleys which combine with the sensory aspect of her work. She lets the rawness of her materials show through, bringing the reality of the work, paint, pastel, ink, all on the flatness of her canvas, to the forefront.The artist's gestural marks announce her presence and the personal nature of these works that go between being exploring the geography of the mind and of the land.</p>
            <p>For frequent updates and previews of new work:  <a href="http://instagram.com/kassandra.klassen.art/">@kassandra.klassen.art</a></p>
            <table class="table table-responsive">
              <tr>
                <td>Annual Event</td>
                <td><a href="http://deltastudiostomp.com/">Delta Studio Art Stomp</a></td>
              </tr>
              <tr>
                <td>2016</td>
                <td>Solo exhibit at Doan's Craft Brewing Company, Vancouver</td>
              </tr>
              <tr>
                <td>2016</td>
                <td>Student Show at Devise Design, Vancouver</td>
              </tr>
              <tr>
                <td>2015</td>
                <td>The Show at Emily Carr University, Grad Show</td>
              </tr>
              <tr>
                <td>2014</td>
                <td>Student Art Sale at Emily Carr</td>
              </tr>
            </table>
          </article>
        </div>
      </div>
    </div>
    <div class="col-md-6 col-xs-12">
      <div class="panel panel-default">
        <div class="panel-body">
          <!--<img class="img-responsive" src="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg" alt=""> -->
          <div class="camera_wrap camera-emboss" id="camera_wrap">
            <div data-thumb="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg" data-src="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg"></div>
            <div data-thumb="https://img0.etsystatic.com/191/0/10139773/il_570xN.1273425620_iyrp.jpg" data-src="https://img0.etsystatic.com/191/0/10139773/il_570xN.1273425620_iyrp.jpg"></div>
            <div data-thumb="https://img1.etsystatic.com/203/0/10139773/il_570xN.1320644685_g1gr.jpg" data-src="https://img1.etsystatic.com/203/0/10139773/il_570xN.1320644685_g1gr.jpg"></div>
            <div data-thumb="https://img1.etsystatic.com/182/0/10139773/il_570xN.1320664323_1fav.jpg" data-src="https://img1.etsystatic.com/182/0/10139773/il_570xN.1320664323_1fav.jpg"></div>
          </div>
        </div>
      </div>
    </div>
    <!--Modal -->
    <a href="#img-modal" id="show-modal" rel="leanModal" name="img-modal"></a>
    <div id="img-modal" width="100%">

    </div>
  </div>
</div>

@endsection
