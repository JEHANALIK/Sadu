<?php
include 'error.php';
include 'connection.php';
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
	<title>Admin</title>
</head>
<body>
	<!-- navbar -->
	<?php require'header.php'?>
<div class="container my-5">
<button class="btn btn-primary my-5"> <a href="adminAdd.php" class="text-light"> add kashta</a></button>
<table class="table">
  <thead>
    <tr>
      <th scope="col">kashta ID </th>
      <th scope="col">kashta details</th>
      <th scope="col">kashta name</th>
      <th scope="col">kashta pic</th>
      <th scope="col">kashta price</th>
      <th scope="col">operation</th>
    </tr>
  </thead>
  <tbody>

   <?php
  
  $sql="SELECT * FROM `kashtadetails` ";
  $stmt=$db->prepare($sql);
  $stmt->execute();

while($row=$stmt->fetch(PDO::FETCH_ASSOC)) { 
    $id=$row['kashtaDetailsId'];
    $details=$row['details'];
    $name=$row['name'];
    $pic=$row['pic'];
    $price=$row['price'];
   echo  "<tr>
   <td>$id</td>
   <td>$details</td>
   <td>$name</td>
   <td>  
    <img width='100' height='100' src='./sado/".$row['pic']."'/><br/>;
  </td>
   <td>$price</td>
   <td> 
    <button  class='btn btn-primary my-5'>  
    <a href='adminDelete.php?deleteid={$id}' class='text-light'> delete </a> </button> 
   </td>
 </tr>";
  }
?>
  </tbody>
</table>
</div>
</body>
</html>

