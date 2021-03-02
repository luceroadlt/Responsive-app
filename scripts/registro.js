function validacionForm() {
    const inputNombre = document.forms["formRegistro"]["cajaNombre"];
    const inputApellidos = document.forms["formRegistro"]["cajaApellidos"];
    const inputEmail = document.forms["formRegistro"]["cajaEmail"];
    let esValido = false;
    const mensaje = document.getElementById("mensaje");

    inputNombre.willValidate,
        inputApellidos.willValidate,
        (inputEmail.willValidate = false);

    const maximo = 30;
    //Expresion regular para aceptar caracteres de A-Z mayusculas/minusculas y aceptacion de Ñ/ñ
    const patron = new RegExp("^[ÑA-Z]+$", "i");

    if (
        !inputNombre.value ||
        inputNombre.value.length > maximo ||
        !patron.test(inputNombre.value)
    ) {
        esValido = false;
        inputNombre.style.borderColor = "red";
        mensaje.hidden = false;
    } else {
        esValido = true;
        inputNombre.style.borderColor = "green";
        mensaje.hidden = true;
    }

    if (
        !inputApellidos.value ||
        inputApellidos.value.length > maximo ||
        !patron.test(inputApellidos.value)
    ) {
        esValido = false;
        inputApellidos.style.borderColor = "red";
        mensaje.hidden = false;
    } else {
        esValido = true;
        inputApellidos.style.borderColor = "green";
        mensaje.hidden = true;
    }
} //fin funcion
function mostrarDatos() {
    var nombre = document.formRegistro.cajaNombre.value;
    var apellidos = document.formRegistro.cajaApellidos.value;
    var fechaNac = document.formRegistro.cajaFechaNac.value;
    var genero = document.formRegistro.genero.value;
    var email = document.formRegistro.cajaEmail.value;
    var telefono = document.formRegistro.cajaTelefono.value;

    const valido = validacionForm();
    if (nombre.length === 0 || apellidos.length === 0 || email.length === 0) {
        alert("Datos incorrectos");
    } else {
        // alert("El campo es válido");
        document.write(
            "___DATOS INGRESADOS CORRECTAMENTE___" +
                "<br />" +
                "Nombre: " +
                nombre +
                "<br />" +
                "Apellidos: " +
                apellidos +
                "<br />" +
                "Fecha de Nacimiento: " +
                fechaNac +
                "<br />" +
                "Genero: " +
                genero +
                "<br />" +
                "Email: " +
                email +
                "<br />" +
                "Telefono: " +
                telefono +
                "<br />"
        );
    }
}
//En la primera función hago las validaciones correspondientes para los campos requeridos, incluyendo validación de caracteres no requeridos, como lo pueden ser números o caracteres especiales 
//
//En la segunda función hago validación de que al momento de que el usuario presione "enviar" se haga la validación respectiva de que haya llenado los campos como se le indican, si los campos están correctamente ingresados, se genera un informe con los datos ingresados, de lo contrario se le mostrara una ventanita al usuario pidiéndole que ingrese los datos correctamente. 
