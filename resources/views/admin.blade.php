@extends('layouts.app')
@section('styles')
<link href="{{ asset('css/welcome.css') }}" rel="stylesheet">
<link href="{{ asset('css/camera.css') }}" rel="stylesheet">
<style media="screen">

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
<script type='text/javascript' src="{{ asset('js/load-image.all.min.js') }}"></script>
<script type='text/javascript' src="{{ asset('js/jquery.Jcrop.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/load-img-adapter.js') }}"></script>
<script type="text/javascript">
$("#img-select-button").on('click',function(event) {
  event.preventDefault();
  /* Act on the event */
  $('#file-input').click();
});
</script>


@endsection
@section('content')
<div class="container" id="admin">
  <div class="row">
    <!--Uploader Form -->
    <div class="col-md-6 col-xs-12">
      <div class="panel panel-default">
        <div id="upload-form-div" class="panel-body text-center">
          <form class="form-horizontal" enctype="multipart/form-data" role="form" method="POST" action="/image">
            {{ csrf_field() }}

            <h4>Post an Artwork</h4>
            <input type="file" id="file-input" class="hidden" accept="image/*" name="image" value="">
            <input type="hidden" id='img-data' name="img" value="" />
            <button type="button" name="button" id="img-select-button">Upload</button>
            <div id="result" class="result">
              <p></p>
            </div>
            <!--
            <p id="actions" style="display:none;">
            <button type="button" id="edit">Edit</button>
            <button type="button" id="crop">Crop</button>
          </p>
        -->
        <div id="exif" class="exif" style="display:none;">
          <h2></h2>
          <p id="thumbnail" class="thumbnail" style="display:none;"></p>
          <table></table>
        </div>
        <div class="form-group" style="padding:14px;">
          <input type="text" class="form-control" placeholder="Name" name="name"></input>
        </div>
        <div class="form-group" style="padding:14px;">
          <textarea class="form-control" placeholder="Description" name="text"></textarea>
        </div>
        <button class="btn btn-primary pull-right" role="button" type="submit">Add Image to Gallery</button>
      </form>

    </div>
  </div>
</div>
<!--List of Images in Database -->
<div class="col-md-6 col-xs-12">
  <div class="panel panel-default">
    <div id="upload-list" class="panel-body text-center">
      <div class="list-group">
        @foreach($images as $i)
        <a href="#" class="list-group-item">
          <img src="{{$i->thumb}}" alt="" style="float-left">
          <span>{{$i->name}}</span>
        </a>
        @endforeach
      </div>
    </div>
  </div>
</div>
<a href="#img-modal" id="show-modal" rel="leanModal" name="img-modal"></a>
<div id="img-modal" width="100%">

</div>
</div>
</div>
@endsection
