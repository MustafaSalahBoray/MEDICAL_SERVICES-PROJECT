<?php  
require_once"../../funcions/Config.php";
include  "../../funcions/validate.php";
include "../../funcions/db.php"; 
if (isset($_SESSION['admin_name'])) {
	 header("location:http://localhost/MEDICAL_SERVICES%20PROJECT/index.php",true);
}

 
  if (isset($_POST['submit'])) {
  
  	$Email=$_POST['Email'];
  	$Password=$_POST['Password'];
  	if (CheakEmpty($Email)&&CheakEmpty($Password)) {
  	 if (ValidateEmail($Email)) {
  	 		$adduser=$db->prepare("SELECT * FROM  admins WHERE admin_Email =:Email AND 	admin_password=:pass");
      	
      	$adduser->bindparam(":Email",$Email);
  	    $adduser->bindparam(":pass",$Password);
        $adduser->execute();
        if ($adduser->rowCount()===1) {
        	$use= $adduser->fetchObject();
        	if ($use->ACTIVATED==="0") {
        	 session_start();
        	 $_SESSION['Email']=$use->admin_Email;
        	 $_SESSION['Password']=$use->admin_password;
        	 $_SESSION['admin_name']=$use->admin_name;
        	 header("location:http://localhost/MEDICAL_SERVICES%20PROJECT/index.php",true);

        	}
        }
         


      }
      else{

      		$errorMassage="Pleaze Correct Email";
      }
    }
    else{
  		$errorMassage="Pleaze Type All Faild";
  	}
    include "../../funcions/newMessage.php";
  }

 
?>


<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>login</title>
		<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.3/dist/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script> <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
</head>
<body style="background: rgb(0, 0, 8);">
  <div class="cont-login d-flex align-items-center justify-content-around"style="margin-top: 5%;color: white;" >
  	<form  method="POST"class="border p-5" style="background:rgb(0, 64, 0);"  action="<?php echo $_SERVER['PHP_SELF'];?>">
  		<div class="row">
  			<div class="col-sm-12" >
	<h3 class="text-center p-3  text-white">login</h3></div>
	<div  class="col-sm-6 offset-sm-3 ">
		<div class="form-group">
			<label>Email</label>
			<input type="Email" name="Email" class="form-control">
			
		</div>
		<div class="form-group">
			<label>Password</label>
			<input type="Password" name="Password" class="form-control">
			
		</div>
		<div class="form-group">
			
			<button type="submit" name="submit" class="form-control btn-success">submit</button>
			
		</div>
		




	</div>
  		</div>

  	</form>
  
  </div>
</body>
</html>