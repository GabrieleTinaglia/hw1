function onJson(json) {
    const user = document.querySelector('h1')
    user.textContent = json[0].username
    var urlString = 'url(' + json[1].media_url + ')';
    const img1 = document.getElementById('three').style.backgroundImage = urlString
    var urlString = 'url(' + json[2].media_url + ')';
    const img2 = document.getElementById('two').style.backgroundImage = urlString
    var urlString = 'url(' + json[3].media_url + ')';
    const img3 = document.getElementById('one').style.backgroundImage = urlString


}

function response(resp) {
    return resp.json();
}
fetch("http://localhost/php/getCrewInfo.php").then(response).then(onJson);