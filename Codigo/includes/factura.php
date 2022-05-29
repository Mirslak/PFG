<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
?>

<?php
include "../database/conexion.php";
include "../DAO/Factura.php";
session_start();
/// Powered by Evilnapsis go to http://evilnapsis.com
include "../pdf/fpdf.php";

$fecha = date('d-m-Y');

//$message = print_r($_SESSION['shopping_cart']);

$pdf = new FPDF($orientation='P',$unit='mm');
$pdf->AddPage();
$pdf->SetFont('Arial','B',20);    
$textypos = 5;
$pdf->setY(12);
$pdf->setX(10);
// Agregamos los datos de la empresa
$pdf->Cell(5,$textypos,'FACTURA');
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(10);
$pdf->Cell(5,$textypos,"DE:");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Distribuciones Carbonicas S.L");
$pdf->setY(40);$pdf->setX(10);
$pdf->Cell(5,$textypos,"C. Espiga ");
$pdf->setY(45);$pdf->setX(10);
$pdf->Cell(5,$textypos,"952673634");
$pdf->setY(50);$pdf->setX(10);
$pdf->Cell(5,$textypos,"Dcarbonicas@gmail.com");

// Agregamos los datos del cliente
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(75);
$pdf->Cell(5,$textypos,"PARA:");
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(75);
$pdf->Cell(5,$textypos,$_SESSION['nombre']);
$pdf->setY(40);$pdf->setX(75);
$pdf->Cell(5,$textypos,$_SESSION['direccion']);
$pdf->setY(45);$pdf->setX(75);
$pdf->Cell(5,$textypos,$_SESSION['telefono']);
$pdf->setY(50);$pdf->setX(75);
$pdf->Cell(5,$textypos,$_SESSION['email']);

//ISERT BASE DE DATOS FACTURA DATOS ($FECHA, $TOTAL, $IDUSUARIO)
$fecha = date('d-m-Y');
$id_usuario = $_SESSION['id'];
$consulta = "INSERT INTO `factura` (`fecha`, `id_usuario`) VALUES (CURRENT_DATE, '$id_usuario')";
$resultado = mysqli_query($conexion, $consulta);

if($consulta){
//ALMACENO EN UNA VARIABLE EL Nº DE FACTURA SELECT PARA SACAR EL ULTIMO NUMERO DE FACTURA.
$consulta = "SELECT MAX(`num_factura`) AS `num_factura` FROM `factura`";
$resultado = mysqli_query($conexion, $consulta);
$id = mysqli_fetch_array($resultado);
$idF = $id['num_factura'];


// Agregamos los datos del FACTURA
$pdf->SetFont('Arial','B',10);    
$pdf->setY(30);$pdf->setX(135);
$pdf->Cell(5,$textypos,"FACTURA #".$idF); //falta la factura id
$pdf->SetFont('Arial','',10);    
$pdf->setY(35);$pdf->setX(135);
$pdf->Cell(5,$textypos,"Fecha:".$fecha);
$pdf->setY(40);$pdf->setX(135);
$pdf->setY(45);$pdf->setX(135);
$pdf->Cell(5,$textypos,"");
$pdf->setY(50);$pdf->setX(135);
$pdf->Cell(5,$textypos,"");

/// Apartir de aqui empezamos con la tabla de productos
$pdf->setY(60);$pdf->setX(135);
    $pdf->Ln();
/////////////////////////////
//// Array de Cabecera
$header = array("Descripcion","Cant.","Precio","Total");
                                         
//// Arrar de Productos

    // Column widths
    $w = array(50, 20, 20, 25);
    // Header
    for($i=0;$i<count($header);$i++)
        $pdf->Cell($w[$i],7,$header[$i],1,0,'C');
    $pdf->Ln();
    // Data
    $total = 0;
    $totalF= 0;
    foreach($_SESSION['shopping_cart'] as $row  => $values)
    {
        $total=0;
        $total+=$values['product_price']*$values['product_quantity'];
        $pdf->Cell($w[0],6,$values['product_name'],1);
        $pdf->Cell($w[1],6,$values['product_quantity'],1);
        $pdf->Cell($w[2],6,number_format($values['product_price']),'1',0,'R');
        $pdf->Cell($w[3],6,"$ ".number_format($total,2,".",","),'1',0,'R');

        $pdf->Ln();
        $totalF= $totalF+$total;

        //ISERTO LINEA DE FACTURA (PRODUCTO, CANTIDAD, PRECIO, TOTAL, NºFACTURA)
        $producto = $values['product_name'];
        $cantidad = $values['product_quantity'];
        $precio = $values['product_price'];
        $consulta = "INSERT INTO `linea_factura` (`num_factura`, `producto`, `cantidad`, `precio`, `total`) VALUES ('$idF', '$producto', '$cantidad', '$precio', '$totalF')";
        $resultado = mysqli_query($conexion, $consulta);

    }
/////////////////////////////
//// Apartir de aqui esta la tabla con los subtotales y totales
$pdf->setX(235);
    $pdf->Ln();
/////////////////////////////
$header = array("", "");
$data2 = array(
	array("Total", $totalF),
);
    // Column widths
    $w2 = array(40, 40);
    // Header

    $pdf->Ln();
    // Data
    foreach($data2 as $row)
    {
$pdf->setX(115);
        $pdf->Cell($w2[0],6,$row[0],1);
        $pdf->Cell($w2[1],6,"$ ".number_format($row[1], 2, ".",","),'1',0,'R');

        $pdf->Ln();
    }



$pdf->output();

//Cierra la sesion del carrito
unset ($_SESSION["shopping_cart"]);

}