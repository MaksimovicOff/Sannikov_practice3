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
		<div class="container"></div>
		<div class="books"><h2>Список книг</h2></div>
		<div class="container">
		<?php
			$rt = "SELECT * FROM `books1`";
			$start = mysqli_query($connect, $rt);
			while ($privet = mysqli_fetch_array($start)) {
				echo "<a href='?id=$privet[id]' style='text-decoration: none; color: black;'><p class='draggable' draggable='true'>$privet[tittle]";echo "<a href='?del_id=$privet[id]' style='color: black;'>";?><br><i class="fas fa-trash"></i></a><?
					if ($privet[status]=='1') {
						?><i class="fas fa-check"></i><?
					}
					else{
						echo "<a href='edit_status.php?edit_id=$privet[id]' style='text-decoration: none; color: black;'>";?><i class="fas fa-ellipsis-h"></i><?echo "</a>";
					}
				}?></p></a><?
			$rt1 = "SELECT * FROM `books`";
			$startt = mysqli_query($connect, $rt1);
			while ($privet1 = mysqli_fetch_array($startt)) {
				echo "<a href='?id_u=$privet1[id_u]' style='text-decoration: none; color: black;'><p class='draggable' draggable='true'>$privet1[name]";echo "<a href='?del_id_u=$privet1[id_u]' style='color: black;'>";?><br><i class="fas fa-trash"></i></a><?
					if ($privet1[status_u]=='1') {
						?><i class="fas fa-check"></i><?
					}
					else{
						echo "<a href='edit_status_u.php?edit_id_u=$privet1[id_u]' style='text-decoration: none; color: black;'>";?><i class="fas fa-ellipsis-h"></i><?echo "</a>";
					}
				}?></p></a><?
			?>
		</div>
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
				<textarea cols="36" rows="10" placeholder="Текст..." name="second" style="width: 95%; height: auto;"></textarea><br>
				<input type="submit" value="Добавить"></form>
  				</div>
  				<div id="content-2">
  					<form method="POST" id="forma" name="ourForm" enctype="multipart/form-data" action="process.php" > 
					<input type="file" name="file1" id="js-file"><br>
					<input type="submit" name="submit" value="Добавить"></form>
  				</div>
  			</div>
  		</div>
	</div>
	<div class="content">
		<div class="open_book"><h2>Открытая книга для чтения</h2></div>
		<div id="results"></div>
		<?php
			$id=$_GET['id'];
    		$sql = "SELECT * FROM `books1` WHERE id = '$id'";
			$gg = mysqli_query($connect, $sql);
			while ($id= mysqli_fetch_array($gg)) {
				?><h1>Название</h1><?echo "<p class='main1' draggable='true'>$id[tittle]</p>";
				?><h1>Текст книги</h1><?echo "<p class='main2' draggable='true'>$id[description]</p>";
			};
			$id_u=$_GET['id_u'];
    		$sql1 = "SELECT * FROM `books` WHERE id_u = '$id_u'";
			$gg1 = mysqli_query($connect, $sql1);
			while ($id_u= mysqli_fetch_array($gg1)) {
				?><h1>Название</h1><?echo "<p class='main1' draggable='true'>$id_u[name]</p>";
				?><h1>Текст книги</h1><?echo "<embed src='$id_u[file]' frameborder='0' width = '100%' height = '100%' scrolling = 'no'></embed>";
			};
		?>
	</div>
	<script src="jquery-3.6.0.min.js"></script>
	<script src="script.js"></script>
	<script src="upload.js"></script>
	<script src="upload1.js"></script>
	<script defer src="https://use.fontawesome.com/releases/v5.15.4/js/all.js"></script>
	<?php
		$id=$_GET['del_id'];
		$str_del_sql="DELETE FROM `books1` WHERE `id` = $id";
		$run_del_sql=mysqli_query($connect,$str_del_sql);
		$id_u=$_GET['del_id_u'];
		$str_del_sql="DELETE FROM `books` WHERE `id_u` = $id_u";
		$run_del_sql=mysqli_query($connect,$str_del_sql);
	?>
</body>
</html>