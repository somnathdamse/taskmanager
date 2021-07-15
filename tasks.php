
<?php

include ("header.php");
if (!empty($_SESSION['id'])){

$sql_admin="SELECT status from user WHERE username = '".$_SESSION['username']."'";
$sql_emp = "SELECT employee.id,employee.name FROM employee";

if (base64_decode($_SESSION['status'])==1 ){ 
        $sql_join="SELECT `contact`.id,`contact`.name,`contact`.email,`contact`.message,
        `allocated`.name AS alloc_name, allocated.id AS all_id  FROM `contact` LEFT JOIN 
        `allocated` ON `contact`.id=`allocated`.contactid ORDER BY contact.id DESC";
 } else {
        $sql_join="SELECT `contact`.id,`contact`.name,`contact`.email,`contact`.message,
        `allocated`.name AS alloc_name, allocated.id AS all_id  FROM `contact` LEFT JOIN 
        `allocated` ON `contact`.id=`allocated`.contactid  WHERE allocated.name='".$_SESSION['username']."' ORDER BY contact.id DESC";
}

$result1 = $dbsql->RunQuery($sql_join);
$emp_data = $dbsql->RunQuery($sql_emp);
$admin_data = $dbsql->RunQuery($sql_admin);
if (mysqli_num_rows($result1) == 0) {
  
 echo "<h2 style='color:red'>you are not employee</h2>";
 die;
}

 ?>
<h1>Tasks are here!!!</h1>

<?php  while ($admindata = mysqli_fetch_assoc($admin_data)) { 
  $admin_check = $admindata['status'];
  print_r($admin_check);
 } ?>

<?php
 $option = '';
 $emp_verification="";
 $option .= "<option selected>Choose Here</option>";?>
<?php  while ($resul = mysqli_fetch_assoc($emp_data)) { 
                   ?>
               <?php
                $option .= "<option id=".$resul['name'].">".$resul['name']."</option>";
                } ?> 
         
        </select> 

<table class="table table-dark" style="width: 100%">
  <thead>
    <tr>
      <th scope="col" style= "width: 3%;">Id</th>
      <th scope="col"style= "width: 10%;">name</th>
      <th scope="col" style= "width: 12%;">Email</th>
      <?php if (base64_decode($_SESSION['status'])==1 ){  ?>
      <th scope="col" style= "width: 45%;">message</th>
      <?php } else { ?> <th scope="col" style= "width: 70%;">message</th> <?php } ?>
      <?php if (base64_decode($_SESSION['status'])==1 ){  ?> 
      <th scope="col" style= "width: 10%;">alloatment</th> <?php } ?>
    </tr>
  </thead>
  <tbody >
        <?php  $no=1;
            while ($re = mysqli_fetch_assoc($result1)){ 
                // echo "<pre>";
                // print_r($re);
                // echo "</pre>";
              ?>      
    <tr>
        <th scope="row"><?php  echo $no; ?></th>
        <td><?php echo $re['name']; ?>  </td>
        <td><?php echo $re['email']; ?>  </td>
        <td><div style="width:100%;word-break:break-all;"><?php echo $re['message'];?></div></td>

        <td><label for="allotment"></label>
        <?php if (base64_decode($_SESSION['status'])==1 ){ ?>
          <select id="selectid_<?php echo $no; ?>" all-id="<?= $re['all_id'] ?>" onchange="choice(this)"  name_id="<?= ($re['alloc_name'] != NULL) ? $re['alloc_name'] : ""; ?>" data-id="<?= $re['id']; ?>">
                <?php echo $option; ?>
          </select>
         <?php }
        
          ?> 
        </td>
    </tr>
   <?php $no++; } ?>
  </tbody>
</table>

<script>
var number = "<?php echo $no; ?>";
$(document).ready(function(){
  for(var i = 1; i<= number; i++){
    $('#selectid_'+i+' option[id="'+$('#selectid_'+i).attr('name_id')+'"]').attr('selected','selected');
  }
});
function choice(select) {
    console.log(select);
    var contact_id = $(select).attr("data-id"); 
    var emp_name = select.options[select.selectedIndex].getAttribute("id");
    var all_id = select.getAttribute("all-id");
    $.ajax({
      url:"php.php",
      data:{"emp_name":emp_name,"contact_id":contact_id,"all_id":all_id},
      type:"POST",
      dataType:"json",
      success:function(res){
      console.log(res['success']);
      if(res['success'] != ''){
        alert(res['success']);
        location.reload();
      } else {
        alert(res['error']);
      }
    },
    error:function(err){
    console.log(err);
    }
  });
}
</script>

<?php
}
else {
  echo "<h1> unauthorised </h1>";
}
include ("footer.php");
       // alert(contact_id);
       // var contact_id1 = select.data_id.value();
       // var emp_name = select.value; to get employee name
       // alert(emp_name);
       // var emp_name = select.options[select.selectedIndex].getAttribute("id");
       // alert("Work Alloted to :- " +select.options[select.selectedIndex].getAttribute("id"));
       // alert(contact_id); to get sender name 
       // var emp_name = $(select).find(":selected").text(); to get value of id like india china
       // alert(emp_name);
?>
