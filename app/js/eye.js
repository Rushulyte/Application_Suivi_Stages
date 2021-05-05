function toggle_visibility() {
    let element = document.getElementById("password");
    let eye = document.getElementById("eye");

    element.type = (element.type === "password") ? "text": "password"
    eye.src = ((element.type === "password") ? "../../img/eye2.png": "../../img/eye1.png")
}