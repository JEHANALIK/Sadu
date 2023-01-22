<?php
$em = $_POST["em"];
$ps = $_POST["ps"];
require_once('login.php');

try {
    require('connection.php');
    $rs = $db->query("SELECT * FROM user WHERE email='$em' ");
    $db = null;
} catch (PDOException $ex) {
    echo "Error occured!";
    die($ex->getMessage());
}

if ($row = $rs->fetch()) {
        if (password_verify($ps, $row['password'])) //verify if hashed password in DB is the same as ps
        {
			if (session_status() === PHP_SESSION_NONE) {
				session_start();
			}
			$_SESSION['user'] = $row;
			header("Location: index.php");
           
           
        }
        else {

			echo "<p class='text-center text-danger'> " . "Incorrect Username or Password," . " " .  "Try again!" . "</p>"; //error message

        }
        
}
else {
    echo "<p class='text-center text-danger'> " . "Incorrect Username or Password," . " " .  "Try again!" . "</p>"; //error message
}