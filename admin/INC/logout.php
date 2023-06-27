<?php 

require_once"../../funcions/Config.php";

session_destroy();
if (isset($_SESSION['Email'])) {
	 header("location:http://localhost/MEDICAL_SERVICES%20PROJECT/admin/INC/login.php",true);
}

?>