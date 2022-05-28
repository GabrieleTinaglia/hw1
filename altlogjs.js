const signUpButton = document.getElementById('signUp');
const signInButton = document.getElementById('signIn');
const container = document.getElementById('container');
const form = document.getElementById("login");
const form2 = document.getElementById("registra");
const pswrr = document.querySelector("d");
const userField = document.getElementById("usr");
const errorUser = document.querySelector(".errorUser");

signUpButton.addEventListener('click', () => {
    container.classList.add("right-panel-active");
    form.reset();
    form2.reset();
    pswrr.textContent = "";
    errorUser.textContent = "";
    document.querySelectorAll("#field").forEach(fi => {
        fi.classList.remove("error");
        document.querySelectorAll("i").forEach(passbtn => {

            passbtn.classList.remove("active")
            fi.type = "password";

        })
    })
})
signInButton.addEventListener('click', () => {
    container.classList.remove("right-panel-active");
    form.reset();
    form2.reset();
    pswrr.textContent = "";
    errorUser.textContent = "";
    document.querySelectorAll("p").forEach(text => {
        text.textContent = ""
        text.innerHTML = ""
    });
    document.querySelectorAll("#field").forEach(fi => {
        fi.classList.remove("error");
        document.querySelectorAll("i").forEach(passbtn => {
            passbtn.classList.remove("active")
            fi.type = "password";


        })
    })
})
const passbttn = document.querySelectorAll("i").forEach(passbttn => {
    passbttn.addEventListener("click", function(e) {
        e.preventDefault();
        document.querySelectorAll("#field").forEach(fi => {

            if (fi.type === "password") {
                fi.type = "text";
                passbttn.classList.add('active');

            } else {
                passbttn.classList.remove('active');
                fi.type = "password";
            }
        })

    })


})
const send = document.querySelectorAll("#pass2").forEach(s =>
    s.addEventListener("click", function(e) {
        form.reset();
        form2.reset();
        document.querySelectorAll("p").forEach(text => {
            text.textContent = ""
            text.innerHTML = ""
        });
    })
)

document.querySelectorAll("#field").forEach(passbttn => {
    passbttn.addEventListener("focus", function(e) {
        pswrr.textContent = "La password deve avere lunghezza minima di 8 caratteri, una Maiuscola e nessun carattere speciale"
    })
    passbttn.addEventListener("focusout", function(e) {
        if (passbttn.value.length < 8 && passbttn.value.length != 0) {
            passbttn.classList.add("error");
            pswrr.textContent = "Password troppo corta!\n";



        } else {
            passbttn.classList.remove("error");
            pswrr.textContent = "";
        }
        if (passbttn.value === passbttn.value.toLowerCase() && passbttn.value.length !== 0) {
            passbttn.classList.add("error")
            pswrr.textContent += " La password deve contenere almeno una lettera maiuscola!!"
        }
    })


})
const reg = document.forms['register'];
const passregi = document.querySelector(".re");
reg.addEventListener("submit", function(event) {
    if (passregi.value.length < 8 || passregi.value === passregi.value.toLowerCase() || userField.classList.contains("error")) {
        event.preventDefault();
    }
})
userField.addEventListener("keyup", function(e) {
    console.log(userField.value);
    userField.classList.remove("error");
    errorUser.textContent = "";

    function onJson(json) {
        console.log(json);
        for (user of json) {

            if (userField.value === user.username) {
                errorUser.textContent = "Username non disponibile!";
                userField.classList.add("error");
            }
        }
    }

    function response(resp) {
        return resp.json();
    }
    fetch("http://localhost/php/getUsernames.php").then(response).then(onJson);
})