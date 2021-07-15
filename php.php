<?php 
include ("dbconn/DatabaseConnection.php");
$dbsql= new DatabaseConnection();
$id=$_POST['contact_id'];
$name=$_POST['emp_name'];
$all_id = 'asdasd';
if(!empty($_POST['all_id'])){
    $all_id = $_POST['all_id'];
}
$a ="SELECT * FROM allocated where id= $all_id";
$s = $dbsql->RunQuery($a);
$getname = '';
if($s != ''){
    while($names = mysqli_fetch_assoc($s)){
        $getname = $names['name'];
    }
}
$getcontactdetails="SELECT * FROM allocated where id = $all_id AND name = '$getname' limit 1";
$res2 = $dbsql->RunQuery($getcontactdetails);
$get_id = '';
// print_r($getcontactdetails);die;
if($res2 != NULL || $res2 != '' ){
    while($get = mysqli_fetch_assoc($res2)){
        $get_id = $get['id'];
    }
}
if ($get_id == '' || $get_id == NULL){
    $sql="INSERT INTO `allocated` (`id`, `contactid`, `name`) VALUES (NULL, '".$id."', '".$name."')";
    $message="data inserted sucessfully";
}else{
    $sql="UPDATE `allocated` SET `name`= '$name' WHERE id=$all_id";
    $message="data Updated sucessfully";
}
// print_r($sql);die;

$insertresult1 = $dbsql->RunQuery($sql);

$mess=array("success"=>"","error"=>"");
if ($insertresult1){
    $mess["success"]=$message;
}
else{
    $mess["error"]="Error";
}
echo json_encode($mess);




?>