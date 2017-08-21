@extends('layouts.app')
@section('styles')
  <link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
  <link href="{{ asset('css/camera.css') }}" rel="stylesheet">
  <style media="screen">
    .slide-thumbnails{
        width: 10em;
        height: 10em;
    }
  /*This is how you can actually get the image*/
    .cameraSlide.cameracurrent {
        width: 200px;
        height: 200px;
    }

    #img-modal {
      /*position: absolute !important;*/
    }

    #welcome.container {
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

  </style>
@endsection
@section('scripts')
<script type='text/javascript' src="{{ asset('js/jquery.min.js') }}"></script>
  <script type='text/javascript'  src="{{ asset('js/jquery.mobile.customized.min.js')}}"></script>
  <script type='text/javascript'  src="{{ asset('js/jquery.easing.1.3.js')}}"></script>
  <script type='text/javascript' src="{{ asset('js/camera.min.js')}}"></script>
  <script type='text/javascript' src="{{ asset('js/jquery.leanModal.min.js')}}"></script>

  <script>
  $(function(){

    $('#camera_wrap').camera({
        loader: 'none',
				pagination: false,
				thumbnails: true,
				hover: false,
				opacityOnGrid: false,
				imagePath: '../images/',
        height: '100%',
        barPosition: 'top',
        time : 10000,


    });
/*jQuery('#camera_wrap_2').camera({
  height: '400px',
  loader: 'bar',
  pagination: false,
  thumbnails: true
});*/
  });
</script>
<script type="text/javascript">
  $("a[rel*=leanModal]").leanModal({top: 50});
</script>
<script type="text/javascript">
$(window).on("load", function() {
  $('.pix_thumb img').each(function(index, el) {
      $(el).addClass('slide-thumbnails');
  });
  console.log($('#camera_wrap div.camera_thumbs_cont > div > ul'));
  $('#camera_wrap div.camera_thumbs_cont > div > ul').attr('style', 'margin-left: 0px');
});
$('#img-thumbnails img').on('click', function(event) {
  event.preventDefault();
  var that = this;
  /* Act on the event */
  var img_src = $(that).attr('src')
  $("#img-modal").empty();
  $("#img-modal").append($('<img>')
    .attr("src", img_src)
    .addClass("img-responsive")
  );
  $("#show-modal").click();
});
</script>
@endsection
@section('content')
<div class="container" id="welcome">
    <div class="row">
        <div class="col-md-6 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!--<img class="img-responsive" src="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg" alt=""> -->
                    <div class="camera_wrap camera-emboss" id="camera_wrap">
                      <div data-thumb="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg" data-src="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg"><div class="camera_caption fadeFromBottom">This fun little panel is a study from 2016. It measures 10x10" on an 1 1/2" thick wooden pane.</div></div>
                      <div data-thumb="https://img0.etsystatic.com/191/0/10139773/il_570xN.1273425620_iyrp.jpg" data-src="https://img0.etsystatic.com/191/0/10139773/il_570xN.1273425620_iyrp.jpg"><div class="camera_caption fadeFromBottom">This painting measures 8x10" and is on an 1 1/2" deep wood panel. This piece was done as a part of a series of small studies over the summer of 2017. It features artist quality watercolours, acrylic, conte and pastels. It has been set with Krylon UV archival varnish with a semi-glass finish.</div></div>
                      <div data-thumb="https://img1.etsystatic.com/203/0/10139773/il_570xN.1320644685_g1gr.jpg" data-src="https://img1.etsystatic.com/203/0/10139773/il_570xN.1320644685_g1gr.jpg"><div class="camera_caption fadeFromBottom">This fun little This painting measures 20x20" on a 1 1/2" thick sturdy wood panel. This piece features artist quality acrylics, soft and oil pastels. oil stick and gouache. It has been set with Krylon UV archival varnish with a semi-glass finish.</div></div>
                      <div data-thumb="https://img1.etsystatic.com/182/0/10139773/il_570xN.1320664323_1fav.jpg" data-src="https://img1.etsystatic.com/182/0/10139773/il_570xN.1320664323_1fav.jpg"><div class="camera_caption fadeFromBottom">This painting measure 10x10" on a 1 1/2" thick sturdy wood panel. It features a mix of artist quality acrylics, soft and oil pastel, oil stick and watercolours. The pastel on this piece have been applied heavily which give this piece a really beautiful roughness. It has been set with Krylon UV archival varnish with a semi-glass finish.</div></div>
                    </div>
                </div>
            </div>
        </div>
        <!--Another panel -->
        <div class="col-md-6 col-xs-12">
            <div class="panel panel-default">
                <div id="img-thumbnails" class="panel-body text-center">
                    <p>Thumbnails - Click to enlarge </p>
                    <img class="img-thumbnail img-responsive" width="40%" height="40%" src="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg" alt=""><br>
                    <img class="img-thumbnail img-responsive" width="40%" height="40%" src="https://img0.etsystatic.com/191/0/10139773/il_570xN.1273425620_iyrp.jpg" alt=""><br>
                    <img class="img-thumbnail img-responsive" width="40%" height="40%" src="https://img1.etsystatic.com/203/0/10139773/il_570xN.1320644685_g1gr.jpg" alt=""><br>
                    <img class="img-thumbnail img-responsive" width="40%" height="40%" src="https://img1.etsystatic.com/182/0/10139773/il_570xN.1320664323_1fav.jpg" alt=""><br>
                </div>
            </div>
        </div>
        <a href="#img-modal" id="show-modal" rel="leanModal" name="img-modal"></a>
        <div id="img-modal" width="100%">

        </div>
    </div>
</div>

@endsection
