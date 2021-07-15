<?php
// $name =$email=$message=$created_by=$created_at=$updated_by=$updated_at=$deleted=$status=" ";
include ("header.php");

// if (isset($_POST['submit']))
//     {
//     $name = $_POST['name'];
//     $email = $_POST['email'];
//     $message = $_POST['message'];
//     $created_by=1;
//     $created_at= date("Y-m-d h:i:sa");
//     $updated_by= 1;
//     $updated_at= date("Y-m-d h:i:sa");
//     $deleted = 1;
//     $status=1;
    
//     // echo $name;    
//     echo $name,$email,$message;
//     $error = array(
//         "name"=>$name,
//         "email"=>$email,
//         "message" =>$message,
//     );
//     $msg=array();
//     $err = "This Field Is Required";
//     foreach ($error as $key => $value) {
//         if ($value == ""){
//             $msg[$key] = " ".$err;
//         }
//     }    
//     if (empty($msg)){   
//         // echo"he";   
        
//         $sql = "INSERT INTO contact (name, email, message,created_by,created_at,updated_by,updated_at,deleted,status)
//         VALUES ('".$name."', '".$email."', '".$message."', ".$created_by.", '".$created_at."', ".$updated_by.", '".$updated_at."', ".$deleted .", '".$status."')";

        // $sql = "INSERT INTO user (username, email, password,created_by,created_at,updated_by,updated_at,deleted,status)
        // VALUES ('".$name."', '".$email."', '".md5($password)."', ".$created_by.", '".$created_at."', ".$updated_by.", '".$updated_at."', ".$deleted .", '".$status."')";


// $insertresult = $dbsql->RunQuery($sql);
// print_r($insertresult);


?>

<h2 style="padding: 20px;">Contact Us Here !!!!</h2>
<div  class="text-center">
<div class="container">
    <form id=form_submit method="POST" enctype="multipart/form-data">
   <table>
    <tbody>
        <tr>
            <td>Your name:</td>
            <td style="padding: 5px"><input id="name"  name="name" type="text" value="" size="30" /></td>
            <td>
            <b><?php if (isset($msg["name"])){
                echo "***".$msg["name"];
            } ?></b></td>     
        </tr>
        <tr>
           <td> Your email:</td>
           <td style="padding: 5px"> <input id="email" name="email" type="email" value="" size="30" /></td>
           <td>
            <b><?php if (isset($msg["email"])){
                echo "***".$msg["email"];
            } ?></b></td> 
       </tr>
       <tr>
           <td>Your message:</td>
           <td style="padding: 5px"><textarea  id="message" name="message" rows="2" cols="32" ></textarea></td>
           <td>
            <b><?php if (isset($msg["message"])){
                echo "***".$msg["message"];
            } ?></b></td> 
       </tr>
       <tr>
       <td style="padding: 5px"> <input type='button' id="submit" name='submit' value="Send email"></td>
       <td><div id="response"> </div ></td>
       </tr>
    </tbody>
</table>
</form>
</div >
</div>

<script>
$(document).ready(function(){
    $("#submit").click(function(){
        var name=$('#name').val();
        var email=$('#email').val();
        var message=$('#message').val();
       
        
        if(name == "" || email=="" || message ==""){
            $('#response').fadeIn();
            $('#response').html('**** all fields are required  ****');
            setTimeout(function(){
                    $('#response').fadeOut('slow'); 
                },1000);
        }
        else {
            // $('#response').html($('#form_submit').serialize());  to see data is coming or not as in form of string

            $.ajax({
                url:"contact_ajax_form.php",
                type:"POST",
                data:$('#form_submit').serialize(),
                success:function(data){
                    $('#form_submit').trigger('reset');
                    $('#response').fadeIn();
                    $('#response').html(data);

                setTimeout(function(){
                    $('#response').fadeOut('slow'); 
                },800);

            }
        });
        }

        });
    });




</script>


<?php
    include ("footer.php");
?>

