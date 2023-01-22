<?php
include 'connection.php';
include 'error.php';


if(isset($_POST['submit'])){ 

$name=$_POST['k-name'];
$details=$_POST['k-details'];
$price=$_POST['k-price'];

$filename = basename( $_FILES['image']['name']);  
move_uploaded_file($_FILES['image']['tmp_name'], 'sado/' . $filename);

$db->beginTransaction();
$sql = "INSERT INTO kashtadetails VALUES('', '$details', '$name', '$filename','$price')";
$statement = $db->prepare($sql);
$statement->execute();
$db->commit();
echo "<script> alert('Picture uploaded successfully') </script>>";

}


?>
<!doctype html>
<html lang="en">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" media="mediatype and|not|only (expressions)" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<title>Sado</title>
  </head>

<body>
	<!-- navbar -->
	<?php require'header.php'?>
  <br>
<div class="container my-5">
<form method="post"  action="" enctype="multipart/form-data">
  <div class="mb-3">
    <label  class="form-label">keshta name</label>
    <input type="text" class="form-control" name="k-name" placeholder="enter keshta name" autocomplete="off" >
  </div>
 
  <div class="mb-3">
    <label  class="form-label">keshta details </label>
    <input type="text" class="form-control" name="k-details" placeholder="enter keshta details"   autocomplete="off" >
  </div>
  
  <div class="mb-3">
    <label  class="form-label">keshta price</label>
    <input type="text" class="form-control" name="k-price"   placeholder="enter keshta price"   autocomplete="off">
  </div>

<div class="mb-3">
    <label for="image"  class="form-label">keshta picture</label>
    <input type="file" class="form-control" name="image" id = "image" accept=".jpg, .jpeg, .png" value=""  autocomplete="off">
  </div>

  <button class="btn btn-primary my-5"> <a href="adminView.php" class="text-light"> admin view</a></button>
  <button type="submit" class="btn btn-primary" name="submit">Submit</button> <!-- on sumbit take user to a page were he can view the data-->
</form>
</div>
</body>
</html>