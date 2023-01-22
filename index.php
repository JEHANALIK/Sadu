<?php
include 'error.php';
include 'connection.php';
session_start();
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

	<!-- slider images -->
	<div id="carouselExampleCaptions" class="carousel slide d-none d-md-block" data-bs-ride="carousel">
		<div class="carousel-indicators d-none d-md-block">
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="0" class="active"
				aria-current="true" aria-label="Slide 1"></button>
			<button type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide-to="1"
				aria-label="Slide 2"></button>
		</div>
		<div class="carousel-inner">
			<div class="carousel-item active">
				<img src="s1.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="slidertext">you want Kashta?</h5>
					<p class="sliderp">with SADO you will find the best kashta's</p>
				</div>
			</div>
			<div class="carousel-item">
				<img src="s3.jpg" class="d-block w-100" alt="...">
				<div class="carousel-caption d-none d-md-block">
					<h5 class="slidertext">Go and Explore</h5>
					<p class="sliderp">The best place to reserve your kashta's.</p>
				</div>
			</div>
		</div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="visually-hidden">Next</span>
	</button>
	</div>

	<!-- all kashta -->
	<hr class="kashta">
	<div class="container">
	    <div class="row gy-3 my-3">

<?php
    	try{
            require('connection.php');
            $sqlp = "SELECT * FROM kashtadetails";
            $rsp=$db->query($sqlp);
            $rsp = $rsp->fetchAll(PDO::FETCH_ASSOC);
            $db = null;
            
            foreach($rsp as $row){
			echo '<div class=" col-sm-6 col-md-4 col-lg-3">';
              echo '<a class="card h-100" href="KashtaDetails.php?id='.$row['kashtaDetailsId'].'">';
              echo '<img src="sado/'.$row['pic'].'" class="img-size">';
              echo '<div class="card-body">';
              echo '<h6 class="card-title">'.$row['name'].'</h6>';
              echo '<p class="card-text">'.$row['price'].'</p>';
              echo "</div>";
              echo "</a>";
              echo "</div>";
          }
        }
        catch(PDOException $e){
          echo 'error '.$e;
            die("Error Message".$e->getMessage());
        }
?>
		</div>
	</div>
	<?php require('footer.php'); 
require('footer.scripts.php'); 

?>
</body>
</html>
