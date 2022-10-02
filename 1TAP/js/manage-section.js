var hasGrade,hasSection,hasGrade_modal;

// DISPLAY DATA IN TABLE
function table_data(){
    if(hasGrade == '' || !hasGrade){
        $.ajax({
            url: "gradelevel-table.php?getall_grade=1",
            method: "GET",
            dataType: 'html',
            success: function(response){
                $('#grade-level').html(response);
            }
        });
    }
    else if(hasGrade != ''){
        $.ajax({
            url: "gradelevel-table.php",
            method: "GET",
            dataType: 'html',
            data: {
                specificGrade:hasGrade
            },
            success: function(response){
                $('#grade-level').html(response);
            }
        });
    }
}

// DISPLAY THE GRADE IN DROPDOWN
function allgrade(){
    $.ajax({
        url: "grade.php?grade=1",
        method: "GET",
        dataType: 'html',
        success: function(response){
            $('#grade').html(response);
        }
    });
}
table_data();
allgrade();

// GET THE VALUE OF GRADE AND SECTION
$('#grade').change(function(){
    hasGrade = $('#grade').val();
    table_data();
    console.log(hasGrade);
});$('#section').keyup(function(){
    hasSection = $('#section').val();
    console.log(hasSection);
});

// GET THE VALUE OF GRADE LEVEL IN INPUT MODAL
$('#add_gradelevel-modal').keyup(function(){
    hasGrade_modal = $('#add_gradelevel-modal').val();
    // DISABLE THE UPDATE BUTTON IF THE INPUT GRADE IS == BLANK OR NULL
    if(hasGrade_modal == '' || hasGrade_modal == null){
        document.getElementById("update_btn").disabled = true;
        document.getElementById("save_btn").disabled = false;
    }
})

$(document).ready(function(){
    // ADD GRADE LEVEL AND SECTIONL
    $('#form-grade').submit(function(e){
        e.preventDefault();
        e.stopPropagation(); 
        console.log(hasGrade);
        console.log(hasSection);
        $.ajax({
            url: "grade.php",
            method: "POST",
            dataType: 'json',
            data: {
                hasGrade: hasGrade,
                hasSection: hasSection
            },
            success: function(add_gradelevel){  
                if(add_gradelevel.status == true){
                    toastr.success(add_gradelevel.message);
                    document.getElementById("section").value = '';
                    table_data();
                }else{
                    toastr.warning(add_gradelevel.message);
                }
            }
        });
    
    });
    // ADD GRADE LEVEL IN MODAL
    $('#modal-grade-form').submit(function(e){
        e.preventDefault();
        e.stopPropagation(); 
        console.log()
        $.ajax({
            url: "grade.php",
            method: "GET",
            dataType: 'json',
            data: {
                hasGrade_modal: hasGrade_modal
            },
            success: function(gradelevel_result){
                if(gradelevel_result.status == true){
                    toastr.success(gradelevel_result.message);
                    document.getElementById("add_gradelevel-modal").value = '';
                    grade_modal_table();
                }else{
                    toastr.warning(gradelevel_result.message);
                }
            }
        })
    })
});

$('#add_gradelevel').click(function(){

});

// DELETE GRADE LEVEL AND SECTION
function delete_gradelevel(id){
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            type : "GET",
            url : "gradelevel-table.php?delete_id="+id,
            dataType : 'json',
            beforeSend : function() {
                toastr.info("Please wait..");
            },
            success : function(delete_gradelevel) {
                console.log(delete_gradelevel);
                if (delete_gradelevel.status) { //if response status is true show success message
                     toastr.warning(delete_gradelevel.message);
                     table_data();
                }else{
                  //  alert(response.message);
                }
            }
        });
    }else{
     alert('ok');
    }
}
// DELETE GRADELEVEL MODAL
function delete_gradelevel_modal(id){
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            type : "GET",
            url : "gradelevel-table.php?delete_modal_id="+id,
            dataType : 'json',
            beforeSend : function() {
                toastr.info("Please wait..");
            },
            success : function(delete_gradelevel_modal_result) {
                console.log(delete_gradelevel_modal_result);
                if (delete_gradelevel_modal_result.status) { //if response status is true show success message
                     toastr.warning(delete_gradelevel_modal_result.message);
                     grade_modal_table()
                }else{
                  //  alert(response.message);
                }
            }
        });
    }else{
     alert('ok');
    }
}

// UPDATE GRADE LEVEL AND SECTION
function update_gradelevel(){
    
}

// UPDATE GRADE LEVEL MODAL
function update_gradelevel_modal(id){
    $.ajax({
        url: "gradelevel-table.php?update_modal_id="+id,
        dataType: 'json',
        method: "GET",
        beforeSend : function() {
            toastr.info("Please wait..");
        },
        success : function(edit_grade_result ) {
            // DISABLE THE SAVE BUTTON IF THE UPDATE IS TRIGGERED
            document.getElementById("update_btn").disabled = false;
            document.getElementById("save_btn").disabled = true;
           // alert('ok2');
            if (edit_grade_result.status) { //if response status is true show success message
                $("#add_gradelevel-modal").val(edit_grade_result.data.grade);
                $("#grade_id").val(edit_grade_result.data.id);
            }else{
              //  alert(response.message);
            }
        }
    });
}
// UPDATE THE GRADE IN THE DATABASE MODAL
function update_btn_grade_modal(){
    console.log("naclick ko")
    var grade_id = $('#grade_id').val();
    $.ajax({
        type : "get",
        url : "gradelevel-table.php",
        dataType : 'json',
        data: {
            updateGrade: hasGrade_modal,
            grade_id: grade_id
        },
        success : function(update_gradelevel_result) {
            console.log(update_gradelevel_result);
            if (update_gradelevel_result.status) { //if response status is true show success message
                 toastr.success(update_gradelevel_result.message);
                 grade_modal_table()
            }else{
              //  alert(response.message);
              toastr.warning(update_gradelevel_result.message);
            }
        }
    });
}

// MODAL SECTION
$('#add-grade').click(function(e){
    e.preventDefault();

    // DISABLE THE UPDATE BUTTON IF UPDATE IS NOT TRIGGERED
    document.getElementById("update_btn").disabled = true;
    document.getElementById("save_btn").disabled = false;

    console.log("diri na guys")
    showModal();
    grade_modal_table();
});

$('#modalClose').click(function(){
    hideModal();
});

// Do nothing when clicking on the modal content
$('.modal-content').click(function(event){
   event.stopPropagation(); 
});

function showModal(){
$('#grade-modal').fadeIn('fast');
    (function fun(){
        $('.modal-content').css({'transform':'translateY(-50px)','opacity':'1'});
    })();
}

function hideModal(){
$('#grade-modal').fadeOut('fast');
    (function fun2(){
        $('.modal-content').css({ 'opacity':'0' });
    })();
}

// TO DISPLAY THE GRADE IN MODAL TABLE
function grade_modal_table(){
    console.log("naa diri dapit");
    $('#grade-modal-table')
    $.ajax({
        url: "grade.php?grade_modal_table=1",
        dataType: 'html',
        method: "GET",
        success: function(response){
            console.log(response);
            $('#modal-grade-table').html(response);
        }
    });
}