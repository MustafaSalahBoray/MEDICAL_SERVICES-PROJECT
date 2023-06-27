<?php
  require_once"../../funcions/Config.php";

include "../../funcions/db.php";
  include  '../INC/Header.php'; 
if (isset($_GET['id'])) {
	$getName=$db->prepare("SELECT * FROM city WHERE city_id =:id ");
	$getName->bindparam(":id",$_GET['id']);
	$getName->execute();
	foreach($getName AS $key){ 
   echo '<div class="col-sm-6 offset-sm-3 border p-3" style="margin-top:52px">
		<h1 class="text-center p-3  bg-primary text-white">Add New Admin</h1>
		<form method="POST" action="'. $_SERVER['PHP_SELF'].'" >
			<div class="form-group">
				<label>Add New Cities</label>
				<input type="text" name="text" class="form-control" value="'.$key['City_name'].'">
			</div>
			<button type="submit" name="edite" class="btn btn-success" value="'.$key['city_id'].'">Edite</button>
		</form></div>';
   
	}}
if (isset($_POST['edite'])) {
	$update=$db->prepare("UPDATE city SET City_name=:Name WHERE city_id =:id");
	$update->bindparam("Name",$_POST['text']);
	$update->bindparam("id",$_POST['edite']);
	if ($update->execute()) { 
	     	$SucessMessage="Sucess Update";
	      header("location:http://localhost/MEDICAL_SERVICES%20PROJECT/");
	     
	}
	else{
		$errorMassage="erroee";
	}
include "../../funcions/newMessage.php"; 
}

?>
