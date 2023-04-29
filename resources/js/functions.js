let timerlogout;
logOut();
function logOut(on = null) {
    clearInterval(timerlogout);
    if (on) {
        timerlogout = setInterval(() => {
                document.getElementById('logout_session').click();
            }, 60000);
    }
}

window.addEventListener("mousemove", function () {
    logOut(true);
});
window.addEventListener("keyup", function () {
    logOut(true);
});

window.addEventListener('resize', () => {
    HeightDiv()
});
function HeightDiv() {
    var vHeight = window.innerHeight;
    document.getElementById('root').style.height = `${vHeight}px`;
    let hcontent = vHeight*0.75;
    document.getElementById('div-table').style.height = `${hcontent}px`;
}
HeightDiv();