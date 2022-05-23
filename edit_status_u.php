<?php
	error_reporting(0);
	$connect = mysqli_connect('localhost','root','','libary');
	$id_u=$_GET['edit_id_u'];
    $str_upd_order="UPDATE `books` SET 
            `status_u` = 1
        WHERE `id_u` = $id_u";
        $run_upd_order=mysqli_query($connect,$str_upd_order);
        header("Location:index.php");
?>