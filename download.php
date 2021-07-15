<?php
include ("dbconn/DatabaseConnection.php");

$dbsql= new DatabaseConnection();
$id=55;
if(isset($_GET['id'])){


$sql ="SELECT * FROM files where id=".$id."";
$result = $dbsql->RunQuery($sql);
print_r($result);

// $filename=basename($_GET['id']);
$file="uploads/".$result['id'];

if (file_exists($file)){
    header('Content-Description: File Transfer');
    header('Content-Type: pdf/png');
    header('Content-Disposition: attachment; filename="'.basename($file).'"');
    header('Content-Transfer-Encoding: binary');
    // header('Expires: 0');
    header('Cache-Control: public');

    readfile($file);
    exit;
}
else{
    echo "no file";
}

}


?>