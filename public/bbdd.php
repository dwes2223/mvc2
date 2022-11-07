<?php
    require "../bbddcon.php";
/*
    /recurso/metodo/parametro1/parametro2

    /recurso -> controlador
    /metodos -> metodos o funciones dentro del contraladores
    /parametros : opcional: 1 ,0 o varios
*/

    
      $sql = "select nombreusu,password from credenciales";
      $registros = $bd->query($sql);
      echo "<br>Numero de registros devueltos: " .$registros->rowCount();
      if($registros->rowCount() > 0){
        foreach($registros as $fila){
            echo "<br>Nombre de usuario : " .$fila["nombreusu"];
            echo "<br>Password : " .$fila["password"];
        }
      }else{
        echo "<br>No se ha devuelto ninguna fila";
      }  
   