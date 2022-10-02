document.body.addEventListener("click", ()=>{
    $.ajax({
        url:"userStatusChecker.php",
        method: "POST",
        data:{
            flagstatus : 1
        },
        success: ()=>{

        }
    })
});