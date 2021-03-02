<!DOCTYPE html>
<html lang="">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
            <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <title>Registro</title>
        <link rel="stylesheet" href="assets/css/membresias.css" />
        <script src="scripts/registro.js"></script>
   <script>
       $(document).ready(function(){
    $("button").click(function(){
        $("table").css("background", "blue");
        });
});
   </script>
   <script>
function showHint(str) {
  var xhttp;
  if (str.length == 0) { 
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;
    }
  };
  xhttp.open("GET", "gethint.php?q="+str, true);
  xhttp.send();   
}
</script>
    </head>

    <body>
        <header>
            <nav>
                <ul>
                    <li>
                        <a href="index.html">
                            <img
                                src="assets/images/gym-icon.png"
                                alt=""
                                style="height: 1.8rem;"
                        /></a>
                    </li>

                    <li><a href="index.html">Power Gym</a></li>
                    <li><a href="membresias.html">Membresias</a></li>
                    <li>
                        <a href="entrenadores.html">Entrenadores</a>
                    </li>
                    <li><a href="registro.php">Registrate</a></li>
                </ul>
            </nav>
        </header>
        <br />
       <section class="section_form" style="color:white;">

            <h2>Hazte Miembro</h2>
                    <hr />
            <label class="label">* Campos requeridos</label>
            <div class="div_form">
            <form name="formRegistro" method="post" action="scripts/servidor/procesar_insercion.php">
                <input
                    type="text"
                    name="nombre"
                    id="cajaNombre"
                    placeholder="Nombre"
                    onkeyup="showHint(this.value)"
                    required
                    oninvalid="this.setCustomValidity('Nombre requerido')"
                    oninput="this.setCustomValidity('')"
                    onblur="validacionForm();"
                />*
                Sugerencia: <span id="txtHint"></span>
                <div
                    id="mensaje"
                    style="position: absolute; left: 10px; top: 50px; background-color: Yellow; z-index: 10"
                    hidden
                >
                    Introduzca caracteres validos
                </div>

                <br /><br />
                <input
                    type="text"
                    name="apellidos"
                    id="cajaApellidos"
                    placeholder="Apellidos"
                    required
                    oninvalid="this.setCustomValidity('Apellidos requerido')"
                    oninput="this.setCustomValidity('')"
                    onblur="validacionForm();"
                />
                * <br /><br />
                <label class="label">Fecha de nacimiento</label>
                <br />
                <input type="date" 
                name="fechaNacimiento" 
                id="cajaFechaNac" />
                <br /><br />

                <label class="label">Genero:</label>
                <label
                    >Femenino
                    <input
                        type="radio"
                        name="genero"
                        value="Femenino"
                        id="rdGeneroF"
                    />
                </label>
                <label
                    >Masculino
                    <input
                        type="radio"
                        name="genero"
                        value="Masculino"
                        id="rdGeneroM"
                    />
                </label>
                <br /><br />
                <input
                    type="email"
                    name="email"
                    id="cajaEmail"
                    placeholder="E-mail:"
                    required
                    oninvalid="this.setCustomValidity('Email requerido')"
                    oninput="this.setCustomValidity('')"
                    onblur="validacionForm();"
                />
                * <br /><br />

                <input
                    type="tel"
                    name="telefono"
                    id="cajaTelefono"
                    placeholder="Telefono"
                />
                <br /><br />

                <button
                    type="submit"
                    name="btnsSubmit"
                    value="Submit"
                    onclick="alert('AGREGADO CON EXITO')" 
                    
                >
                    Enviar
                </button>
                <br /><br />
            </form>
                            </div>

        </section>
        <br />
<!-- Form -->
<section class="table_section" style="background:gray;">
            <h3>Clientes Registrados</h3>
            <hr>
             <table>

                        <tr>
                            <th><b>Nombre</b></th>
                            <th><b>Apellidos</b></th>
                            <th><b>Fecha Nacimiento</b></th>
                            <th><b>Genero</b></th>
                            <th><b>E-mail</b></th>
                            <th><b>Telefono</b></th>
                        </tr>

                        <?php
            include("scripts/servidor/conexion.php");
    
          $conexion = conexion("localhost", "root", "13070011", "powergym");
 
        
          $sql = "SELECT * FROM clientes";

        $resultado = mysqli_query($conexion, $sql);
        
        //verificar que no este vacia la tabla
        if(mysqli_num_rows($resultado) > 0){
            while( $fila= mysqli_fetch_assoc($resultado)){
                printf("<tr> <td> " . $fila['nombre']. "</td> " .
                            "<td> " . $fila['apellidos'].  "</td> ".
                            "<td> " . $fila['fechanac']. "</td>" .
                            "<td> " . $fila['genero']. "</td>" .
                            "<td> " . $fila['email']. "</td>" .
                            "<td> " . $fila['telefono']. "</td>",
                       "</tr>");
            }
            
        }else{
            echo "Tabla vacia";
        }

        ?>

                    </table>

  </div>
            </section>
        <hr />
        <footer>
            <br />
            <p align="center">&copy; Copyright 2020 - Power Gym</p>
            <br />
        </footer>
    </body>
</html>
