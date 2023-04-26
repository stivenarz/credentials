let timerlogout;
logOut();
function logOut(on = null) {
    clearInterval(timerlogout);
    // if (on) {
    //     timerlogout = setInterval(() => {
    //             document.getElementById('logout_session').click();
    //         }, 60000);
    // }
}
// const appCredentials = document.getElementById("app");
window.addEventListener("mousemove", function () {
    logOut(true);
});
window.addEventListener("keyup", function () {
    logOut(true);
});



