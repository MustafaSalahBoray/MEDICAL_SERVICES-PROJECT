<?php  

	function CheakEmpty($value){

		if (empty($value)) {
			return false;
		}
		return true;
	}
  function ValidateEmail($Email){
  	if (!filter_var($Email,FILTER_VALIDATE_EMAIL)) {
  	   return false;
  	}
  	return true;
  }
  function Cheacklengh($value,$mini)
  {
  	if (trim(strlen($value))<=$mini) {
  	    return false;
  	}
  	return true;
  }
?>