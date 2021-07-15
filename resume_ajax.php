<?php
include("dbconn/DatabaseConnection.php");
$dbsql = new DatabaseConnection();

$sql = "SELECT * FROM files where is_deleted=0";
$result = $dbsql->RunQuery($sql);


$i = 1;

if (mysqli_num_rows($result) > 0) {
    while ($results = mysqli_fetch_array($result)) { ?>
        <tr>
            <td style=" width: 15px"><?php echo $i ?></td>
            <td style=" width: 10px"><?php echo $results['name'] ?></td>
            <td style=" width: 10px"><?php echo $results['email'] ?></td>
            <td style=" width: 10px"><?php echo $results['post'] ?></td>
            <td style=" width: 50px">
                <div width: 20px; style="word-break: break-word;">
                    <?php echo wordwrap($results['message']) ?>
                </div>
            </td>
            <td style=" width: 850px">
                <a href="<?php echo $results['file_path'] ?>" target="_blank" class="btn btn-primary" role="button" aria-pressed="true">Download</a>
                <button class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal<?php echo $i ?>">Edit</button>
                <button id="<?php echo $results['id']; ?>" onclick="deletetable(this,'2')" class="btn btn-danger" role="button" aria-pressed="true">Delete</button>

                <!-- Modal -->
                <div class="modal fade" id="myModal<?php echo $i ?>" role="dialog">
                    <div class="modal-dialog">

                        <!-- Modal content-->
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal">&times;</button>
                                <h4 class="modal-title">Please Fill the changes !!!</h4>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="container">
                                        <form id="modal_form_data_<?= $results['id']; ?>">
                                            <table>
                                                <tbody>
                                                    <tr>
                                                        <td>Name</td>
                                                        <td style="padding: 8px"><input name="name" id="modal_form_name" type="text" value="<?php echo $results['name'] ?>" size="30" /><br></td>
                                                        <td>
                                                            <b><?php if (isset($msg["name"])) {
                                                                    echo "***" . $msg["name"];
                                                                } ?></b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td> Your email:</td>
                                                        <td style="padding: 8px"> <input name="email" id="modal_form_email" type="email" value="<?php echo $results['email'] ?>" size="30" /></td>
                                                        <td>
                                                            <b><?php if (isset($msg["email"])) {
                                                                    echo "***" . $msg["email"];
                                                                } ?></b>
                                                        </td>
                                                    </tr>
                                                    <tr style="padding-left:1px;" id="row_no_<?php echo $i?>">
                                                        <td><label for="modal_profile">Choose a profile:</label>
                                                        </td>
                                                        <td style="padding-right:11px; padding-top: 10px; padding-bottom:10px"> <select id="modal_profile" name="profile" default="<?php echo $results['post'] ?>" style="width: 200px;">
                                                                <option id="<?php echo $i; ?><?php echo $results['post']; ?>_" default value="default">choose your desired post !!!</option>
                                                                <option id="<?php echo $i; ?>" <?php if ($results['post']== "web developer"){ ?> selected <?php } ?> value="web developer">web developer</option>
                                                                <option id="<?php echo $i; ?>" <?php if ($results['post']== "UI developer"){ ?> selected <?php } ?>  value="UI developer">UI developer</option>
                                                                <option id="<?php echo $i; ?>" <?php if ($results['post']== "graphic designer"){ ?> selected <?php } ?>  value="graphic designer">graphic designer</option>
                                                                <option id="<?php echo $i; ?>" <?php if ($results['post']== "cleaner"){ ?> selected <?php } ?>  value="cleaner">cleaner</option>
                                                                <option id="<?php echo $i; ?>" <?php if ($results['post']== "buissness head"){ ?> selected <?php } ?>  value="buissness head">buissness head</option>
                                                                <option id="<?php echo $i; ?>" <?php if ($results['post']== "Assistant"){ ?> selected <?php } ?>  value="Assistant">Assistant</option>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Your message:</td>
                                                        <td style="padding: 5px"><textarea name="message" id="modal_form_message" rows="6" value="" cols="32"><?php echo $results['message']; ?> </textarea></td>
                                                        <td>
                                                            <b><?php if (isset($msg["message"])) {
                                                                    echo "***" . $msg["message"];
                                                                } ?></b>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Resume:</td>
                                                        <td style="padding-left: 40px; padding-top: 10px;"><input type="file" name="file" size="50" id="fileid"><br></td>
                                                    </td>
                                                </tr>
                                                <tr >
                                                <td></td>
                                                        <td style="padding-right: 90px;"> <a href="<?php echo $results['file_path'] ?>" target="_blank" role="button" class="btn btn-default" aria-pressed="true">View Uploaded file</a>

                                                    </tr>
                                                    <tr>
                                                        <!-- ?name=Somnath+Salu+Damse&email=damse90%40gmail.com&profile=UI+developer&message=asa+&file= -->
                                                        <td style="padding: 8px;"><button type="button"  id="<?php echo $results['id']; ?>" onclick="modal_form_edit(this)" >EDIT modal</button></td>
                                                    </tr>
                                        </form>
                                        </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                </div>

            </td>
        </tr>



<?php
        $i++;
    }
}

?>