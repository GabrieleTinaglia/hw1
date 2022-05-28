const form = document.getElementById("headerr");

form.addEventListener("click", function(e) {
    if (document.getElementById("rece").classList.contains("hidden")) {
        document.getElementById("rece").classList.remove("hidden")
        const setora = document.getElementById("orario");
        const setdata = document.getElementById("data");
        time = new Date().toLocaleTimeString();
        date = new Date().toLocaleDateString();
        setdata.setAttribute("value", date);
        setora.setAttribute("value", time);
        document.querySelectorAll("div #footer-el").forEach(rec => {
            rec.classList.add("after");
        })
    } else {
        document.getElementById("rece").classList.add("hidden")
        const rec = document.getElementById("box")
        rec.classList.add("after");
    }
})

function onJSON(json) {
    document.getElementById("1").textContent = json[Object.keys(json).length - 1].utente;
    document.getElementById("2").textContent = json[Object.keys(json).length - 1].commento;

    document.getElementById("3").textContent = json[Object.keys(json).length - 2].utente;
    document.getElementById("4").textContent = json[Object.keys(json).length - 2].commento;

    document.getElementById("5").textContent = json[Object.keys(json).length - 3].utente;
    document.getElementById("6").textContent = json[Object.keys(json).length - 3].commento;
    window.scroll({
        top: 2230,
        left: 0,
        behavior: 'smooth'
    });
}

function responseAggiorna(response) {
    return response.json();
}
const formRec = document.forms['rec'];
formRec.addEventListener("submit", function(event) {

    fetch("http://localhost/php/get.php").then(responseAggiorna).then(onJSON);


})