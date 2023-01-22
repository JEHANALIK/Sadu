<?php
session_start();
require('connection.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>MyKashta</title>
		<!-- Required meta tags -->
		<meta charset="utf-8">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" href="myKashta.css">
	<link rel="stylesheet" media="mediatype and|not|only (expressions)" href="style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>

<body>
<?php require('Header.php'); ?>
 
	<div class="mykashta" id="mykashta">
		<div class="cards">
			<div class=" card-body d-block d-md-flex">
				<?php
				try{
					require('connection.php');
					$sqlp = "SELECT * FROM `kashta-booking`";
					$sqlp1 = "SELECT * FROM kashtadetails";
					$rsp=$db->query($sqlp);
					$rsp1=$db->query($sqlp1);
					$rsp = $rsp->fetchAll(PDO::FETCH_ASSOC);
					$rsp1 = $rsp1->fetchAll(PDO::FETCH_ASSOC);
					$db = null;
					?>

					<table> 
						<thead>
							<tr>
								<th>Image</th>
								<th>Kashta Name</th>
								<th>Location</th>
								<th>Date</th>
								<th>Time</th>
								<th>Price</th>
							</tr>
						</thead>
					</tabel>
					<?php
					foreach($rsp as $row){
						if ($row['userId'] == $_SESSION['user']['userId']) {
							foreach($rsp1 as $row1){
								if($row['kashtaDetailsId'] == $row1['kashtaDetailsId']) {
									echo '<tr>';
									echo '<td> <img class="img-fluid.max-width:100%" src="./sado/' . $row1['pic'] . '" height="100px" width="100px" /></td>';
									echo '<td class="name">' . $row1['name'] . '</td>';
									echo '<td lass="date">' . $row['location'] . '</td>';
									echo '<td lass="date">' . $row['date'] . '</td>';
									echo '<td lass="date">' . $row['time'] . '</td>';
									echo '<td lass="date">' . $row1['price'] . '</td>';
								}
															
							}
							
						}
							
				  	}
					  
				}
				catch(PDOException $e){
				  echo 'error '.$e;
					die("Error Message".$e->getMessage());
				}
		    ?>
			</div>
		</div>
	</div>
	</body>
</html>
