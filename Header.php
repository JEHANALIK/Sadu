<?php
include 'error.php';
if (session_status() === PHP_SESSION_NONE) {
	session_start();
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
    <title></title>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container-fluid " style="font-family:serif">
                <li class="nav-item active">
                    <a href="index.php" class="me-3"><img src="sado.png" alt=""></a>
                </li>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav me-auto  mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link active text-white me-4" aria-current="page" href="index.php">Home</a>
                        </li>

                        <?php if(isset($_SESSION['user']) && $_SESSION['user'] == "admin"){?>
                        <li class="nav-item">
                            <a class="nav-link active text-white me-4" aria-current="page" href="adminAdd.php"> Add
                                Kashta </a>
                        </li>
                        <?php } ?>

                        <?php if(isset($_SESSION['user'])){?>
                        <li class="nav-item">
                            <a class="nav-link active text-white me-4" aria-current="page" href="mykashta.php">My
                                Kashta</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link active text-white me-4" aria-current="page" href="profile.php"> Profile
                            </a>
                        </li>
                        <?php } ?>

                        <?php if(isset($_SESSION['user']) && $_SESSION['user']['user_type'] == "admin" || isset($_SESSION['user']) ){?>
                        <li class="nav-item">
                            <a class="nav-link active text-white me-4" aria-current="page" href="logout.php"> Logout
                            </a>
                        </li>
                        <?php } ?>

                        <?php if(!isset($_SESSION['user'])){?>
                        <li class="nav-item">
                            <a class="nav-link active text-white me-4" aria-current="page" href="login.php"> Login </a>
                        </li>
                        <?php } ?>

                    </ul>
                    <?php if(isset($_SESSION['user'])){?>
                    <div class="text-white">Hello <?=$_SESSION['user']['username']?>
                    </div>
                    <?php } ?>

        </nav>
    </header>

</body>

</html>