<?php
include ("header.php");

// $sql= "select * FROM user WHERE username='somnath'"; 
// $result = $dbsql->RunQuery($sql);
// while($row = mysqli_fetch_assoc($result)){
//     echo $row['username']."<br>"; 

// }

if (isset($_POST['submit'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $rpassword = $_POST['rpassword'];
    $created_by =12;
    $created_at = date("Y-m-d h:i:sa");
    $updated_by = 12;
    $updated_at = date("Y-m-d h:i:sa");
    $deleted=0;
    $status=2;
   
    $error = array(
        "name"=>$name,
        "email"=>$email,
        "password"=>$password,
        "rpassword"=>$rpassword,
    );
    $msg=array();
    $err = "This Field Is Required";
    foreach ($error as $key => $value){
        if ($value == ""){
            $msg[$key] = " ".$err;
        }
    }
    if (empty($msg)){
    if($password != $rpassword){
        echo "Password not matching";
    }
    else{
    
    $sql = "INSERT INTO user (username, email, password,created_by,created_at,updated_by,updated_at,deleted,status)
    VALUES ('".$name."', '".$email."', '".md5($password)."', ".$created_by.", '".$created_at."', ".$updated_by.", '".$updated_at."', ".$deleted .", '".$status."')";
    
    $insertresult = $dbsql->RunQuery($sql);
}  
} 
}

?>
<h2 style="padding: 20px;">Sign Up Here !!!!</h2>
<div  class="text-center">
<div class="container">
    <form action="signup.php" method="POST" enctype="multipart/form-data">
<table>
    <tbody>
        <tr>
            <td>Name</td>
            <td style="padding: 5px"><input name="name" type="text" value="" size="30" /><br></td>
            <td>
            <b><?php if (isset($msg["name"])){
                echo "***".$msg["name"];
            } ?></b></td>
        </tr>
        
        <tr>
           <td> Your email:</td>
           <td style="padding: 5px"> <input  name="email" type="email" value="" size="30" /></td>
           <td>
           <b><?php if (isset($msg["email"])){
                echo "***".$msg["email"];
            } ?></b></td>
       </tr>
        
        <tr>

           <td>Password:</td>
           <td style="padding: 5px"><input type="password" name="password"  size="30"  id="password"><br></td>
           <td>
            <b><?php if (isset($msg["password"])){
                echo "***".$msg["password"];
            } ?></b></td>
       </tr>

       <tr>
           <td>Repeat Password:</td>
           <td style="padding: 5px"><input type="password" name="rpassword"  size="30"  id="rpassword"><br></td>
           <td>
           <b color: red;><?php if (isset($msg["rpassword"])){
                echo "***".$msg["rpassword"];
            } ?></b></td>
       </tr>

       <tr>
       <td style="padding: 5px"><input type='submit' name='submit' value="Sign Up"></td>
       </tr>
    </tbody>
</table>

   </form>
  
</div>
<?php
    include ("footer.php");
?>