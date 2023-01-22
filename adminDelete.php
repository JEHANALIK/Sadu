<?php

include 'error.php';
include 'connection.php';
if(isset($_GET['deleteid'])){
     
$id=$_GET['deleteid'];
$sql="DELETE FROM kashtadetails WHERE kashtaDetailsId=$id";
$stmt=$db->prepare($sql);
$result=$stmt->execute();

if($result=='true'){
    echo "<script> alert('deleted sucussefuly') </script>";
    header('location:adminView.php');
}
else{
    echo "<script> alert('not deleted') </script>";
}
}

?>