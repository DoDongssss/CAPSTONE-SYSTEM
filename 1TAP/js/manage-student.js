var hasGrade, hasSection, hasSearch, cGrade, cSection;
        // MANAGE STUDENT TABLE SEARCH FILTER
        function get_grade(){
            hasGrade = $("#grade").val(); 
            console.log(hasGrade);
            search_filter_ajax();
        }
        function get_section(){
            hasSection = $("#section").val();
            console.log(hasSection);
            search_filter_ajax();
        }

        function get_search(){
            hasSearch = $("#search").val();
            console.log(hasSearch);
            search_filter_ajax();
        }

        // ADD STUDENT MODAL GRADE AND SECTION
        function add_grades(){
            cGrade = $('#add_grade').val();
            console.log(cGrade);
            add_modal_ajax();
        }
        function add_sections(){
            cSection = $('#add_section').val();
        }

        function add_modal_ajax(){
            if(!cGrade){
                document.getElementById("add_section").selectedIndex = 0; 
            }else if(cGrade){
                document.getElementById("add_section").disabled = false;
                
                // DISPLAY THE SECTION OF SPECIFIC GRADE//
                console.log("diri kol");
                $.ajax({
                    url: "search-filter-table.php",
                    method: "POST",
                    data:{
                        hasGrade : cGrade
                    },
                    success: function(get_sections){
                        console.log(get_sections);
                        $('#add_section').html(get_sections);
                    }
                });
            }
        }
        function search_filter_ajax(){
            if(hasGrade == "ALL" && !hasSearch && hasSection && hasSection != "ALL" || !hasGrade  && hasSection != "ALL" && !hasSearch && hasSection){
                $.ajax({
                    url: "student-table.php",
                    method: "POST",
                    data: {
                        section_only: hasSection 
                    },
                    success: function(response){
                        $("#student-data").html(response);
                    }
                });
                if(hasGrade && hasGrade != "ALL" && hasSection){
                    // DISPLAY THE SECTION OF SPECIFIC GRADE//
                    $.ajax({
                        url: "search-filter-table.php",
                        method: "POST",
                        data:{
                            hasGrade : hasGrade
                        },
                        success: function(get_sections){
                            console.log(get_sections);
                            $('#section').html(get_sections);
                        }
                    });
                    // DISPLAY THE SECTION OF SPECIFIC GRADE//
                }
                // $("#section option:selected").prop("selected",false);
                console.log("diri jud kol 1")
                return null;
            }
            else if(hasGrade && hasGrade != "ALL" && !hasSection && !hasSearch ||hasGrade && hasGrade != "ALL" && hasSection =="ALL" && !hasSearch){
                $.ajax({
                    url: "student-table.php",
                    method: "POST",
                    data: {
                        grade_only: hasGrade
                    },
                    success: function(response){
                        $("#student-data").html(response);
                    }
                });
                // DISPLAY THE SECTION OF SPECIFIC GRADE//
                $.ajax({
                    url: "search-filter-table.php",
                    method: "POST",
                    data:{
                        hasGrade : hasGrade
                    },
                    success: function(get_sections){
                        console.log(get_sections);
                        $('#section').html(get_sections);
                    }
                });
                // DISPLAY THE SECTION OF SPECIFIC GRADE//
                console.log("diri jud kol 2")
                return null;
            }
            else if(hasGrade != "ALL" && hasSection != "ALL" && !hasSearch && hasGrade && hasSection){
                $.ajax({
                    url: "student-table.php",
                    method: "POST",
                    data: {
                        section: hasSection,
                        grade: hasGrade
                    },
                    success: function(response){
                        $("#student-data").html(response);
                    }
                });
                
                console.log("diri jud kol 3")
                return null;
            }
            else if(hasSearch && !hasGrade && !hasSection || hasSearch && hasGrade == "ALL" && hasSection == "ALL" || hasSearch && hasGrade == "ALL" && !hasSection || hasSearch && !hasGrade && hasSection == "ALL"){
                console.log(hasSection);
                console.log(hasGrade);
                $.ajax({
                    url: "student-table.php",
                    method: "POST",
                    data: {
                        search: hasSearch,
                        section: hasSection,
                        grade: hasGrade
                    },
                    success: function(response){
                        $("#student-data").html(response);
                    }
                });
                console.log("diri jud kol 4")
                return null;
            }
            else if(hasSearch && hasGrade && !hasSection || hasSearch && hasGrade != "ALL" && hasSearch == "ALL" && hasGrade){
                console.log(hasSection);
                console.log(hasGrade);
                $.ajax({
                    url: "student-table.php",
                    method: "POST",
                    data: {
                        search: hasSearch,
                        grade: hasGrade
                    },
                    success: function(response){
                        $("#student-data").html(response);
                    }
                });
                console.log("diri jud kol 5")
                return null;
            }
            else if(hasSearch && !hasGrade && hasSection || hasSearch && hasGrade == "ALL" && hasSection != "ALL"){
                console.log(hasSection);
                console.log(hasGrade);
                $.ajax({
                    url: "student-table.php",
                    method: "POST",
                    data: {
                        section: hasSection,
                        search: hasSearch
                    },
                    success: function(response){
                        $("#student-data").html(response);
                    }
                });
                console.log("diri jud kol 6")
                return null;
            }
            else if(hasSearch && hasGrade && hasSection && hasSection != "ALL" && hasGrade != "ALL"){
                console.log(hasSection);
                console.log(hasGrade);
                console.log(hasSearch);
                $.ajax({
                    url: "student-table.php",
                    method: "POST",
                    data: {
                        search: hasSearch,
                        section: hasSection,
                        grade: hasGrade
                    },
                    success: function(response){
                        console.log(response)
                        $("#student-data").html(response);
                    }
                });
                console.log("diri jud kol 7")
                return null;
            }
            else{
                var all = 1;
                $.ajax({
                    url: "student-table.php",
                    method: "POST",
                    data: {
                        all: all
                    },
                    success: function(response){
                        $("#student-data").html(response);
                    }
                });
                if(hasGrade && hasSection == "ALL" || hasGrade && !hasSection){
                // DISPLAY THE SECTION OF SPECIFIC GRADE//
                $.ajax({
                    url: "search-filter-table.php",
                    method: "POST",
                    data:{
                        hasGrade : hasGrade
                    },
                    success: function(get_sections){
                        console.log("dia ra guysss",get_sections);
                        $('#section').html(get_sections);
                    }
                });
                // DISPLAY THE SECTION OF SPECIFIC GRADE//
                }
                console.log("diri jud kol 8")
                return null;
            }
        }
        console.log(hasGrade);
        console.log(hasSection);
        add_modal_ajax();
        search_filter_ajax();

// DISPLAY THE SECTION WHEN GRADE VALUE IS = ALL


//         $("button").mouseleave(
//     function() {
//       $(this).removeClass("hover");
//     }
//   );

// // MODAL
// USER INTERVAL TO LIVE DISPLAY THE RFID ID
var interval1, interval2;
	$('#add-student-btn').click(function(event){
		showModal();
        document.getElementById("add_section").disabled = true;
        $("#display-img").attr('src',"studentprofile/studentprofile.png");
        $("#student-form")[0].reset();
		event.stopPropagation(); 
        $('#rfidcard').load("cardidcontainer.php");
		
        // INTERVAL 1 IS TO GET THE LIVE RFID ID WHEN TAPPING
        interval1 = setInterval(function() {
        $('#rfidcard').load("cardidcontainer.php");
        }, 100);

        // INTERVAL 2 IS TO TRANSFER THE RFID ID, FROM TEXTAREA TO INPUT
        interval2 = setInterval(function(){
            let rfidcardid = $('#rfidcard').val();
            document.getElementById("rfidcardid").value = rfidcardid;
        }, 500);
        
	});
	$('#modalClose').click(function(){
		hideModal();
	});
	
	// Do nothing when clicking on the modal content
	$('.modal-content').click(function(event){
       event.stopPropagation(); 
    });

function showModal(){
	$('#student-modal').fadeIn('fast');
		(function fun(){
			$('.modal-content').css({'transform':'translateY(-50px)','opacity':'1'});
		})();
}

function hideModal(){
	$('#student-modal').fadeOut('fast');
		(function fun2(){
			$('.modal-content').css({ 'opacity':'0' });
		})();
}

// ADD STUDENT FUNCTION

$(document).ready(function() {

    // $('#rfidcard').load("cardidcontainer.php");
	// 	setInterval(function() {
    // $('#rfidcard').load("cardidcontainer.php");
	// }, 100);

    // setInterval(function(){
    //     let rfidcardid = $('#rfidcard').val();
    //     document.getElementById("rfidcardid").value = rfidcardid;
    // }, 500);
    
    $('#student-form').submit(function(e){
        e.preventDefault();
        e.stopPropagation();

        console.log("value of id:" ,$('#id').val())
        var form = $('#student-form')[0];
        var formdata = new FormData(form);

        console.log(form);
        console.log(formdata);
        formdata.set("profile", selectedimgurl)

        $.ajax({
            url: "student-process.php",
            method: "POST",
            contentType: false,
            processData: false,
            data: formdata,
            dataType: 'json',
            success: function(addstudent_result){
                console.log("naa diri guys?",addstudent_result);
                if(addstudent_result.status == true){
                    $("#student-form")[0].reset();
                    toastr.success(addstudent_result.message);
                    search_filter_ajax();
                }else{
                    toastr.error(addstudent_result.message);
                }
            },
            error: function(ts) { console.log(ts.responseText) }
        });
    });
});


// UPLOAD IMG BTN
// let selectedimgurl is to put the url of the image. use this to set the image
let selectedimgurl = "";
const upload = document.querySelector("#student-profile");
const img = document.querySelector("#display-img");
$("#student-profile").change(function(){
    // console.log("this file nii", this.files[0].name);
    selectedimgurl = this.files[0].name;
})

$('#img-browse').click(function(){
    upload.click();
})
upload.addEventListener("change", function(){
    const file = this.files[0];
    if(file){
        const reader = new FileReader();
        reader.onload = function(){
            const result = reader.result;
            img.src = result;
        }
        reader.readAsDataURL(file);
        console.log();
    }
})


// PREVENT THE DEFAULT SUBMIT IN FORM DISPLAY STUDENT TABLE
$(document).ready(function(){
    $('#display_student_form').submit(function(e){
        e.preventDefault();
    })
})


// DELETE STUDENT FUNCTION
function delete_student(id){
    console.log(id);
    console.log("delete na choy")
    if(confirm("Are you sure? You want to delete this record?")){
        $.ajax({
            type : "GET",
            url : "student-process.php?delete_id="+id,
            dataType : 'json',
            beforeSend : function() {
                toastr.info("Please wait..");
            },
            success : function(delete_student) {
                console.log(delete_student);
                if (delete_student.status) { //if response status is true show success message
                     toastr.warning(delete_student.message);
                     search_filter_ajax();
                }else{
                  //  alert(response.message);
                }
            }
        });
    }else{
     alert('ok');
    }
}

// UPDATE STUDENT FUNCTION
function update_student(id){
    clearInterval(interval1);
    clearInterval(interval2);
    document.getElementById("add_section").disabled = false;
    $.ajax({
        type : "GET",
        url : "student-process.php?edit_id="+id,
        dataType : 'json',
        beforeSend : function() {
            toastr.info("Please wait..");
        },
        success : function(edit_student ) {
           // alert('ok2');
            console.log("diri ni siya", edit_student);
            if (edit_student.status) { //if response status is true show success message
                console.log($("#rfidcardid").val());
                $("#id").val(edit_student.data.id);
                $("#rfidcardid").val(edit_student.data.RFID);
                $("#rfidid").val(edit_student.data.RFID);
                $("#lrn").val(edit_student.data.LRN);
                $("#lastname").val(edit_student.data.lastname);
                $("#firstname").val(edit_student.data.firstname);
                $("#mi").val(edit_student.data.MI);
                $("#birthdate").val(edit_student.data.birthdate);
                $("#gender").val(edit_student.data.gender);
                $("#add_grade").val(edit_student.data.grade);
                $("#add_section").val(edit_student.data.section);
                $("#gurdian").val(edit_student.data.parent);
                $("#mobile").val(edit_student.data.parentno);
                $("#address").val(edit_student.data.address);
                $("#display-img").attr('src',"studentprofile/"+ edit_student.data.profile);
                $("#display-img").attr('src');
                selectedimgurl = edit_student.data.profile;
                console.log("diri sa",$('#id').val())
                showModal();
              //  setTimeout(function(){ alert(response.message);window.location.reload(); }, 3000);
            }else{
              //  alert(response.message);
            }
        }
    });
}