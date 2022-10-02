var dateOne, dateTwo, grade, section, search;

$('#date_one').change(function(){
    dateOne = $('#date_one').val();
    displayRecords();
});
$('#date_two').change(function(){
    dateTwo = $('#date_two').val();
    displayRecords();
});
$('#records_grade').change(function(){
    grade = $('#records_grade').val();
    displayRecords();
    getSections();
    sectionStatus();
})
$('#records_section').change(function(){
    section = $('#records_section').val();
    displayRecords();
})
$('#records_search').keyup(function(){
    search = $('#records_search').val();
    displayRecords();
})



function displayRecords(){
    if(dateOne && dateTwo && !grade && !section && !search){
        console.log("1")
        $.ajax({
            url: "records-process.php",
            method: "POST",
            data:{
                dateOnly : 1,
                dateOne : dateOne,
                dateTwo : dateTwo
            },
            success: function(records){
                console.log(records);
                $('#records-table').html(records);
            }
        });
    }
    else if(!dateOne && !dateTwo && !grade && !section && search){
        console.log("1")
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                findOnly: 1,
                search: search,
            },
            success: function(records){
                $('#records-table').html(records);
            }
        });
    }
    else if(dateOne && dateTwo && !grade && !section && search){
        console.log("1.2")
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                find: 1,
                search: search,
                dateOne: dateOne,
                dateTwo: dateTwo
            },
            success: function(records){
                $('#records-table').html(records);
            }
        });
    }
    else if(dateOne && dateTwo && grade && !section && !search){
        console.log("2")
        console.log("GRADE", grade)
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                dateGrade: 1,
                dateOne: dateOne,
                dateTwo: dateTwo,
                grade: grade
            },
            success: function(records){
                $('#records-table').html(records);
            }
        });
    }
    else if(dateOne && dateTwo && grade && section && !search){
        console.log("3")
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            data: {
                dateGradeLevel: 1,
                dateOne: dateOne,
                dateTwo: dateTwo,
                grade: grade,
                section: section
            },
            success: function(records){
                $('#records-table').html(records);
            }
        });
    }
    else if(dateOne && dateTwo && grade && section && search){
        console.log("4")
        $.ajax({
            url: "records-process.php",
            method: "POST",
            dataType: 'html',
            
            success: function(records){
                $('#records-table').html(records);
            }
        });
    }
    else{
        console.log("5")
        $.ajax({
            url: "records-process.php?getRecords='1'",
            method: "GET",
            dataType: "html",
            success: function(records){
                $('#records-table').html(records);
            }
        });
    }
}
displayRecords();
setInterval(()=>{displayRecords();}, 1000);

function getGrades(){
    $.ajax({
        url: "records-process.php?getGrades='1'",
        method: "GET",
        dataType: 'html',
        success: function(records_grade){
            $('#records_grade').html(records_grade);
        }
    });
}
function getSections(){
    console.log("SEction")
    $.ajax({
        url: "records-process.php",
        method: "POST",
        dataType: 'html',
        data: {
            getSections: grade
        },
        success: function(recrods_section){
            console.log("Section", recrods_section)
            $('#records_section').html(recrods_section);
        }
    });
}
document.getElementById('records_section').disabled = true;
function sectionStatus(){
    if(grade == ''){
        document.getElementById('records_section').disabled = true;
        grade = '';
    }else{
        document.getElementById('records_section').disabled = false;
    }
}
getGrades();

function delete_attendance(id){
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            type : "GET",
            url : "records-process.php?delete_id="+id,
            dataType : 'json',
            beforeSend : function() {
                toastr.info("Please wait..");
            },
            success : function(delete_attendance_result) {
                console.log(delete_attendance_result);
                if (delete_attendance_result.status) { //if response status is true show success message
                     toastr.warning(delete_attendance_result.message);
                     displayRecords();
                }else{
                  //  alert(response.message);
                }
            }
        });
    }else{
     alert('ok');
    }
}
function delelete_attendance(id){
    
}