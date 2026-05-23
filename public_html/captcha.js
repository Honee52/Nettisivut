let captcha;
function generate() {

    // Tyhjennä vanha tieto.
    document.getElementById("submit").value = "";

    // Yhteys "avain" elementtiin.
    captcha = document.getElementById("avain");
    let uniquechar = "";

    const randomchar = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

    // Luo avain.
    for (let i = 1; i < 5; i++) {
        uniquechar += randomchar.charAt(
        Math.random() * randomchar.length)
    }

    // Talleta luotu avain.
    captcha.innerHTML = uniquechar;
}

function tarkista_avain() {
    const usr_input = document
        .getElementById("submit").value;

    // Tarkista vastaus.
    if (usr_input == captcha.innerHTML) {
        document.getElementById("submit").value = "";
        window.location.replace("./mail.html");
    }
    else {
        generate();
    }
}