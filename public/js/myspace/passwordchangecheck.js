var newpass = "";
var confpass = "";

let submit = document.getElementById("submitchanges");
let error = document.getElementById("errormessage");

document
    .getElementById("newpassword")
    .addEventListener("input", newpasscheck);

document
    .getElementById("confirmpassword")
    .addEventListener("input", newpasscheckconf);


function newpasscheck(e) {
    newpass = e.target.value;
    checkpass();
}
function newpasscheckconf(e) {
    confpass = e.target.value;
    checkpass();
}
function checkpass() {
    if (newpass.length<8 || confpass.length <8)
    {
        error.hidden = false;
        error.innerHTML = 'Le mot de passe doit faire 8 charactère minimun';
        submit.hidden = true;
        return;

    }
    if (newpass !== confpass)
    {
        error.hidden = false;
        error.innerHTML = 'Le nouveau mot de passe ainsi que la confirmation doivent être identique.';
        submit.hidden = true;
        return;
    }
    if (newpass === confpass && newpass.length >= 8 && confpass.length >=8)
    {
        error.hidden = true;
        error.innerHTML = '';
        submit.hidden = false;
        return;

    }

}

