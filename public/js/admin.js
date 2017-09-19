/*JS*/

function deleteImageById(id){
    return $.ajax({
      url: '/pictures/' + id,
      type: 'DELETE',
      headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
    });
}

function refreshEtsy(){
  return $.ajax({
    url: '/refreshEtsy',
    type: 'GET',
    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
  });
}

/*Handlers*/

$("#delete").on('click', function(event) {
  event.preventDefault();
  /* Act on the event */
  var id = $(this).data('id')
  console.log(id);
  var promise = deleteImageById(id)
  promise.done(function(data){
    console.log('deleted successfully', data);
    window.location.href = "/admin"
  }).fail(function(e){console.log(e.responseText);});
});

$("#img-select-button").on('click',function(event) {
  event.preventDefault();
  /* Act on the event */
  $('#file-input').click();
});

$("#refresh-etsy").on('click', function(event) {
  event.preventDefault();
  /* Act on the event */
  var promise = refreshEtsy()
  promise.done(function(data){
    console.log('refreshing etsy done', data);
    location.reload();
  }).fail(function(e){console.log(e.responseText);});
});

$("#file-input").on('change', function(event) {
  event.preventDefault();
  /* Act on the event */
  $("#submit").attr('disabled', false)
});
