
<?php 
require_once"../../funcions/Config.php";
include  "../../funcions/validate.php";
include "../../funcions/db.php";
  include  '../INC/Header.php';  
 if (isset($_POST['remove'])) {
   $remove=$db->prepare('DELETE FROM city WHERE city_id =:id');
   $remove->bindparam(":id",$_POST['remove']);
   if ($remove->execute()) {
     $SucessMessage="DONE";
   }
   else{
    $errorMassage="NOT DELETE";
   }
   include "../../funcions/newMessage.php"; 
  } 
?>
<div class="col-sm-12">
  <h3 class="text-center p-3  bg-primary text-white">View all cities</h3>
<table class="table table-dark table-striped">
     <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">Action</th>
    
    </tr>
  </thead>
  <tbody>
    <?php 

    $x=1;
    $show=$db->prepare("SELECT * FROM city");
    $show->execute();
    foreach ($show as $key ) {  ?>
     <tr class="text-center">
      <td scope="row"><?php echo $x;?></td>
      <td class="text-center"><?php echo $key['City_name'];?></td>
     <td class="text-center">
         <form method="POST"> <a href="<?php echo  BURLA.'cities/edit.php?id='.$key['city_id'];?>" name="edit" class="btn btn-info">Edite</a>
            <button  type=" submit" value="<?php echo $key['city_id']?>" name="remove" class="btn btn-danger">Remove</button></form>
        
     </td>
    </tr>

    <?php $x++; }?>
  </tbody>
</table>

</table></div>
        