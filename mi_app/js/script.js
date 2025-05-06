document.getElementById("formRegistro").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData();
    formData.append("nombre", document.getElementById("nombre").value);
    formData.append("correo", document.getElementById("correoRegistro").value);
    formData.append("contraseña", document.getElementById("contraseñaRegistro").value);

    fetch("registro.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => alert(data.mensaje || data.error));
});

document.getElementById("formLogin").addEventListener("submit", function(event) {
    event.preventDefault();

    let formData = new FormData();
    formData.append("correo", document.getElementById("correoLogin").value);
    formData.append("contraseña", document.getElementById("contraseñaLogin").value);

    fetch("login.php", {
        method: "POST",
        body: formData
    })
    .then(response => response.json())
    .then(data => {
        if (data.mensaje) {
            alert("Bienvenido " + data.usuario.nombre);
        } else {
            alert(data.error);
        }
    });
});
