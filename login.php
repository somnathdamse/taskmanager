<?php
include ("header.php");
$username = "";
// $id = "";
// $status = "";

$_SESSION['success'] = "";


$name =$password='';
if (isset($_POST['login'])){           
            $name = $_POST['username']; 
            $password = $_POST['password']; 
            $sql="SELECT id, username,status, password FROM user WHERE username = '".$name."' AND  password = '".md5($password)."'";
            // print_r($sql);
            // die;
            $result1 = $dbsql->RunQuery($sql);
            $re = mysqli_fetch_array($result1);
            // print_r($re);
            // $decoded1 = base64_decode($re['id']);
            
            if(!empty($re)){
                $_SESSION['username'] = $re['username'];
                $_SESSION['id'] = base64_encode($re['id']);
                $_SESSION['status'] = base64_encode($re['status']);
                // print_r(base64_decode($_SESSION['id']));
                // die;

                header('location: index.php');
            }
            else {
                echo "wrong user name or password";
            }
            
         
            // if($name == $result2 && $password == $result1) 
            // { 
            //     $_SESSION["logged_in"] = true; 
            //     $_SESSION["naam"] = $name; 
            // }
            // else
            // {
            //     echo'The username or password are incorrect!';
            // }
    } 

?>
<div  class="text-center">
<div class="container">
<form action="login.php" method="POST" enctype="multipart/form-data">
<table>
    <tbody>
        <tr>
            <td>Name</td>
            <td style="padding: 5px"><input name="username" type="text" value="" size="30" required/><br></td>
        </tr>
        <tr>
            <td>Password:</td>
            <td style="padding: 5px"><input type="text" name="password"  size="30" required id="password"><br></td>
       </tr>
       <tr>
            <td style="padding: 5px"><input type='submit' name='login' value="login"></td>
       </tr>
    </tbody>
</table>

   </form>
  
</div>
</div>

<?php
    include ("footer.php");
?>