<?php

  $dsn = "mysql:dbname=demo;host=db";
  $usuario = "dbuser";
  $password = "secret";

  /**
   *  1 - preparar la consulta -> prepare
   *  2- vincular los datos -> bindParam / bindValue
   *  3- ejecutar la sentencia -> execute(); (query , exec)
   */
  try {
      $db = new PDO($dsn,$usuario,$password);
      //establece el nivel de error que muestra en la conexion
      $db->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
      
      //preparacion por nombre
      //$sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (:nombre,:clave)");

      //preparacion por posicion
      $sentencia = $db->prepare("INSERT INTO credenciales (nombreusu,password) VALUES (? , ?)");
      
      $nombre = "Alicia";
      $clave1 = "sombrero";
       $sentencia->bindParam(1,$nombre);
       $sentencia->bindParam(2,$clave1);

     // preparacion + ejecucion: execute(array[datos])

    // $sentencia->bindValue(":nombre",$nombre);
    // $sentencia->bindValue(":clave",$clave1);
      
      //$nombre = "Pedro";
     // $clave1 = "789";
      $sentencia->execute(); //ejecutar la sentencia

      echo "<h2>Exito</h2>";

  } catch (PDOException $e) {
      echo "Erro producido al conectar: " . $e->getMessage();
  }     