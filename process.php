<?php
$connect = mysqli_connect('localhost','root','','libary');
$path = "uploads/";
if (isset($_FILES['file1'])) {
    $filename=$_FILES['file1']['name'];
    $whitelist = array(".txt");
    $filename = strtolower($filename);
    $file_ext = strrchr($filename, '.');
    $str_upload = "INSERT INTO `books` (`name`, `file`) VALUES ('$filename', '$path".$_FILES['file1']['name']."');";
    if (in_array($file_ext, $whitelist)) {
      $run = mysqli_query($connect,$str_upload);
      if ($run) {
          echo 'Файл успешно загружен!';
          move_uploaded_file($_FILES['file1']['tmp_name'], $path. '/'. $_FILES['file1']['name']);
      }
      else
      {
        echo $str_upload;
        echo "Файл не загружен(";
      }
    } 
    else
    {
      echo 'Неверный тип файла!';
    }
  }
  else
  {
    echo 'Нет файла!';
  }
?>
