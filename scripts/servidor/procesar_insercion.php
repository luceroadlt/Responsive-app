<?php

	include("conexion.php");

	$conexion = conexion("localhost", "root", "13070011", "powergym");

//	var_dump($conexion);
//	
//	if (!$conexion) {
//    	die("Connection failed: " . mysqli_connect_error());
//	}


    $nombreP = $_POST['nombre'];
    $apellidosP = $_POST['apellidos'];
    $fechaNacimientoP = $_POST['fechaNacimiento'];
    $generoSelecP = $_POST['genero'];
    $emailP = $_POST['email'];
    $telefonoP = $_POST['telefono'];



	//validacion
	$validacionDatos = true;
	if(strlen($nombreP)<=0){
		$validacionDatos = false;
	}
	//completar valiaciones ...........................



	if ($validacionDatos) {
		
		//para evitar SQL INJECTON se debe utilizar PREPAREMENT STATEMENTS (dclaraciones preparadas)

		//	INSERT INTO alumnos VALUES('01', 'x', 'x', 'x' ....)
		$sql = "INSERT INTO clientes VALUES('$nombreP','$apellidosP','$fechaNacimientoP','$generoSelecP','$emailP' ,'$telefonoP')";

        echo "<script language=’JavaScript’> 
                alert(‘REGISTRO AGREGADO’); 
                </script>";
        
		if( mysqli_query($conexion, $sql)){
          
            header("Location: ../../registro.php");

         //   echo "Registro agregado correctamente!!";
		}          
        else{
			echo "ERROR";
			echo "Error: " . $sql . "<br>" . mysqli_error($conexion);
		}


	} else {
		       echo "<script type=\"text/javascript\">alert(\"DATOS INCOMPLETOS\");</script>";  

        header("Location: ../../registro.php");
        echo "FALTAN DATOS !!!!";
	}
	

?>
