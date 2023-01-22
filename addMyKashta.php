<?php 
session_start();
$kashtaDetailsId= $_POST['kashtaDetailsId'];
$booking= $_POST['bookId'];
$_SESSION['mykashta']=$kashtaDetailsId;
$_SESSION['book']=$bookId;

header('location:KashtaDetails.php');
?>


