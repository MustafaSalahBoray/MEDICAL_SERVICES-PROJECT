<?php
  require_once"../../funcions/Config.php";
include  "../../funcions/validate.php";
include "../../funcions/db.php";
  include  '../INC/Header.php'; 
   if (isset($_POST['submit'])) {
  	$Name=$_POST['text'];
  	
  	if (CheakEmpty($Name)&& Cheacklengh($Name,3)) {
  	
	$addCitie=$db->prepare("INSERT INTO city (City_name) VALUES(:Name)");
      	$addCitie->bindparam(":Name",$Name);
       if ($addCitie->execute()) {
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
  	 C
  

?>
<div class="col-sm-6 offset-sm-3 border p-3" style="margin-top:52px">
		<h1 class="text-center p-3  bg-primary text-white">Add New Admin</h1>
		<form method="POST" action="<?php echo $_SERVER['PHP_SELF']?>" >
			<div class="form-group">
				<label>Add New Cities</label>
				<input type="text" name="text" class="form-control">
			</div>
			<button type="submit" name="submit" class="btn btn-success">Save</button>
		</form></div>