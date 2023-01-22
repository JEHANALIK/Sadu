<?php
$un = $_POST["un"];
$em = $_POST["em"];
$ps = $_POST["ps"];
$pn = $_POST["pn"];
$cps = password_hash($ps, PASSWORD_DEFAULT);
$sql = "INSERT INTO user (username, password, phone, email) VALUES('$un','$cps','$pn','$em')";

try {
    require('connection.php');
    $r = $db->exec($sql);
    if ($r > 0)
        echo "<h2> User was successfully registered</h2>";
    $db = null;
} catch (PDOException $ex) {
    echo "Error occured!";
    die($ex->getMessage());
}
header("Location: login.php");
exit();
