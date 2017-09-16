/*JS*/

function deleteImageById(id){
    return $.ajax({
      url: '/pictures/' + id,
      type: 'DELETE',
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
  promise.done(function(){
    console.log('deleted successfully');
    location.reload();
  }).fail(function(e){console.log(e.responseText);});
});

$("#img-select-button").on('click',function(event) {
  event.preventDefault();
  /* Act on the event */
  $('#file-input').click();
});
