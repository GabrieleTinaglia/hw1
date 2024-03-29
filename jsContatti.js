const form = document.getElementById("form");
const result = document.getElementById("result");

form.addEventListener("submit", function(e) {
    const formData = new FormData(form);
    e.preventDefault();
    var object = {};
    formData.forEach((value, key) => {
        object[key] = value;
    });
    var json = JSON.stringify(object);
    result.innerHTML = "Form Inviato!";

    fetch("https://api.web3forms.com/submit", {
            method: "POST",
            headers: {
                "Content-Type": "application/json",
                Accept: "application/json",
            },
            body: json
        })
        .then(async(response) => {
            let json = await response.json();
        })
        .then(function() {
            form.reset();
            setTimeout(() => {
                result.style.display = "none";
            }, 5000);
        });
});




function aggiungiPrenotazione(event) {

    const form = document.querySelector("form");
    const form_data = { method: 'post', body: new FormData(form) };
    fetch("http://localhost/php/postForm.php", form_data);
}
document.querySelector("form").addEventListener("submit", aggiungiPrenotazione);