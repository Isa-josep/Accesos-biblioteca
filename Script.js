function validateRegistro() {
    var noControl = document.getElementById("no_control").value;
    var nombre = document.getElementById("nombre").value;
    var apellidoPaterno = document.getElementById("apellido_paterno").value;
    var apellidoMaterno = document.getElementById("apellido_materno").value;

    if (noControl === "" || nombre === "" || apellidoPaterno === "" || apellidoMaterno === "") {
        alert("Todos los campos son obligatorios para el registro.");
        return false;
    }
    return true;
}