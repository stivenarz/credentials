let timerlogout;
logOut();
function logOut() {
    clearInterval(timerlogout);
    timerlogout = setInterval(() => {
            document.getElementById('logout_session').click();
        }, 60000);
}
const app = document.getElementById("app");
app.addEventListener("mousemove", function () {
    logOut();
});
app.addEventListener("keyup", function () {
    logOut();
});

// let timerpassword;
// const btnSeePassword = document.getElementById('btnSee');
// btnSeePassword.addEventListener("click", function hidepassword() {
//     alert('time on');
//     clearInterval(timerpassword);
//     timerpassword = setInterval(() => {
//         document.getElementById("setIdNull").click();
//     }, 10000);
// })


const formBody = document.getElementById("formBody");
const btnSubmit = document.getElementById("btnSubmit");
formBody.addEventListener("keyup", function (e) {
    if (e.key === "Enter") {
        btnSubmit.click();
    } else if (e.key === "Escape") {
        btnCancel.click();
    }
});
