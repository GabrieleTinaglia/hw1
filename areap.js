const modifyButton = document.getElementById("modify");
const reviewButton = document.getElementById("showReview");
const reservationButton = document.getElementById("showReservation");
const deleteButton = document.getElementById("delete");
const div1 = document.getElementById("contenitore");
const div2 = document.getElementById("reviews");
const div3 = document.getElementById("reservations");
var nome;
const pswrr = document.querySelector("d");

modifyButton.addEventListener("click", function(e) {
    modifyButton.classList.remove("active");
    reviewButton.classList.add("active");
    reservationButton.classList.add("active");
    div1.classList.remove("hidden");
    div2.classList.add("hidden");
    div3.classList.add("hidden");

})
reviewButton.addEventListener("click", function(e) {
    reviewButton.classList.remove("active");
    modifyButton.classList.add("active");
    reservationButton.classList.add("active");
    div1.classList.add("hidden");
    div2.classList.remove("hidden");
    div3.classList.add("hidden");

    function onReviews(json) {
        const lista = document.getElementById("reviews");
        lista.innerHTML = '';
        for (recensione of json) {
            const elem = document.createElement("span");
            const data = document.createElement("p");
            const note = document.createElement("p");
            note.textContent = recensione.commento;
            data.textContent = recensione.data + "      " + recensione.orario;
            elem.appendChild(data);
            elem.appendChild(note);
            lista.appendChild(elem);


        }
    }

    function responseReviews(response) {
        return response.json();
    }
    fetch("http://localhost/php/getReviews.php?nome=" + nome).then(responseReviews).then(onReviews);

})
reservationButton.addEventListener("click", function(e) {
    reservationButton.classList.remove("active");
    reviewButton.classList.add("active");
    modifyButton.classList.add("active");
    div1.classList.add("hidden");
    div2.classList.add("hidden");
    div3.classList.remove("hidden");

    function onReservations(json) {

        const lista = document.getElementById("reservations");
        lista.innerHTML = '';
        for (prenotazione of json) {
            const elem = document.createElement("span");
            const data = document.createElement("p");
            const npe = document.createElement("p");
            const note = document.createElement("p");
            note.textContent = "Note: " + prenotazione.note;
            data.textContent = prenotazione.data + "      " + prenotazione.ora;
            npe.textContent = "Numero persone: " + prenotazione.n_persone;
            elem.appendChild(data);
            elem.appendChild(npe);
            elem.appendChild(note);
            lista.appendChild(elem);

        }
    }

    function responseReservations(response) {
        return response.json();
    }
    fetch("http://localhost/php/getReservations.php?nome=" + nome).then(responseReservations).then(onReservations);


})


function onJSON(json) {
    console.log(json);
    for (dati of json) {

        document.getElementById("email").textContent = dati.username;
        document.getElementById("numero").textContent = dati.telefono;
        nome = document.querySelector(".nome").innerHTML;
    }
}

function responseAggiorna(response) {
    return response.json();
}

const userVal = document.querySelector("h1").innerHTML;
fetch("http://localhost/php/getUserData.php?email=" + userVal).then(responseAggiorna).then(onJSON);


document.getElementById("modem").addEventListener("click", function(event) {

    const emailVal = document.getElementById("emailvalue").value;
    console.log("http://localhost/php/modifyEmail.php?nome=" + userVal + "&email=" + emailVal)
    fetch("http://localhost/php/modifyEmail.php?nome=" + userVal + "&email=" + emailVal);
    fetch("http://localhost/php/getUserData.php?email=" + userVal).then(responseAggiorna).then(onJSON);
})
document.getElementById("modnum").addEventListener("click", function(event) {

    const numV = document.getElementById("numval").value;
    fetch("http://localhost/php/modifyNum.php?nome=" + userVal + "&num=" + numV);
    fetch("http://localhost/php/getUserData.php?email=" + userVal).then(responseAggiorna).then(onJSON);
})
document.getElementById("modpass").addEventListener("click", function(event) {

    const passV = document.querySelector(".re").value;
    console.log(passV)
    console.log("http://localhost/php/modifyPass.php?nome=" + userVal + "&pass=" + passV)
    fetch("http://localhost/php/modifyPass.php?nome=" + userVal + "&pass=" + passV);
})
const passbttn = document.querySelector("#vision").addEventListener("click", function(e) {
    const fi = document.querySelector("#field")
    if (fi.type === "password") {
        fi.type = "text";
    } else {

        fi.type = "password";
    }

})
document.querySelectorAll("#field").forEach(passbttn => {
    passbttn.addEventListener("focus", function(e) {
        pswrr.textContent = "La password deve avere lunghezza minima di 8 caratteri e una Maiuscola"
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
document.getElementById("logout").addEventListener("click", function(e) {
    fetch("http://localhost/php/logout.php").then(location.reload());
})