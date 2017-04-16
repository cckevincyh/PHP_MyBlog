/**
 * Created by c on 2017/4/16.
 */
function onPwd() {
    document.getElementById("changepwd").setAttribute("class","on");
    document.getElementById("privacy").setAttribute("class","");
    document.getElementById("content").setAttribute("class","setting_pwd");
}


function onPrivacy() {
    document.getElementById("privacy").setAttribute("class","on");
    document.getElementById("changepwd").setAttribute("class","");
    document.getElementById("content").setAttribute("class","setting_myinfo");
}