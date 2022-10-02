
window.onload = function(){
    checkCurrentPage()
}
function checkCurrentPage(){
    $('#active').addClass("active");
};

$(document).ready(function(){
    $('#user').click(function(){
        $('#dropdown-user').toggleClass("active");
        console.log("click")
    })
})

$('#nav-toggle').click(function(){
    $('#sidebar-toggle').toggleClass("toggle");
    $('#content-toggle').toggleClass("toggle");
})