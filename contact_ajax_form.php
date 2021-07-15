<?php
include ("dbconn/DatabaseConnection.php");
$dbsql= new DatabaseConnection();
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$created_by=1;
$created_at= date("Y-m-d h:i:sa");
$updated_by= 1;
$updated_at= date("Y-m-d h:i:sa");
$deleted = 1;
$status=1;


$sql = "INSERT INTO contact (name, email, message,created_by,created_at,updated_by,updated_at,deleted,status)
VALUES ('".$name."', '".$email."', '".$message."', ".$created_by.", '".$created_at."', ".$updated_by.", '".$updated_at."', ".$deleted .", '".$status."')";

$insertresult = $dbsql->RunQuery($sql);
// print_r($insertresult);

if ($insertresult){
    echo "Form saved bhai !!!!!!";
}
else{
    echo "cant save form";
}
?>