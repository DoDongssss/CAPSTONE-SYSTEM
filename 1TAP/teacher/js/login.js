
const user = document.getElementById('user');
const pass = document.getElementById('pass');
const loginBtn = document.getElementById('login-form');
const userIcon = document.getElementById('user-icon');
const passIcon = document.getElementById('pass-icon');

loginBtn.addEventListener("submit", (e)=>{
    e.preventDefault();
    e.stopPropagation();

    let userData = user.value;
    let passData = pass.value;

    $.ajax({
        url: "login-process.php",
        method: "POST",
        dataType: 'json',
        data:{
            user: userData,
            pass: passData
        },
        success: (loginResult)=>{
            if(loginResult.status){
                toastr.success(loginResult.message);
                $.ajax({
                    url: "login-process.php",
                    method: "POST",
                    data:{
                        sessionActive: 1
                    },
                    success: ()=>{

                    }
                });
                window.location.replace("index.php");
            }
            else{
                toastr.error(loginResult.message);
                userIcon.style.borderLeft = "3px solid red";
                passIcon.style.borderLeft = "3px solid red";
            }
        }
    })
})
