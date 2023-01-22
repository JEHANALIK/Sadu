<?php

include 'error.php';
include 'connection.php';

session_start();

?>

<!DOCTYPE html>
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
  <style>

  .upload{
width: 100px;
position: relative;
margin: auto;
}

#display-image{
    width: 100px;
  height: 100px;
  border: 1px solid black;
  background-position: center;
  background-size: cover;


border-radius: 50%;
border: 6px solid gray ;

}

.upload .round{
position: absolute;
bottom: 0 ;
right: 0 ;
background-color: rgb(198, 155, 89);
height: 32px;
width: 32px;
line-height: 33px;
overflow: hidden;
text-align: center;
border-radius: 50%;
}

input[type=file]::-webkit-file-upload-button  {
cursor: pointer;
}
.button-group{
  display: grid;
  padding-top: 20px;
}
input[type="text"]{
  width: 80%;
 border:2px solid lightgray;
 border-radius: 4px;
 box-sizing: border-box;
}
input[type="text"]:focus{
border-color: blue;
box-shadow: 0 0 8px dodgerblue;
}
.upload input[type='file']{
position: absolute;
transform: scale(0);
opacity: 0;
z-index: 1;

}
label{
    color: beige;
    background-color: orange;
    height: 60px;
    width: 100px;
    position: relative;
    cursor: pointer;
    padding: 10px 10px;
}

</style>

</head>

    <body class="bg-light">
    <!-- navbar -->
	<?php require 'Header.php'?>
    <div class="container ">
    <div class="row d-flex justify-content-center">
    <div class="col-sm-mt-2  mt-md-5  mt-lg-5">
     <div class="row z-depth-2">
      <div class="col-sm-4   rounded-left pb-5"  style="background-color: #ffbf36ac;" >
        <div class="card-block text-center text-white">
         <h2 class="fontweight-bold mt-3">
           <?php if(isset($_SESSION['user'])){?>
          <div class="text-white">
             <h3>your name is : <?=$_SESSION['user']['username']?></h3>
          </div>
        <?php } ?>  
         
    
  <div class="upload">
    <div id="display-image"></div>
    <input type="file" id="image-input" accept="image/jpeg, image/png, image/jpg">
    <div class="round">
    <label for="image-input">
<i class="fa-solid fa-camera" >click<pre></pre>here <pre></pre> </i>
    </label>
    </div>
</div>
  </div>

       <div class="button-group ">
        <button  class="btn btn-outline-primary btn-sm btn-pt-2"  style="margin-bottom: 10px;"> update </button>
      </div>
      </div>

       <div class="col-sm-8 bg-white rounded-right">
     <h3 class="mt-3 text-center">profile page</h3>
     <hr class="badge-primary  text-center  mx-auto  w-25">

     <form class="form" method="POST" enctype="multipart/form-data">

   <?php
   if(isset($_SESSION['user'])){

   $currentUser=$_SESSION['user'];
   //write query to get all user data 

   $userid=$_SESSION['user']['userId'];

  $sql="SELECT * FROM `user` WHERE  userId='$userid' ";


   $stmt=$db->prepare($sql);
  
    $stmt->execute();

//fetch give us one row or multiple
  $row=$stmt->fetch(PDO::FETCH_ASSOC);
     
  $name =$row['username'];
  $phone=$row['phone'];
  $email=$row['email'];
  $password=$row['password'];
  $cps = password_hash($password, PASSWORD_DEFAULT);

   }
   ?>

   <div class="row">

     <div class="col-sm-6">
     <p class="font-weight-bold">email</p>
     <h6 class="text-muted"><input type="text" id="email" name="email" placeholder=""  value="<?php echo $email;  ?>"  ></h6>
    <!-- <button class="btn btn-primary btn-sm   btn-pt-2"   onclick="enableEmail()" ><i class="fa-solid fa-pen"></i> edit</button>-->

     </div>

     <div class="col-sm-6">
     <p class="font-weight-bold">phone number </p>
     <h6 class="text-muted"><input type="text" id="phoneNumber"  name="phoneNumber"  placeholder=""   value="<?php echo  $phone ; ?>"  ></h6>
      </div>

      </div> <!--end of row-->

<br>
<br>
      <div class="row">
        <div class="col-sm-6">
        <p class="font-weight-bold">Password </p>
        <h6 class="text-muted"><input type="password" id="password" name="password" placeholder="" value= "<?php echo $password  ?>" ></h6>
         </div>
   
         <div class="col-sm-6">
          <p class="font-weight-bold">Confirm Password </p>
          <h6 class="text-muted"><input type="password" id="passwordc" name="passwordc" placeholder="" ></h6>
          </div>

         </div> <!-- end of row-->

         <br>

       <button type="submit" name="edit" class="btn btn-primary" style="background-color:#44514d; border: 2px solid  #44514d">Edit Details </button>

           </div> <!--end of form -->
       </div>
       </div>
      </div>
       </div>
       </div>
       </form>

<?php 

   if(isset($_POST['edit'])){
    if($_POST['password'] == $_POST['passwordc']){
      $pass = $_POST['password'];
      $cps1 = password_hash($pass, PASSWORD_DEFAULT);
      $phonec = $_POST['phoneNumber'];
      $emailc = $_POST['email'];
        require('connection.php');
        $sqlp = "UPDATE `user` SET `password`='$cps1',`phone`='$phonec',`email`='$emailc' WHERE `userId`='$userid'";
        $rs=$db->prepare($sqlp);
        $rs->execute();
        $db = null;
    } else {
      echo "<script> alert('wrong password!') </script>";
     
    }
   }

?>



      <script>

        const image_input = document.querySelector("#image-input");
     image_input.addEventListener("change", function() {
     const reader = new FileReader();
    reader.addEventListener("load", () => {
    const uploaded_image = reader.result;
    document.querySelector("#display-image").style.backgroundImage = `url(${uploaded_image})`;
     });
    reader.readAsDataURL(this.files[0]);
   });

</script> 



<?php require('footer.php'); 
require('footer.scripts.php'); 

?>


</body>
</html>
