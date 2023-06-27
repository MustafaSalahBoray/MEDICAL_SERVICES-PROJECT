<?php if (isset($errorMassage)&&$errorMassage !='') { ?>

	
<div class="col-sm-6 offset-sm-3 border p-3" style="margin-top:52px">
	<h3 class="text-center alert alert-danger"><?php echo $errorMassage;?></h3></div>

<?php } ?>
<?php if (isset($SucessMessage)&&$SucessMessage !='') { ?>

	
<div class="col-sm-6 offset-sm-3 border p-3" style="margin-top:52px">
	<h3 class="text-center alert alert-success"><?php echo $SucessMessage;?></h3></div>

<?php } ?>