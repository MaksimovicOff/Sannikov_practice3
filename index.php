<?php
	error_reporting(0);
	$connect = mysqli_connect('localhost','root','','libary');
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" rel="stylesheet">
	<meta http-equiv="X-UA-Compatible" content="ie=edge" />
	<title>Библиотека</title>
</head>
<body>
	<div class="bar">
		<div class="favorite"><h2>Мои любимые книги</h2></div>
		<div class="subfavorite"><h3>Область для переноса книг</h3></div>
		<div class="books"><h2>Список книг</h2></div>
		<?php
  		$connect = mysqli_connect('localhost','root','','libary');
  		$out_sql = "SELECT * FROM `books1`;";
  		$run_out_sql = mysqli_query($connect,$out_sql);
  		while ($out=mysqli_fetch_array($run_out_sql)) {?>
  		<div class="subbooks"><p><?php echo $out['tittle'];
  		$id=$_GET['del_id'];
		$str_del_sql="DELETE FROM `books` WHERE `id` = $id";
		$run_del_sql=mysqli_query($connect,$str_del_sql);
		echo "<a href='?del_id=$out[id]'>";?><i class="fas fa-trash"><?echo "</a>";?></i></p></div>
  		<?}?>
		<div class="addbook"><h2>Добавить книгу</h2></div>
		<div class="add_ways">
			<div class="tabs">
  				<input type="radio" name="tab-btn" id="tab-btn-1" value="" checked>
  				<label for="tab-btn-1">Написать самому</label><br>
  				<input type="radio" name="tab-btn" id="tab-btn-2" value="">
  				<label for="tab-btn-2">Загрузить из файла</label>
  				<div id="content-1"><h3>Название</h3>
  				<form method="POST" action="upload1.php" id="theForm"> 
				<input type="text" name="first" class="name_b"><br>
				<textarea cols="36" rows="23" placeholder="Текст..." name="second" style="width: 95%; height: auto;"></textarea><br>
				<input type="submit" value="Добавить"></form>
  				</div>
  				<div id="content-2">
  				<form method="POST" enctype="multipart/form-data" id="23"> 
				<input type="file" name="files[]" multiple /><br>
				<input type="submit" name="submit" value="Добавить"></form>
  				</div>
  			</div>
  		</div>
	</div>
	<div class="content">
		<div class="open_book"><h2>Открытая книга для чтения</h2></div>
		<h1>Название</h1>
		<h1>Текст книги</h1>
	</div>
	<script src="upload.js"></script>
	<script src="upload1.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
</body>
</html>