<?php
include ("dbconn/DatabaseConnection.php");
$dbsql= new DatabaseConnection();
// print_r($_POST);
$name=$_POST['name'];
$email=$_POST['email'];
$message=$_POST['message'];
$post=$_POST['profile'];
$file = $_FILES['file']['name'];

$response=array();

$file = $_FILES['file']['name'];
function isValidPDF($mime) {
    return strpos($mime, '.pdf') == false;
}

if(isValidPDF($_FILES['file']['name'])) {
    $response['error'][0] = "It is not a PDF";
}else{
    if ($file !='' || isset($_POST['upload']) || isset($_POST['name'])|| isset($_POST['email']) || isset($_POST['message'])){
        $is_deleted=0;
        $updated_at=date("Y-m-d h:i:sa");
        $target_dir = "uploads/";
        $file_name = time().$_FILES["file"]["name"];
        $target_file = $target_dir . basename($file_name);
    
        if ($_FILES["file"]["size"] > 500000) {
            $response['error'][0] = "Sorry, your file is too large to upload.";
        }elseif (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
            $sql = "INSERT INTO files (name, email,post,message,file_path, updated_at,is_deleted) 
            VALUES ('".$name."', '".$email."','".$post."', '".$message."','".$target_file."',
             '".$updated_at."','".$is_deleted."')";
            $insertfile = $dbsql->RunQuery($sql);
            $response['success'] = "File uploaded successfully!!!";
        }else{
            $response['error'][1] = "Sorry, there was an error uploading your file.";
        }
    }
}



echo json_encode($response);

?>