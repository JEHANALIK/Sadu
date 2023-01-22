<?php 
require('connection.php');
session_start();
$failed = false;
$inserted = false;
$failedmsg ="";
$commentmsg= "";

if(isset($_POST['comment-action']))
{
		$db->beginTransaction();
		$stmt = $db->prepare("
		INSERT INTO `comments` 
		(`kashtaDetailsId`, `userId`, `comment`) VALUES 
		(:kashtaDetailsId, :userId, :comment)");
		$stmt->bindParam(':kashtaDetailsId',$_GET['id']);
		$stmt->bindParam(':userId', $_SESSION['user']['userId']);
		$stmt->bindParam(':comment',$_POST['comment']);
		$stmt->execute();
		$db->commit();
		$commentmsg = "Comment Added.";
}
if(isset($_POST['book-action'])){
	$db->beginTransaction();


	$query = $db->prepare('SELECT * FROM `kashta-booking` where `time` = :time ');
	$query->bindParam(':time', $_POST['time']);
	$query->execute();

	$query->setFetchMode(PDO::FETCH_ASSOC);
	$bookings = $query->fetchAll();
	if(count($bookings)){
		$failed = true;
		$failedmsg = "Booking already exists for the given date.";
	}
	if(!$failed ){
		$stmt = $db->prepare("
		INSERT INTO `kashta-booking` 
		(`kashtaDetailsId`,	`userId`,	`date`,`time`,`location`) VALUES 
		(:kashtaDetailsId ,	:userId ,	:date,:time,:location);");
	
		$stmt->bindParam(':kashtaDetailsId',$_GET['id']);
		$stmt->bindParam(':userId', $_SESSION['user']['userId']);
		$stmt->bindParam(':date',$_POST['date']);
		$stmt->bindParam(':time',$_POST['time']);
		$stmt->bindParam(':location',$_POST['location']);
		
		$stmt->execute();
		$db->commit();
		$inserted = true;
	}

}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE-edge">
	<link rel="stylesheet" href="KashtaDetails.css">
	<link rel="stylesheet" href="style.css">
	<link rel="stylesheet" media="mediatype and|not|only (expressions)" href="kashtaDetails.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- Bootstrap CSS -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
		integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
	<!-- font -->
	<link href='https://fonts.googleapis.com/css?family=Montserrat' rel='stylesheet'>
	<title><?php echo $_SERVER['PHP_SELF']; ?>?id=<?=$kashta['kashtaDetailsId']?></title>
</head>
<body>
	<!-- navbar -->
<?php require('header.php'); ?>
	<?php
	$query = $db->prepare('SELECT * FROM kashtadetails where kashtaDetailsId = :kashtaDetailsId');
	$query->bindParam(':kashtaDetailsId', $_GET['id']);
	$query->execute();

	$query->setFetchMode(PDO::FETCH_ASSOC);
	$kashta = $query->fetch();


	$query = $db->prepare('SELECT * FROM `kashta-booking` where userId = :userId and kashtaDetailsId = :kashtaDetailsId and `date` < CURDATE()');
	$query->bindParam(':userId', $_SESSION['user']['userId']);
	$query->bindParam(':kashtaDetailsId', $kashta['kashtaDetailsId']);
	$query->execute();

	$query->setFetchMode(PDO::FETCH_ASSOC);
	$bookings = $query->fetchAll();
      ?>

	<div class="colorlib-product ">
		<div class="container">
			<form action="<?php echo $_SERVER['PHP_SELF']; ?>?id=<?=$kashta['kashtaDetailsId']?>" method="POST" class="row row-pb-lg product-detail-wrap">
				<div class="col-sm-4 col-md-12 col-lg-8">
					<div class="item">
						<div class="product-entry border">
							<div class="bg-img" style="background-image:url('sado/<?=$kashta['pic']?>')"></div>
							<!-- <img src="sado/<?=$kashta['pic']?>" class="img-fluid.max-width:100%" style="width: 100%"> -->
						</div>
					</div>
				</div>

				<div class="col-sm-8 col-md-12 col-lg-4">
					<div class="product-desc">
						<h4 > <?=$kashta['name']?> </h4>
						<p class="price" style="font-family:serif">
							<span><?=$kashta['price']?> BD</span>
							<span class="rate">
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>
								<i class="fa-solid fa-star"></i>(74 Rating)
							</span>
						</p>
						<p style="font-family:serif color:#44514d"> <?=$kashta['details']?> </p>
						<div class="size-wrap">
							<div class="block-20 mb-2">
								<h6 >choose suitable date:</h6>
								<input type="date" style="width:100%" name="date">
								<h6 style="font-size: 18px font-family:serif";>choose a suitable Time:</h6>
								<input type="time" style="width:100%" name="time">
								<h6 style="font-size: 18px font-family:serif";>choose one location: </h6>
								<input type="radio" name="location" value="busiteen" id="busiteen" checked>
								<label for="busiteen" style="font-size: 16px font-family:serif";>busiteen</label>
								<input type="radio" name="location" value="bahrain-bay" id="bh-bay">
								<label for="bh-bay" style="font-size: 16px font-family:serif";>bahrain-bay</label>
							</div>
						</div>
					</div>
				</div>
				<div class="col-md-8">
					<?php if(count($bookings)){?>
						<div class="form-group">
							<label for="comment" style="font-family:serif">Comments</label>
							<textarea style="font-family:serif" class="form-control" name="comment" id="comment" rows="2"></textarea>
						</div>
						<br/>
						<input type="submit" class="btn btn-primary" style="background-color: #44514d; border: 2px solid  #44514d;"value="Comment" name="comment-action">
					<?php echo $commentmsg; }?>
				<br/>
				<div class="comment-container">
				<?php
					$query = $db->prepare('SELECT * FROM `comments` left join user on user.userId = comments.userId where kashtaDetailsId = :kashtaDetailsId ');
					$query->bindParam(':kashtaDetailsId', $_GET['id']);
					$query->execute();

					$query->setFetchMode(PDO::FETCH_ASSOC);
					$comments = $query->fetchAll();

					foreach ($comments as $key => $comment) {
						?>
						<div class="comm">
							<div>
								<?=$comment['comment']?>
							</div>
							<div class="d-flex justify-content-between">
							<div style="font-family:serif">
                            <b> <?=$comment['username']?> </b>
							</div>
							<div>
							<?=$comment['date']?>
							</div>
							</div>
						</div>
						<?php
					}
				?>
				</div>
				</div>
				<div class="col-md-4">
					<input type="submit" class="btn btn-primary" style="background-color: #44514d; border: 2px solid  #44514d;" value="Reserve Kashta" name="book-action">
					<?php
					if($inserted){
						echo "Reserved successfully";
					}
					if($failed){
						echo $failedmsg;
					}
					?>
				</div>
			</form>
		</div>
	</div>
	<?php require('footer.php');
	require('footer.scripts.php'); ?>
</body>

</html>
