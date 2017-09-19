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
  /*
    .cameraSlide.cameracurrent {
        width: 200px;
        height: 200px;
    }
    */
    #img-modal {
      /*position: absolute !important;*/
    }
    /*
    #welcome.container {
      margin-left: 1em;
      margin-right: 1em;
    }
    */

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
    var thumbnail_div_height = $("#img-thumbnails").height()

    $('#camera_wrap').camera({
        loader: 'none',
				pagination: false,
				thumbnails: true,
				hover: false,
				opacityOnGrid: false,
        height: '100%',
        barPosition: 'top',
        time : 5000,
    });
    /*
    $('a.camera_link').on('click', function(event) {
      event.preventDefault();
      var that = this;
      //Act on the event
      var img_src = $(this).attr('href');
      $("#img-modal").empty();
      $("#img-modal").append($('<img>')
        .attr("src", img_src)
        .attr('height', '90%')
        .attr('width', '90%' )
        .addClass("img-responsive")
      );
      $("#show-modal").click();
    });
    */
  });
</script>
<script type="text/javascript">
  $("a[rel*=leanModal]").leanModal({top: 0});
</script>
<script type="text/javascript">
$(window).on("load", function() {
  $('.pix_thumb img').each(function(index, el) {
      $(el).addClass('slide-thumbnails');
  });
  console.log($('#camera_wrap div.camera_thumbs_cont > div > ul'));
  //$('#camera_wrap div.camera_thumbs_cont > div > ul').attr('style', 'margin-left: 0px');

});

//click an image to show it in a modal
</script>
@endsection
@section('content')
<div class="container" id="welcome">
    <div class="row">
        <div class="col-md-8 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <!--<img class="img-responsive" src="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg" alt=""> -->
                    <div class="camera_wrap camera-emboss" id="camera_wrap">
                    <!--
                      <div data-thumb="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg" data-src="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg"><div class="camera_caption fadeFromBottom">"Blues," 2016
                        &NewLine;mixed media on panel</div></div>
                      <div data-thumb="https://img0.etsystatic.com/191/0/10139773/il_570xN.1273425620_iyrp.jpg" data-src="https://img0.etsystatic.com/191/0/10139773/il_570xN.1273425620_iyrp.jpg"><div class="camera_caption fadeFromBottom">(summer study), 2017
&NewLine;mixed media on panel</div></div>
                      <div data-thumb="https://img1.etsystatic.com/203/0/10139773/il_570xN.1320644685_g1gr.jpg" data-src="https://img1.etsystatic.com/203/0/10139773/il_570xN.1320644685_g1gr.jpg"><div class="camera_caption fadeFromBottom">"From Above," 2017
&NewLine;mixed media on panel</div></div>
                      <div data-thumb="https://img1.etsystatic.com/182/0/10139773/il_570xN.1320664323_1fav.jpg" data-src="https://img1.etsystatic.com/182/0/10139773/il_570xN.1320664323_1fav.jpg"><div class="camera_caption fadeFromBottom">"Reflection" (Study), 2017
&NewLine;mixed media on panel.</div></div>
-->
                      @foreach($pictures as $i)
                      <div data-thumb="/pictures/{{$i->id}}/thumb" data-src="/pictures/{{$i->id}}/img" data-link="/pictures/{{$i->id}}/img" data-target="#img-modal">
                        <div class="camera_caption fadeFromBottom">{{$i->name}} {{$i->text}}</div>
                      </div>
                      @endforeach
                    </div>
                </div>
            </div>
        </div>
        <!--Etsy Images -->
        <div class="col-md-4 col-xs-12">
            <div class="panel panel-default">
                <div id="img-thumbnails" class="panel-body text-center">
                    <h4>Paintings currently on Sale</h4>
                    <h6>Click to Purchase</h6>
                    <!--
                    <img class="img-thumbnail img-responsive" width="40%" height="40%" src="https://img1.etsystatic.com/217/1/10139773/il_570xN.1313781353_ogra.jpg" alt=""><br>
                    <img class="img-thumbnail img-responsive" width="40%" height="40%" src="https://img0.etsystatic.com/191/0/10139773/il_570xN.1273425620_iyrp.jpg" alt=""><br>
                    <img class="img-thumbnail img-responsive" width="40%" height="40%" src="https://img1.etsystatic.com/203/0/10139773/il_570xN.1320644685_g1gr.jpg" alt=""><br>
                    <img class="img-thumbnail img-responsive" width="40%" height="40%" src="https://img1.etsystatic.com/182/0/10139773/il_570xN.1320664323_1fav.jpg" alt=""><br>
                     -->
                    @foreach($etsyItems as $e)
                    <a href="{{$e['purchaseLink']}}" target="_blank">
                    <img class="img-thumbnail img-responsive" width="40%" height="40%" src="{{$e['img']}}" alt=""><br>
                    </a>
                    @endforeach
                </div>
            </div>
        </div>
        <a href="#img-modal" id="show-modal" rel="leanModal" name="img-modal"></a>
        <div id="img-modal">

        </div>
    </div>
</div>

@endsection
