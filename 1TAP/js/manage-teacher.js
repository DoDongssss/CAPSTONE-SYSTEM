var pass,repass,searchid;

$('#add-teacher').click(function(e){
    e.preventDefault();
    showModal();
    $("#form-teacher-modal")[0].reset();
    $('#password').css("border", "1px solid #cccccc");
    $('#re-password').css("border", "1px solid #cccccc");
});

$('#modalClose').click(function(){
    hideModal();
});

// Do nothing when clicking on the modal content
$('.modal-content').click(function(event){
   event.stopPropagation(); 
});

function showModal(){
$('#teacher-modal').fadeIn('fast');
    (function fun(){
        $('.modal-content').css({'transform':'translateY(-50px)','opacity':'1'});
    })();
}

function hideModal(){
$('#teacher-modal').fadeOut('fast');
    (function fun2(){
        $('.modal-content').css({ 'opacity':'0' });
    })();
}


$('#form-teacher-modal').submit(function(e){
    console.log($('#form-teacher-modal').serialize())
    var pass, repass;
    e.preventDefault();
    e.stopPropagation(); 
    pass = $('#password').val();
    repass = $('#re-password').val();

    if(pass != repass){
        toastr.error("Password mismatch");
        $('#password').css("border", "1px solid red");
        $('#re-password').css("border", "1px solid red");
    }
    else if(pass.length < 8 && repass.length < 8){
        toastr.error("Password less than 8 characters");
        $('#password').css("border", "1px solid red");
        $('#re-password').css("border", "1px solid red");
    }
    else if(pass.length > 16 && repass.length > 16){
        toastr.error("Password more than 16 characters");
        $('#password').css("border", "1px solid red");
        $('#re-password').css("border", "1px solid red");
    }
    else{
        $.ajax({
            url: "manage-teacher-process.php",
            method: "POST",
            dataType: 'json',
            data: $('#form-teacher-modal').serialize(),
            success: function(addTeacher_result){
                console.log(addTeacher_result)
                if(addTeacher_result.status){
                    toastr.success(addTeacher_result.message);
                    $("#form-teacher-modal")[0].reset();
                    hideModal();
                    display_teachertable();
                }
                else{
                    toastr.success(addTeacher_result.message);
                }
            }
        })
    }

})

function display_teachertable(){
    if(!searchid){
        $.ajax({
            url: "manage-teacher-process.php?get-teacher=1",
            method: "GET",
            dataType: 'html',
            success: function(response){
                $('#teacher-table').html(response);
            }
        })
    }
    else{
        $.ajax({
            url: "manage-teacher-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                search_teacher: searchid
            },
            success: function(response){
                $('#teacher-table').html(response);
            }
        });
    }
}
$('#searchid').keyup(function(){
    searchid = $('#searchid').val();
    display_teachertable();
})
display_teachertable();

function delete_teacher(id){
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            type : "GET",
            url: "manage-teacher-process.php?delete-teacher="+id,
            dataType : 'json',
            beforeSend : function() {
                toastr.info("Please wait..");
            },
            success : function(delete_teacher_result) {
                console.log(delete_teacher_result);
                if (delete_teacher_result.status) { //if response status is true show success message
                     toastr.warning(delete_teacher_result.message);
                     display_teachertable();
                }else{
                  //  alert(response.message);
                }
            }
        });
    }else{
     alert('ok');
    }
}

function update_teacher(id){
    $.ajax({
        type : "GET",
        url : "manage-teacher-process.php?update_teacher="+id,
        dataType : 'json',
        beforeSend : function() {
            toastr.info("Please wait..");
        },
        success : function(update_teacher_result ) {
           // alert('ok2');
            if (update_teacher_result.status) { //if response status is true show success message
                $("#updateid").val(update_teacher_result.data.id);
                $("#id").val(update_teacher_result.data.teacherid);
                $("#email").val(update_teacher_result.data.email);
                $("#password").val(update_teacher_result.data.password);
                $("#re-password").val(update_teacher_result.data.repassword);
                $("#mobile").val(update_teacher_result.data.mobile);
                $("#lastname").val(update_teacher_result.data.lastname);
                $("#firstname").val(update_teacher_result.data.firstname);
                showModal();
              //  setTimeout(function(){ alert(response.message);window.location.reload(); }, 3000);
            }else{
              //  alert(response.message);
            }
        }
    });
}

