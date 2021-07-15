<?php

include("dbconn/DatabaseConnection.php");
// ob_start();
$dbsql = new DatabaseConnection();
if ($_POST["edit_key"] == 2) {
    $response = array("suceess" => "", "error" => "");
    $id = $_POST['delete_id'];

    if (isset($_POST['delete_id'])) {
        $sql = "update files SET  is_deleted = '1' where id='" . $id . "'";
        $update = $dbsql->RunQuery($sql);

        if ($update) {
            $response['success'] = "Resume deleted successfully!!!";
        } else {
            $response['error'] = "ERROR!!! While File uploading!!!";
        }
    } else {
        $response['error'] = "ERROR!!! While File uploading!!!";
    }
}
////edit curd code

else {
    $response = array("success" => "", "error" => "");
    $name = $_POST['name'];
    $email = $_POST['email'];
    $message = $_POST['message'];
    $post = $_POST['profile'];
    $edit_id = $_POST['edit_id'];
    $file = $_FILES['file']['name'];

    // $response = array();
    if (empty($file)){
        $sql=  "UPDATE files set name='" . $name . "', email='" . $email . "',post='" . $post . "',message='" .$_POST['message'] . "' WHERE id='".$edit_id."';";
    
        $updatefiles = $dbsql->RunQuery($sql);
        if (!empty($updatefiles)){
            $response['success'] = "file is updated";
        }
    }
    else {
    // $file = $_FILES['file']['name'];
    function isValidPDF($mime)
    {
        return strpos($mime, '.pdf') == false;
    }

    if (isValidPDF($_FILES['file']['name'])) {
        $response['error'] = "It is not a PDF";
    } else {
        if ($file != '' || isset($_POST['upload']) || isset($_POST['name']) || isset($_POST['email']) || isset($_POST['message'])) {
            $is_deleted = 0;
            $updated_at = date("Y-m-d h:i:sa");
            $target_dir = "uploads/";
            $file_name = time() . $_FILES["file"]["name"];
            $target_file = $target_dir . basename($file_name);

            if ($_FILES["file"]["size"] > 500000) {
                $response['error'] = "Sorry, your file is too large to upload.";
            } elseif (move_uploaded_file($_FILES['file']['tmp_name'], $target_file)) {
                $sql="UPDATE files set name='" . $name . "', email='" . $email . "',file_path='" . $target_file . "',post='" . $post . "',message='" .$_POST['message'] . "' WHERE id='".$edit_id."';";
            //     $sql = "UPDATE INTO files (name, email,post,message,file_path, updated_at,is_deleted) 
            // -- VALUES ('" . $name . "', '" . $email . "','" . $post . "', '" . $message . "','" . $target_file . "',
            //  '" . $updated_at . "','" . $is_deleted . "')";
                $insertfile = $dbsql->RunQuery($sql);
                $response['success'] = "File uploaded successfully!!!";
            } else {
                $response['error'] = "Sorry, there was an error uploading your file.";
            }
        }
    }
 }
}
echo json_encode($response);

// ob_end_clean();
?>