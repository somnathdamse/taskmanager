<?php
include ("dbconn/DatabaseConnection.php");
$dbsql= new DatabaseConnection();

$sql ="SELECT * FROM files";
$result = $dbsql->RunQuery($sql);


$i=1;

if (mysqli_num_rows($result)>0){
    while ($results=mysqli_fetch_array($result)){?>
        <tr>
        <td style=" width: 15px"><?php echo $i ?></td>
        <td style=" width: 180px"><?php echo $results['name']?></td>
        <td style=" width: 80px"><?php echo $results['email']?></td>
        <td style=" width: 10px"><?php echo $results['post']?></td>
        <td style=" width: 780px" ><div  width: 250px;  style="word-break: break-word;"><?php echo wordwrap($results['message'],1)?></div></td>
        <td style=" width: 10px"><?php echo $results['post']?></td>
        <!-- <td ><?php // echo $results['file_path']?></td> -->
        <td style=" width: 30px"><a href="download.php?id='<?php $results['id'] ?>'" target="_path">download</td>
        
    </tr>


    <?php
    $i++; }
}
<!-- <a id="<?php echo $results['id'];?>" href="curd.php?delete=
<?php echo $results['id'];?> " class="btn btn-danger" role="button"
 aria-pressed="true">Delete</a> -->
</td>
?>


<script>


// $('.navbar-nav li.active').removeClass('active');
// $(this).parent().addClass('active');
// </script> 


function sweetalert(message,status) {
    if (message==sucess){
        Swal.fire(message,'',status).then((result) => {
      // Reload the Page
      location.reload();

    })
    }
    else{
        Swal.fire(message,'',status)

    }
}