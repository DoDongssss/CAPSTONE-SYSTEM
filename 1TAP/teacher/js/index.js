const openUserOption = document.getElementById('openUserOption');
const smsBtnActive = document.getElementById('smsBtnActive');
const smsBtnRemove = document.getElementById('smsBtnRemove');
const smsActive = document.getElementById('smsActive');
const notificationActive = document.getElementById("notificationActive");

openUserOption.addEventListener("click", ()=>{
    const userOption = document.getElementById('userOption');
    userOption.classList.toggle("active");
})
smsBtnActive.addEventListener("click", ()=>{
    smsActive.classList.add("active");
})
smsBtnRemove.addEventListener("click", ()=>{
    smsActive.classList.remove("active");
})
notificationActive.addEventListener("click", ()=>{
    const notifications =document.getElementById("notifications");
    notifications.classList.toggle("active");
})

const preloader = document.getElementById('pre-loader');

window.addEventListener("load", ()=>{
    preloader.style.display = "none";
})

const logout = document.getElementById('logout');

logout.addEventListener("click", ()=>{
    $.ajax({
        url: "login-process.php",
        method: "POST",
        data:{
            sessionDestroy: 1
        },
        success: ()=>{

        }
    })
    location.replace("login.php");
})

function bubbleGreetings(){
    const greetings = document.getElementById('greetings');
    $.ajax({
        url: "login-process.php?getBubble='1'",
        method: "GET",
        dataType: 'html',
        success: (result)=>{
            greetings.innerHTML = result;
        }
    })
}

bubbleGreetings();

// navigation
const dashboard = document.getElementById('dashboard');

dashboard.addEventListener("click", ()=>{
    location.href = 'dashboard.php';
})



// SEND FEEDBACK
const textLenght = document.getElementById('textLenght');
const feedbackSMS = document.getElementById('feedbackSMS');
let rateVal = 0;
let feedSMS = '';
feedbackSMS.addEventListener('keyup', ()=>{
    textLenght.innerHTML = feedbackSMS.value.length + "/150";
    feedSMS = feedbackSMS.value;
    // if(feedbackSMS.value.length === 150){
    //     feedbackSMS.style.border = '1px solid red';
    // }
    // else{
    //     feedbackSMS.style.border = 'default';
    // }
})


const one = document.getElementById('oneRate');
const two = document.getElementById('twoRate');
const three = document.getElementById('threeRate');
const four = document.getElementById('fourRate');
const five = document.getElementById('fiveRate');

one.addEventListener('click', ()=>{
    one.classList.add('active');
    two.classList.remove('active');
    three.classList.remove('active');
    four.classList.remove('active');
    five.classList.remove('active');
    rateVal = 1;
})
two.addEventListener('click', ()=>{
    one.classList.remove('active');
    two.classList.add('active');
    three.classList.remove('active');
    four.classList.remove('active');
    five.classList.remove('active');
    rateVal = 2;
})
three.addEventListener('click', ()=>{
    one.classList.remove('active');
    two.classList.remove('active');
    three.classList.add('active');
    four.classList.remove('active');
    five.classList.remove('active');
    rateVal = 3;
})
four.addEventListener('click', ()=>{
    one.classList.remove('active');
    two.classList.remove('active');
    three.classList.remove('active');
    four.classList.add('active');
    five.classList.remove('active');
    rateVal = 4;
})
five.addEventListener('click', ()=>{
    one.classList.remove('active');
    two.classList.remove('active');
    three.classList.remove('active');
    four.classList.remove('active');
    five.classList.add('active');
    rateVal = 5;
})

function sendFeedback(){
    console.log("error");
    document.getElementById('sendFeedbackBtn').addEventListener('click', ()=>{

        if(rateVal != '' && feedSMS != ''){
            $.ajax({
                url: "index-feedback.php",
                method: "POST",
                dataType: 'json',
                data:{
                    getFeedback : 1,
                    rateVal: rateVal,
                    feedbackSMS: feedSMS
                },
                success: (response)=>{
                    if(response.status){
                        console.log(response);
                    }else{
                        console.log(response);
                    }
                }
            });
        }
        else{

        }
    });
}

sendFeedback();
