if (window._your_unique_id === undefined) {
    window._your_unique_id = true;

    function onJSON(json) {
        document.getElementById("1").textContent = json[Object.keys(json).length - 1].utente;
        document.getElementById("2").textContent = json[Object.keys(json).length - 1].commento;

        document.getElementById("3").textContent = json[Object.keys(json).length - 2].utente;
        document.getElementById("4").textContent = json[Object.keys(json).length - 2].commento;

        document.getElementById("5").textContent = json[Object.keys(json).length - 3].utente;
        document.getElementById("6").textContent = json[Object.keys(json).length - 3].commento;

    }

    function responseAggiorna(response) {
        return response.json();
    }

    fetch("http://localhost/php/get.php").then(responseAggiorna).then(onJSON);

}