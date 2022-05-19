$(document).ready(function(){
    $('button.add').on('click', function(){
      var tittleVal = $('input.first').val();
      var contentVal = $('textarea.second').val();
      console.log(tittleVal, contentVal);

            $.ajax({
        method: 'POST',
        url: 'upload1.php',
        data: { 
            first: tittleVal, second: contentVal
          }
      });

      
        $('input.first').val('');
        $('textarea.second').val('');
      if (tittleVal == '') {
        document.getElementById('results').innerHTML = "Введите название Вашей книги.";
      }
      if (contentVal == '') {
        document.getElementById('results').innerHTML = "Введите описание Вашей книги.";
      }
      if (tittleVal == '' && contentVal == '') {
        document.getElementById('results').innerHTML = "Невозможно создать пустую книгу!";
      }
      if (tittleVal && contentVal) {
        document.getElementById('results').innerHTML = "Вы успешно добавили книгу!";
      }
    });
  });