var announcement, announcement_status, update_id, statuschecker;


$('#announce_content').keyup(function(){
    announcement = $('#announce_content').val();
    console.log(announcement)
})
$('#status').click(function(){
    statuschecker = document.querySelector('#status').checked;
    if(statuschecker == true){
        announcement_status = 1;
    }
    else{
        announcement_status = 0;
    }
})


$('#announcement_form').submit(function(e){
        e.preventDefault();
        e.stopPropagation(); 
        console.log(announcement_status)
        console.log(announcement)
        $.ajax({
            url: "announcement-process.php",
            method: "get",
            dataType: 'json',
            data: {
                announcement: announcement,
                announcement_status: announcement_status
            },
            success: function(announcement_result){
                if(announcement_result.status){
                    toastr.success(announcement_result.message);
                    display_announcement_table();
                }
            }
        });
})

$('#updateBTN').click(function(){
    update_id = $('#update_id').val();
    announcement = $('#announce_content').val();
    statuschecker = document.querySelector('#status').checked;
    announcement_status = $('#announcement_status').val();
    if(statuschecker == true){
        announcement_status = 1;
    }
    else{
        announcement_status = 0;
    }
    console.log(announcement)
    console.log(announcement_status)
    $.ajax({
        url: "announcement-process.php",
        method: "get",
        dataType: 'json',
        data: {
            update_id: update_id,
            updated_announcement: announcement,
            updated_status: announcement_status
        },
        success: function(updated_result){
            console.log(updated_result)
            if(updated_result.status){
                toastr.success(updated_result.message);
                $('#announce_content').value = '';
                document.getElementById("status").checked = false;
                display_announcement_table();
            }
        }
    });
})

function display_announcement_table(){
    document.getElementById("updateBTN").disabled = true;
    document.getElementById("saveBTN").disabled = false;
    var table = 1;
    $.ajax({
        url: "announcement-process.php",
        method: "GET",
        dataType: 'html',
        data:{
            displaytable : table
        },
        success: function(table_response){
            $('#announcement_table').html(table_response)
            console.log(table_response)
        }
    });
}
function delete_announcement(id){
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            url: "announcement-process.php?delete_announcement="+ id,
            method: "GET",
            dataType: 'json',
            success: function(delete_result){
                if(delete_result.status){
                    toastr.error(delete_result.message);
                    display_announcement_table();
                }
            }
        });
    }else{
     alert('ok');
    }
}

function update_announcement(id){
    document.getElementById("updateBTN").disabled = false;
    document.getElementById("saveBTN").disabled = true;
    console.log("casdasd")
    $.ajax({
        url : "announcement-process.php?update_announcement="+ id,
        method: "GET",
        dataType : 'json',
        beforeSend : function() {
            toastr.info("Please wait..");
        },
        success : function(update_result ) {
            console.log(update_result)
           // alert('ok2');
            if (update_result.status) { //if response status is true show success message
                $("#announce_content").val(update_result.data.announcement);
                $("#update_id").val(update_result.data.id);
                if(update_result.data.status == "1"){
                    document.getElementById("status").checked = true;
                }
                console.log("casdasd")
              //  setTimeout(function(){ alert(response.message);window.location.reload(); }, 3000);
            }else{
              //  alert(response.message);
            }
        }
    });
}
display_announcement_table();