<?php
  namespace App\Controllers;

  use \App\Models\Product;
  use Dompdf\Dompdf;
//   require_once "../Product.php";
  

class ProductController
{
    function __construct()
    {
        //echo "<br>Constructor clase PRODUCTCONTROLLER";
    }//fin_constructor

    function index(){
        //echo "<br>Dentro index de PRODUCTCONTROLLER";
        // metodo home de Controller de mvc00
        $products = Product::all();
        require "../views/product.php";
    }//fin_mindex

    public function pdf()
    {
        //$products = Product::all();
        
        $dompdf = new Dompdf();
        $dompdf->loadHtml('<h1>Hola mundo</h1><br>');
        header("Content-type: application/pdf");
        header("Content-Disposition: inline; filename=documento.pdf");
        $dompdf->render();
        $dompdf->stream();
    }
    function show(){
        //echo "<br>Dentro de show de PRODUCTCONTROLLER";
        // metodo show de Controller de mvc00
        $id = $_GET["id"];        
        $product = Product::find($id); //vendra de start.php
        require "../views/show.php";
    }//fin_mindex
    
    
}//fin clase


 