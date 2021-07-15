<?php
class DatabaseConnection{
    public function RunQuery($sql){
        $conn = mysqli_connect("localhost","root","","taskmanager");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }
        return  mysqli_query($conn, $sql);
    }
}

// define('DB_SERVER', 'localhost');
// define('DB_USERNAME', 'root');
// define('DB_PASSWORD', '');
// define('DB_NAME', 'login');

// $conn =mysqli_connect(DB_NAME,DB_SERVER,DB_PASSWORD,DB_USERNAME);

// if ($conn==false){
    //     die('Error:');
    // } 
// $dbsql= new DatabaseConnection();

// $sql= "select * FROM user WHERE username='somnath'"; 
// $result = $dbsql->RunQuery($sql);

// while($row = mysqli_fetch_assoc($result)){
//     echo $row['username']."<br>"; 

// }

?> 