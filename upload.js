$(document).ready(function (e) {
  $('#forma').on('submit', function (e) {
   e.preventDefault();
   let formData = new FormData(this);

   $.ajax({
    type: 'POST',
    url: $(this).attr('action'),
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
    success: function (data) {
     $('#results').html(data);
    },
    error: function (data) {
     document.getElementById('results').innerHTML = "Успех2!";
     document.getElementById('results').innerHTML = data;
    }

   });
  })
 });