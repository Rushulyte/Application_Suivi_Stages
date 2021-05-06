function toggle_visibility() {
    let element = document.getElementById("password");
    let eye = document.getElementById("eye");

    element.type = (element.type === "password") ? "text": "password"
    eye.src = ((element.type === "password") ? "../../svg/eye1.svg": "../../svg/eye2.svg")
}