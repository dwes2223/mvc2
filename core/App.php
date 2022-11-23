<?php

namespace Core;
 /*
    - Si no la url no especifica ningun controlador (recurso) => asigno 
     uno por defecto => home
    - Si no la url no especifica ningun metodo => asigno por defecto : index

    /recurso/accion/parametros
 */
class App{
   function __construct()
   {
    // http://mvc.local/product/show =>  http://mvc.local/index.php?url=product/show
    if(isset($_GET["url"]) && !empty($_GET["url"])){
        $url = $_GET["url"];
    }else{
        $url = "home";
    }
        
     // /product/show/5/ ->  product: recurso  ; show: accion ; 5: parametro
    $arguments = explode('/', trim($url,'/'));
    $controllerName = array_shift($arguments); // product ; ProductController
    $controllerName = ucwords($controllerName) . "Controller";
    if(count($arguments)){
        $method = array_shift($arguments); // show
    }else{
        $method = "index";
    }

         
    // voy a cargar el controlador. ProductController.php
    $file = "../app/controllers/$controllerName" . ".php";
   
    if(file_exists($file)){
       // var_dump($file);    
       // die();
        require_once $file; //importo el fichreo si existe      

    }else{
        http_response_code(404);
        die("No encontrado");
    }

    //existe el metodo en el controlador ?
    $controllerName = "\\App\\Controllers\\$controllerName";
    $controllerObject = new $controllerName; //objecto de la clase
    if(method_exists($controllerObject,$method)){
        $controllerObject->$method($arguments); //metodo ok-> lo invoco.
    }else{
        http_response_code(404);
        die("No encontrado");
    }




   }//fin_construct

}//fin_app