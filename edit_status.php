<?php
	error_reporting(0);
	$connect = mysqli_connect('localhost','root','','libary');
	$id=$_GET['edit_id'];
    $str_upd_order="UPDATE `books1` SET 
            `status` = 1
        WHERE `id` = $id";
        $run_upd_order=mysqli_query($connect,$str_upd_order);
        header("Location:index.php");
?>