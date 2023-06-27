<?php 
  require_once"../../funcions/Config.php";
include  "../../funcions/validate.php";
include "../../funcions/db.php";
  include  '../INC/Header.php';

  if (isset($_POST['submit'])) {
  	$Name=$_POST['Name'];
  	$Email=$_POST['Email'];
  	$Password=$_POST['Password'];
  	if (CheakEmpty($Name)&&CheakEmpty($Email)&&CheakEmpty($Password)) {
  	 if (ValidateEmail($Email)) {
  	 		$adduser=$db->prepare("INSERT INTO admins ( admin_name,admin_Email,admin_password) VALUES(:Name,:Email,:pass)");
      	$adduser->bindparam(":Name",$Name);
      	$adduser->bindparam(":Email",$Email);
  	    $adduser->bindparam(":pass",$Password);
  
       if ($adduser->execute()) {
        $SucessMessage=" Add Sucess";
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
<div class="col-sm-6 offset-sm-3 border p-3" style="margin-top:52px">
	<h1 class="text-center p-3  bg-primary text-white">Add New Admin</h1>
	<form method="POST" action="<?php echo $_SERVER['PHP_SELF'];?>">
		<div>
		<label >Name:</label>
		<input type="text" name="Name" class="form-control"></div>
			<div>
		<label >Email:</label>
		<input type="text" name="Email" class="form-control"></div>
			<div>
		<label >Password:</label>
		<input type="Password" name="Password" class="form-control"></div>
		<button type="submit" name="submit" class="btn btn-success">Save</button>
	</form>
	
  


</div>
