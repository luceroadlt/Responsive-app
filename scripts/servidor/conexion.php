<?php

    function conexion($h, $u, $p, $bd){
        
        
        if(!($enlace = mysqli_connect($h, $u, $p, $bd)))
           
            die("Fallo en conexion!!!" . mysqli_connect_error());
        else
            return $enlace;
       
    }

    function cerrarConexion(){
        mysql_close(mysqli_connect("localhost", "root", "13070011", "powergym"));
        
    }

?>
