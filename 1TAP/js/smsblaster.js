var byGrade, bySection, category,sms;

$('#category').change(function(){
    category = $('#category').val();
    searchFilter();
})
$('#byGrade').change(function(){
    byGrade = $('#byGrade').val();
    sectionFilter();
})
$('#bySection').change(function(){
    bySection = $('#bySection').val();
})
$('#sms').keyup(function(){
    sms = $('#sms').val();
    console.log(sms)
    console.log(sms.length)
    const smschars = "<span> " + sms.length + "/150 characters</span>";
    $('#characters').html(smschars)
})

function searchFilter(){
    if(category){
        if(category == "section"){
            document.getElementById("byGrade").disabled = true;
            document.getElementById("bySection").disabled = false;
            $('#byGrade').val( $('#byGrade').find("option[selected]").val());
            console.log("VALUE", byGrade)
            byGrade = '';
            $.ajax({
                url: "smsblaster-process.php?bySection='1'",
                method:"GET",
                success: function(bySection_response){
                    console.log(bySection_response);
                    $('#bySection').html(bySection_response);
                }
            });
        }
        else if(category == "grade"){
            document.getElementById("bySection").disabled = true;
            document.getElementById("byGrade").disabled = false;
            $('#bySection').val( $('#bySection').find("option[selected]").val());
            bySection = '';
            console.log("VALUE", bySection)
            $.ajax({
                url: "smsblaster-process.php?byGrade='1'",
                method: "GET",
                success: function(byGrade_response){
                    $('#byGrade').html(byGrade_response);
                }
            });
        }
        else{
            console.log(byGrade)
            document.getElementById("bySection").disabled = true;
            document.getElementById("byGrade").disabled = true;
            console.log("natirgsadsa")
            $.ajax({
                url: "smsblaster-process.php?allSection='1'",
                method:"GET",
                success: function(bySection_response){
                    console.log(bySection_response);
                    $('#bySection').html(bySection_response);
                }
            });
            $.ajax({
                url: "smsblaster-process.php?allGrade='1'",
                method:"GET",
                success: function(byGrade_response){
                    console.log(byGrade_response);
                    $('#byGrade').html(byGrade_response);
                }
            });
        }
    }
    else{

    }
} 

function sectionFilter(){
    if(byGrade){
        $.ajax({
            url: "smsblaster-process.php",
            method:"GET",
            data:{
                gradeid: byGrade
            },
            success: function(SectionFilter_response){
                console.log(SectionFilter_response);
                $('#bySection').html(SectionFilter_response);
            }
        });      
    }
}

$('#smsblaster-form').submit(function(e){
    e.preventDefault();
    e.stopPropagation();
    console.log("clikedd")
    if(category == "ALL"){
        smsdata = {
            "data1": sms
        };
        console.log(category)
        sendSMS();
    }
    else if(category == "grade"){
        smsdata = {
            "data1": sms,
            "data2": byGrade
        };
        sendSMS();

    }
    else if(category == "section"){
        smsdata = {
            "data1": sms,
            "data2": bySection
        };
        sendSMS();
    }
})

function sendSMS(){
    var  jsondata = JSON.stringify(smsdata);
    $.ajax({
        url: "smsblaster-process.php",
        method: "POST",
        data: {
            data: jsondata,
            smstrigger: 1,
            category1: category
        },
        success: function(number){
            console.log(number)
        }
    });
}