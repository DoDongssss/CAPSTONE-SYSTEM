var rfidid;

// $('#rfidid').load("cardidcontainer.php");
// // INTERVAL 1 IS TO GET THE LIVE RFID ID WHEN TAPPING
// interval1 = setInterval(function() {
//     console.log($('#rfidid').val())
//     rfidid = $('#rfidid').val();
//     if(rfidid != ''){
//         console.log("clickeddd")
//     }
// $('#rfidid').load("cardidcontainer.php");
// }, 100);

$(document).ready(function(){
    function studentid(){
        $.ajax({
            url: "",
            method: "POST",
            data:{
                action: 'default'
            },
            success: function(){

            }
        })
    }
});

function announcement(){
    console.log("clicked")
    $.ajax({
        url: "attendance-process.php?getannouncement='1'",
        method: "GET",
        dataType: 'html',
        success: function(announcement_response){
            console.log(announcement_response)
            $('#announcement').html(announcement_response)
        }
    });
}

announcement();

function displayStudentInfo(){
    // $.ajax({
    //     url: "attendance-data-process.php?cardid='1'",
    //     type: "get",
    //     success: function(attendanceResult){
    //         if(attendanceResult.status){
    //             console.log("dsadasdas",attendanceResult)
    //         }
    //         else{
    //             console.log(attendanceResult)
    //         }
    //     },
    //     error: function (xhr, statusText, err) {
    //         alert("error"+xhr.status);
    //     }
    // });

    $.get("student-attendance-process.php", function(data, status){

        var parseJData = JSON.parse(data);
        console.log(parseJData);
            console.log("check", parseJData);
            if(parseJData.status){
                $("#student-profile").attr('src',"studentprofile/"+ parseJData.studentInfo.profile);
                $('#lrn').val(parseJData.studentInfo.LRN);
                $('#name').val(parseJData.studentInfo.lastname +" "+ parseJData.studentInfo.firstname +" "+ parseJData.studentInfo.MI);
                $('#grade').val(parseJData.studentInfo.grade);
                $('#section').val(parseJData.studentInfo.section);
                $('#time').val(parseJData.studentTime);
                $('#date').val(parseJData.studentDate);
            }
            else{
                console.log("error")
            }
    });
}
displayStudentInfo();
setInterval(()=>{displayStudentInfo()}, 1000);