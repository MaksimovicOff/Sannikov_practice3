<?php
if ($_SERVER["REQUEST_METHOD"] == "POST")
{
$connect = mysqli_connect('localhost','root','','libary');
$tittle = $_POST['first'];
$desc = $_POST['second'];
$sql = "INSERT INTO `books1` (`tittle`, `description`) VALUES ('$tittle', '$desc');";
if ($tittle && $desc) {
  $run_sql = mysqli_query($connect,$sql);
  if ($run_sql) {
    header("Location:index.php");
    echo 'alert(Вы успешно добавили книгу!)';
  }
}
else
{
    header("Location:index.php");
    echo 'alert(Заполните все поля!)';
}
}
?>