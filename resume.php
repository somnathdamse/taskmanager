<?php
include("header.php"); ?>
<h2>Check submitted resumes here!!!</h2>
<table class="table table-striped table-bordered text-center">
    <thead>
        <tr>
            <th class="text-center">
                <div style=" width: 15px">Id</div>
            </th>
            <th class="text-center">
                <div style="width: 85px">Name</div>
            </th>
            <th class="text-center">
                <div style="width: 85px">email</div>
            </th>
            <th class="text-center">
                <div style="width: 85px">Post</div>
            </th>
            <th class="text-center">
                <div style="width: 700px">message</div>
            </th>
            <th class="text-center">
                <div style="width: 75px">Action</div>
            </th>
        </tr>
    </thead>
    <tbody id="response">


    </tbody>
</table>


<script>
    $(document).ready(function() {
        loadtable();

        function loadtable() {
            $.ajax({
                url: 'resume_ajax.php',
                type: 'POST',
                datatype: 'JSON',
                success: function(responsedata) {
                    // console.log(responsedata);
                    $('#response').html(responsedata);

                }
            });
        }
    });
</script>


<script>
    function deletetable(id,value) {
        var delete_id = $(id).attr("id");
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $(id).attr("disabled", true);
                $.ajax({
                    type: 'POST',
                    url: 'curd.php',
                    data: {
                        "delete_id": delete_id, "edit_key" : value,
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log(response['error']);
                        if (response['error'] == '') {
                            // location.reload();
                            sweetalert_success(response['success'], 'success');
                            $(id).attr("disabled", false);
                        } else {
                            sweetalert_error(response['error'], 'error');
                            $(id).attr("disabled", false);
                        }
                    },
                    error: function(response) {
                        // error=response.responseText
                        error = "Server error"
                        // console.log(response.responseText);
                        sweetalert_error(error, 'error');
                        $(id).attr("disabled", false);
                    }
                });
            }
        })
    }

    function sweetalert_success(message, status) {

        swal.fire(message, '', status).then((result) => {
            location.reload();

        });
    }

    function sweetalert_error(message, status) {

        swal.fire(message, '', status)


    }
</script>

<script>
    // $('#modal_edit').onclick(function() {
    function modal_form_edit(id) {
        // var modal_selected_post = document.getElementById("modal_profile").value;
        // alert(modal_selected_post);
        
        var edit_key = 1;
        var edit_id = $(id).attr("id");

        let modalForm = document.getElementById('modal_form_data_'+edit_id);
        // alert(modalForm.values());
        // modalForm.append('modal_selected_post', modal_selected_post);
        let Form_data = new FormData(modalForm);
        Form_data.append('edit_key', edit_key);
        Form_data.append('edit_id', edit_id);
        
        // Form_data.forEach((value,key) => {
        //     console.log(key+" "+value)
        // });
        // return false;
        //     console.log(Form_data.values());
        
        // });

        $.ajax({
            type: "POST",
            data: Form_data,
            url: 'curd.php',
            dataType: 'JSON',
            enctype: 'multipart/form-data',
            cache: false,
            contentType: false,
            processData: false,
            success: function(response) {
                // console.log(response);
                if (typeof response['success'] !== 'undefined') {
                    edit_sweetalert_success(response['success'], 'success');
                } else {
                    // var error_messages = '';
                    // for(var i = 0; i < response['error'].length; i++){
                    //     error_messages=response['error'];
                    // }
                    edit_sweetalert_error(response['error'], 'error');
                }

            }
        });
        function edit_sweetalert_success(message, status) {

swal.fire(message, '', status).then((result) => {
    location.reload();

});
}

function edit_sweetalert_error(message, status) {

swal.fire(message, '', status)


}
    
    }
</script>


<?php
include("footer.php"); ?>