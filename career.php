<?php

include ("header.php");

?>

<h3> Submit Your resume here!!!!!!</h3>
<div  class="text-center">
<div class="container">
    <form id="form-data">
<table>
    <tbody>
        <tr>
            <td>Name</td>
            <td style="padding: 8px"><input name="name" id="form_name" type="text" value="" size="30" /><br></td>
            <td>
            <b><?php if (isset($msg["name"])){
                echo "***".$msg["name"];
            } ?></b></td>
        </tr>
        <tr>
           <td> Your email:</td>
           <td style="padding: 8px"> <input  name="email" id="form_email" type="email" value="" size="30" /></td>
           <td>
           <b><?php if (isset($msg["email"])){
                echo "***".$msg["email"];
            } ?></b></td>
       </tr>
       <tr style="padding-left:1px;">
       <td><label for="profile">Choose a profile:</label>
       </td>
       <td style="padding-right:11px; padding-top: 10px; padding-bottom:10px"> <select id="profile" name="profile" style="width: 200px;">
         <option id="default" default value="default">choose your desired post !!!</option>
         <option id="web developer" value="web developer">web developer</option>
         <option id="UI developer" value="UI developer">UI developer</option>
         <option id="graphic designer" value="graphic designer">graphic designer</option>
          <option id="cleaner" value="cleaner">cleaner</option>
          <option id="buissness head" value="buissness head">buissness head</option>
          <option id="Assistant" value="Assistant">Assistant</option>
        </select>
        </td>
        </tr>
       <tr>
       <td>Your message:</td>
           <td style="padding: 5px"><textarea name="message"  id="form_message" rows="6" cols="32" ></textarea></td>
           <td>
            <b><?php if (isset($msg["message"])){
                echo "***".$msg["message"];
            } ?></b></td> 
        </tr>
        <tr>
           <td>Resume:</td>
           <td style="padding-left: 40px; padding-top: 10px; padding-bottom:10px;"><input type="file" name="file"  size="50"  id="fileid"><br></td>
           <td>
            <b><?php //if (isset($msg["password"])){
               // echo "***".$msg["password"];
        //   } ?></b></td>
       </tr>
       <tr>
            <td style="padding: 8px;"><button type="button" id="file_upload" >upload</button></td>
       </tr>
</form>
        
    </tbody>
</table>
<!-- <div id="response"> </div >
</div> -->

<script>

$('#file_upload').on('click', function() {
    // alert();
    // var post_list = document.getElementById("profile");
    // var selected_post = post_list.value;
    // var is_deleted = 1;
    // alert(selected_post);
    let myForm = document.getElementById('form-data');
    // myForm.append('selected_post', selected_post);
    // myForm.append('is_deleted', is_deleted);
    console.log(myForm);
    let formData = new FormData(myForm);
  

    $.ajax({
        type: "POST",
        data: formData,
        url: 'career_upload.php',
        dataType: 'JSON',
        enctype: 'multipart/form-data',
        cache:false,
        contentType: false,
        processData: false,
        success: function(response) {
            if(typeof response['success'] !== 'undefined'){
                sweetalert(response['success'],'success');
            }else{
                var error_messages='';
                for(var i = 0; i < response['error'].length; i++){
                    error_messages+=response['error'][i]+"\n";
                }
                    sweetalert(error_messages,'error');
                }
            
        }
    });
   
});
function sweetalert(message,status) {
    Swal.fire(message,'',status);
}


</script>

<?php
    include ("footer.php");
?>

<!-- // function addCelebritie(){
//     $('#add-celebrities-form').validate({
//         rules: {
//             celebritie_profile_image: {
//                 required: true,
//                 extension: "jpg|png|jpeg",
//                 filesize: 500000,
//             },
//             celebritie_prime_number: {
//                 required: true,
//             },
//         },
//         messages: {
//             celebritie_profile_image: {
//                 required : "Choose Profile Image!",
//                 extension: "File must be JPG| PNG| JPEG",
//                 filesize: "File Size less than 500KB",
//             },
//             celebritie_prime_number: {
//                 required : "Select Prime Number!",
//             },
//         },
        // errorPlacement: function(error, element) {
        //     if (element.attr("type") == "radio") {
        //         error.insertBefore(element);
        //     } else {
        //         error.insertAfter(element);
        //     }
    //     },
    // });
    
//     let form_validated = $('#add-celebrities-form').valid();
//     if (form_validated) {
//         $('#cel_loader_leads_button').show();
//         var form = new FormData(document.getElementById('add-celebrities-form'));
//         var editor1 = CKEDITOR.instances['editor11'].getData();
//         form.append("celebritie_content",editor1);

//         $.ajax({
//             type: "POST",
//             data: form,
//             url: url.php,
//             dataType: 'json',
//             enctype: 'multipart/form-data',
//             cache:false,
//             contentType: false,
//             processData: false,
//             success: function(response) {
//                 console.log(response);
//             },
//         });
//     }
// }

// Got it, thanks!Thanks a lot.It works!
 -->
