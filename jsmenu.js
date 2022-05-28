function onJson(json) {
    const lista = document.getElementById("container-nome");
    lista.innerHTML = '';
    let elem = document.createElement("span");
    let nome = document.createElement("p");
    let prezzo = document.createElement("p");
    nome.textContent = " Antipasti:";
    prezzo.textContent = "0";
    prezzo.classList.add("none");
    elem.appendChild(nome);
    elem.appendChild(prezzo);
    lista.appendChild(elem);
    lista.appendChild(elem);

    for (portata of json) {
        if (portata.categoria === "antipasti") {
            let elem = document.createElement("span");
            let nome = document.createElement("p");
            let prezzo = document.createElement("p");
            nome.textContent = "" + portata.nome;
            if (portata.prezzo == 0) {

                prezzo.textContent = "" + portata.prezzo;
                prezzo.classList.add("none");
            } else {
                prezzo.textContent = "€ " + portata.prezzo;
                nome.classList.add("font");

            }
            elem.appendChild(nome);
            elem.appendChild(prezzo);
            lista.appendChild(elem);
            lista.appendChild(elem);

        }
    }
    elem = document.createElement("span");
    nome = document.createElement("p");
    prezzo = document.createElement("p");
    nome.textContent = "Primi:";
    prezzo.textContent = "0";
    prezzo.classList.add("none");
    elem.appendChild(nome);
    elem.appendChild(prezzo);
    lista.appendChild(elem);
    lista.appendChild(elem);

    for (portata of json) {
        if (portata.categoria === "Primi") {
            const elem = document.createElement("span");
            const nome = document.createElement("p");
            const prezzo = document.createElement("p");
            nome.textContent = "" + portata.nome;
            if (portata.prezzo == 0) {

                prezzo.textContent = "" + portata.prezzo;
                prezzo.classList.add("none");
            } else {
                prezzo.textContent = "€ " + portata.prezzo;
                nome.classList.add("font");

            }
            elem.appendChild(nome);
            elem.appendChild(prezzo);
            lista.appendChild(elem);
            lista.appendChild(elem);

        }
    }
    elem = document.createElement("span");
    nome = document.createElement("p");
    prezzo = document.createElement("p");
    nome.textContent = "Secondi:";
    prezzo.textContent = "0";
    prezzo.classList.add("none");
    elem.appendChild(nome);
    elem.appendChild(prezzo);
    lista.appendChild(elem);
    lista.appendChild(elem);

    for (portata of json) {
        if (portata.categoria === "Secondi") {
            const elem = document.createElement("span");
            const nome = document.createElement("p");
            const prezzo = document.createElement("p");
            nome.textContent = "" + portata.nome;
            if (portata.prezzo == 0) {

                prezzo.textContent = "" + portata.prezzo;
                prezzo.classList.add("none");
            } else {
                prezzo.textContent = "€ " + portata.prezzo;
                nome.classList.add("font");

            }
            elem.appendChild(nome);
            elem.appendChild(prezzo);
            lista.appendChild(elem);
            lista.appendChild(elem);

        }
    }
    elem = document.createElement("span");
    nome = document.createElement("p");
    prezzo = document.createElement("p");
    nome.textContent = "Dolci:";
    prezzo.textContent = "0";
    prezzo.classList.add("none");
    elem.appendChild(nome);
    elem.appendChild(prezzo);
    lista.appendChild(elem);
    lista.appendChild(elem);

    for (portata of json) {
        if (portata.categoria === "Dolci") {
            const elem = document.createElement("span");
            const nome = document.createElement("p");
            const prezzo = document.createElement("p");
            nome.textContent = "" + portata.nome;
            if (portata.prezzo == 0) {

                prezzo.textContent = "" + portata.prezzo;
                prezzo.classList.add("none");
            } else {
                prezzo.textContent = "€ " + portata.prezzo;
                nome.classList.add("font");

            }
            elem.appendChild(nome);
            elem.appendChild(prezzo);
            lista.appendChild(elem);
            lista.appendChild(elem);

        }
    }

}

function gesture(response) {
    return response.json();
}


fetch("http://localhost/php/getPortata.php").then(gesture).then(onJson);