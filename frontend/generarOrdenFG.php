<?php
error_reporting(0);
require_once ('app/lib/pdf/fpdf.php');
require 'conexion.php';
date_default_timezone_set("America/Mexico_City");
$hoy=date("Y-m-d");
$costos=base64_decode($_GET['total']);
$id_unico=base64_decode($_GET['id_unico']);
$valor2=base64_decode($_GET['claveContrato']);

$var= base64_decode($_GET['var']);
$num = base64_decode($_GET['valor2']);



$quer = $conexion2->query("UPDATE ordensuministro
INNER JOIN numeroorden ON ordensuministro.claveUnicaOrden = numeroorden.claveUnicaContrato
SET ordensuministro.fechaorden = numeroorden.fechaRegistro
WHERE numeroorden.claveUnicaContrato = ordensuministro.claveUnicaOrden");

$quer2 = $conexion2->query("UPDATE ordensuministro 
INNER JOIN proveedores ON ordensuministro.claveContrato = proveedores.id_proveedor 
SET ordensuministro.nombreproveedor = proveedores.nombre_proveedor 
WHERE proveedores.id_proveedor = ordensuministro.claveContrato");

$quer3 = $conexion2->query("UPDATE ordensuministro 
INNER JOIN proveedores ON ordensuministro.claveContrato = proveedores.id_proveedor 
SET ordensuministro.numerodecontrato = proveedores.numero_pedido 
WHERE proveedores.id_proveedor = ordensuministro.claveContrato");

$querY = "UPDATE numeroorden set id_contrato = $id_unico, totalOrden= $costos, fechaRegistro= '$hoy'
where claveUnicaContrato = '$valor2' limit 1";
$edita= mysqli_query($conexion2, $querY);

$query = "UPDATE proveedores set cuentaOrdenSuminstro = 1 where id_proveedor = $id_unico";
$resul = mysqli_query($conexion2, $query);

$sql2 = "SELECT *, numeroorden.totalOrden from proveedores inner join numeroorden on numeroorden.claveUnicaContrato='$num' where id_proveedor= $var ";
$resultado = mysqli_query($conexion2, $sql2);
//$row2 = mysqli_fetch_assoc($resultado);
$sql = "SELECT ordensuministro.partidaPresupuestal, ordensuministro.claveHraei, ordensuministro.cuadroBasico, ordensuministro.cucop, ordensuministro.descripcionDelBien, 
ordensuministro.unidadMedida, ordensuministro.minimo, ordensuministro.maximo, ordensuministro.id_ordenSuministro, ordensuministro.cantidad, ordensuministro.precioUnitario,
ordensuministro.importe, ordensuministro.claveUnicaOrden, ordensuministro.claveContrato, proveedores.nombre_proveedor, proveedores.domicilio_proveedor, proveedores.telefono_proveedor,
proveedores.email_proveedor, proveedores.numero_pedido, proveedores.numero_procedimiento, numeroorden.totalOrden, numeroorden.fechaRegistro from ordensuministro inner join proveedores on proveedores.id_proveedor =$var inner join numeroorden on claveUnicaContrato = '$num' and ordensuministro.claveUnicaOrden ='$num' and ordensuministro.claveContrato =$var";
$result = mysqli_query($conexion2, $sql);

class PDF extends FPDF {

    var $tablewidths;
    var $footerset;
    
    function _beginpage($orientation, $size) {
     $this->page++;
    
    // Resuelve el problema de sobrescribir una página si ya existe.
     if(!isset($this->pages[$this->page])) 
      $this->pages[$this->page] = '';
     $this->state  =2;
     $this->x = $this->lMargin;
     $this->y = $this->tMargin;
     $this->FontFamily = '';
    
     // Compruebe el tamaño y la orientación.
     if($orientation=='')
      $orientation = $this->DefOrientation;
     else
      $orientation = strtoupper($orientation[0]);
     if($size=='')
      $size = $this->DefPageSize;
     else
      $size = $this->_getpagesize($size);
     if($orientation!=$this->CurOrientation || $size[0]!=$this->CurPageSize[0] || $size[1]!=$this->CurPageSize[1])
     {
    
      // Nuevo tamaño o la orientación
      if($orientation=='P')
      {
       $this->w = $size[0];
       $this->h = $size[1];
      }
      else
      {
       $this->w = $size[1];
       $this->h = $size[0];
      }
      $this->wPt = $this->w*$this->k;
      $this->hPt = $this->h*$this->k;
      $this->PageBreakTrigger = $this->h-$this->bMargin;
      $this->CurOrientation = $orientation;
      $this->CurPageSize = $size;
     }
     if($orientation!=$this->DefOrientation || $size[0]!=$this->DefPageSize[0] || $size[1]!=$this->DefPageSize[1])
      $this->PageSizes[$this->page] = array($this->wPt, $this->hPt);
    }
 
    function morepagestable($datas, $lineheight=9) {
     // Algunas cosas para establecer y ' recuerdan '
     $l = $this->lMargin;
     $startheight = $h = $this->GetY();
     $startpage = $currpage = $maxpage = $this->page;
    
     // Calcular todo el ancho
     $fullwidth = 0;
     foreach($this->tablewidths AS $width) {
      $fullwidth += $width;
     }
    
     // Ahora vamos a empezar a escribir la tabla
     foreach($datas AS $row => $data) {
      $this->page = $currpage;
    
      // Escribir los bordes horizontales
      $this->Line($l,$h,$fullwidth+$l,$h);
    
      // Escribir el contenido y recordar la altura de la más alta columna
      foreach($data AS $col => $txt) {
       $this->page = $currpage;
       $this->SetXY($l,$h);
       $this->MultiCell($this->tablewidths[$col],$lineheight,$txt);
       $l += $this->tablewidths[$col];
    
       if(!isset($tmpheight[$row.'-'.$this->page]))
        $tmpheight[$row.'-'.$this->page] = 0;
       if($tmpheight[$row.'-'.$this->page] < $this->GetY()) {
        $tmpheight[$row.'-'.$this->page] = $this->GetY();
       }
       if($this->page > $maxpage)
        $maxpage = $this->page;
      }
    
      // Obtener la altura estábamos en la última página utilizada
      $h = $tmpheight[$row.'-'.$maxpage];
    
      //Establecer el "puntero " al margen izquierdo
      $l = $this->lMargin;
    
      // Establecer el "$currpage en la ultima pagina
      $currpage = $maxpage;
     }
    
     // Dibujar las fronteras
     // Empezamos a añadir una línea horizontal en la última página
        $this->page = $maxpage;
        $this->Line($l,$h,$fullwidth+$l,$h);
     // Ahora empezamos en la parte superior del documento
     for($i = $startpage; $i <= $maxpage; $i++) {
      $this->page = $i;
      $l = $this->lMargin;
      //$t  = ($i == $startpage) ? $startheight : $this->tMargin;
      //$lh = ($i == $maxpage)   ? $h : $this->h-$this->bMargin;
      $this->Line($l,$t,$l,$lh);
      foreach($this->tablewidths AS $width) {
       $l += $width;
       $this->Line($l,$t,$l,$lh);
      }
     }
     // Establecerlo en la última página , si no que va a causar algunos problemas
     //$this->page = $maxpage;
    }
  
    
      

    
    function Header()
    {
        $direccion = utf8_decode('Dirección de Operaciones.
Centro Integral de Servicios Farmacéuticos.');
        // Logo
        $this->Image('imagenes/images.png', 25 ,15, 50 , 50);
        $this->Image('imagenes/logo3.jpg' , 85 ,15, 50 , 50);
        
        $this->SetFont('Times','',8);
        // Movernos a la derecha
        $this->Cell(590, 5, '', 0);
        // Título
        $this->MultiCell(200, 10, 'Hospital Regional de Alta Especialidad de Ixtapaluca.
'.$direccion.'', 0);
    $this->Cell(350, 10, '', 0);
    $this->Cell(400, -10, utf8_decode('ORDEN DE SUMINISTRO'), 0);
$this->SetFillColor(0, 128, 0);
$this->Ln(10);
$this->Cell(800, 1, '',0, 0, 'C', 'true');
        // Salto de línea
        $this->Ln(4);
    }
      function Footer()
   {
      
    //Posición: a 1,5 cm del final
    $this->SetY(-15);
    //Arial italic 8
    
    $this->SetFont('Arial','I',8);
    //Número de página
    $this->Image('imagenes/logopie.jpg' , -40 ,550, 925 , 35);
   $this->Cell(0,10,'Page '.$this->PageNo().'/{nb}',0,0,'C');
   
      }
    function cabeceraHorizontal($cabecera)
    {
        $this->SetXY(10, 70);
        $this->SetFont('Arial','B',10);
        foreach($cabecera as $fila)
        {
            //Atención!! el parámetro valor 0, hace que sea horizontal
     
    
    $this->Cell(84, 15, $fila,0, 0, 'L');
 

        }
    }
  }
 
    function formatMoney($number, $cents = 1) { // cents: 0=never, 1=if needed, 2=always
        if (is_numeric($number)) { // a number
          if (!$number) { // zero
            $money = ($cents == 2 ? '0.00' : '0'); // output zero
          } else { // value
            if (floor($number) == $number) { // whole number
              $money = number_format($number, ($cents == 2 ? 2 : 0)); // format
            } else { // cents
              $money = number_format(round($number, 2), ($cents == 0 ? 0 : 2)); // format
            } // integer or decimal
          } // value
          return '$'.$money;
        } // numeric
      } // formatMoney
      
    $domicilio = "ALMACÉN GENERAL DEL HOSPITAL REGIONAL DE ALTA ESPECIALIDAD DE IXTAPALUCA, CARRETERA FEDERAL MÉXICO-PUEBLA KM 34.5, ZOQUIAPAN, IXTAPALUCA, EDOMÉX.";
    $fecha=" DENTRO DE LOS 15 DIAS POSTERIORES A LA NOTIFICACION DE LA ORDEN DE SUMINISTRO";
    $direccion = utf8_decode('Dirección de Operaciones.
Centro Integral de Servicios Farmacéuticos.');

    while($row_s=$resultado->fetch_assoc()){
        $nombreproveedor = $row_s['nombre_proveedor'];
        $numerocontrato = rtrim($row_s['numero_pedido'], "-1");
    
    $pdf = new PDF('L','pt');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 8);
   // $pdf->Image('imagenes/images.png', 25 ,20, 50 , 50);
   // $pdf->Image('imagenes/logo3.jpg' , 85 ,20, 50 , 50);
    //$pdf->Cell(590, 5, '', 0);
   // $pdf->MultiCell(200, 10, 'Hospital Regional de Alta Especialidad de Ixtapaluca.
//'.$direccion.'', 0);
    //$pdf->Cell(350, 10, '', 0);
   // $pdf->Cell(400, -10, utf8_decode('ORDEN DE SUMINISTRO'), 0);
   //$pdf->Ln(5);
   // $pdf->SetFillColor(0, 128, 0);
    //$pdf->Ln(15);
   // $pdf->Cell(800, 1, '',0, 0, 'C', 'true');
    //$pdf->Ln(30);
    //$pdf->SetFont('Arial', '', 7);
    //$pdf->Cell(650, 35, '"ejemplo"',0);
    /*
    $pdf->Ln(25);
    $pdf->SetFont('Arial', '', 7);
    */
    $pdf->Ln(20);
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(300, -20, 'Subtotal: '.formatMoney($row_s['totalOrden']).'');
    $pdf->Ln(25);
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(300, -40, utf8_decode('I.V.A:       $ 0%'),'');
    $pdf->Ln(25);
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(30, -60, 'Total:       '.formatMoney($row_s['totalOrden']).'');
    $pdf->Ln(-20);
    $pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, ('Nombre, fecha y firma en que recibe y acepta el proveedor: '), 0);
    $pdf->Ln(85);
    /**$pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, ('Fecha en que recibe y acepta: '), 0);**/
    $pdf->Ln(-35);
    $pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, ('Firma administrador del contrato: '), 0);
    $pdf->Ln(55);
    $pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, utf8_decode('DR. HECTOR MARINO ZAVALA SANCHEZ 
DIRECTOR DE OPERACIONES '), 0);
    $pdf->Ln(5);
    /*
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(300, -70, utf8_decode('Número de procedimiento: ').$row_s['numero_procedimiento'], 0);
    $pdf->Ln(-25);
    $pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, ('Domicilio de entrega: ').utf8_decode($domicilio), 0);
    $pdf->Ln(5);
    $pdf->Cell(505, 25, '', 0);
    $pdf->MultiCell(300, 10, ('Fecha de entrega:').utf8_decode($fecha), 0);
    $pdf->Ln(25);
    */
    $pdf->SetFont('Arial', '', 7);
    $pdf->Cell(300, 30, ' ', 0);
    $pdf->Ln(-205);
    $pdf->Cell(110, 25, ('Nombre del proveedor: ').utf8_decode($row_s['nombre_proveedor']), 0);
    $pdf->Ln(20);
    $pdf->MultiCell(410, 10, ('Domicilio proveedor: ').utf8_decode($row_s['domicilio_proveedor']), 0);
    $pdf->Ln(0);
    $pdf->Cell(110, 15, 'Telefono: '.$row_s['telefono_proveedor'], 0);
    $pdf->Ln(17);
    $pdf->Cell(110, 5, 'Fax: ', 0);
    $pdf->Ln(15);
    $pdf->Cell(110, 5, 'Correo electronico: '.$row_s['email_proveedor'], 0);
    $pdf->Ln(25);
    $pdf->Cell(110, -10, utf8_decode('Número de contrato/pedido: ').$numerocontrato, 0);
    $pdf->Ln(25);
    $pdf->Cell(250, -30, utf8_decode('Número de orden de suministro: ').$num, 0);
    $pdf->Ln(25);
    $pdf->Cell(30, -50, 'Fecha: '.$row_s['fechaRegistro'], 0);
    $pdf->Ln(25);
    $pdf->Cell(300, -70, utf8_decode('Número de procedimiento: ').$row_s['numero_procedimiento'], 0);
    $pdf->Ln(-25);
    $pdf->MultiCell(300, 10, ('Domicilio de entrega: ').utf8_decode($domicilio), 0);
    $pdf->Ln(5);
    $pdf->MultiCell(300, 10, ('Fecha de entrega:').utf8_decode($fecha), 0);
    $pdf->SetFont('Arial', 'B', 7);
   
    $pdf->Ln(7);
    $pdf->SetFillColor(255, 230, 16);
    $pdf->SetTextColor(0,0,0);
    $pdf->SetDrawColor(0, 0, 0);
    
    $pdf->Cell(84, 15, 'Partida presupuestal',0, 0, 'C', 'true');
    $pdf->Cell(70, 15, 'Clave HRAEI' ,0, 0, 'C', 'true');
    $pdf->Cell(83, 15, 'CNIS',0, 0, 'C', 'true');
    $pdf->Cell(60, 15, 'CUCOP',0, 0, 'C', 'true');
    $pdf->Cell(300, 15, 'DESCRIPCION',0, 0, 'C', 'true');
    $pdf->Cell(40, 15, 'U.D.M',0, 0, 'C', 'true');
    $pdf->Cell(40, 15, 'Cantidad',0, 0, 'C', 'true');
    $pdf->Cell(70, 15, 'Precio unitario',0, 0, 'C', 'true');
    $pdf->Cell(60, 15, 'Importe',0, 0, 'C', 'true');
   
   
    
    $pdf->Ln(16);
    $pdf->SetFont('Arial', '', 7);

    $pdf->tablewidths = array(84,80,83,60,300,40,40,70,50);

    $item = 0;
 
   
while($fila=$result->fetch_assoc()){
 

$a=$fila['partidaPresupuestal'];
$b=$fila['claveHraei'];
$c=$fila['cuadroBasico'];
$d=$fila['cucop'];
$e=$fila['descripcionDelBien'];
$f=$fila['unidadMedida'];
$i=$fila['cantidad'];
$j=formatMoney($fila['precioUnitario']);
$k=formatMoney($fila['importe']);
$l=formatMoney($row_s['totalOrden']);


$data[] = array(utf8_decode($a),utf8_decode($b),utf8_decode($c),utf8_decode($d),utf8_decode($e),utf8_decode($f),utf8_decode($i),utf8_decode($j),utf8_decode($k));

}


$pdf->morepagestable($data);

//$pdf->AddPage();
$pdf->Ln(0);
$pdf->SetFont('Times', '', 7);
/*
$pdf->MultiCell(799, 10, '                                                                                                                                                                                                                                                                                                                                                                                                                    SUBTOTAL' .formatMoney($row_s['totalOrden']).'
                                                                                                                                                                                                                                                                                                                                                                                                                                      IVA $ 0%
                                                                                                                                                                                                                                                                                                                                                                                                                            TOTAL'.formatMoney($row_s['totalOrden']).'',1, 'C', '');


$pdf->SetTextColor(0,0,0);
$pdf->Ln(3);
$new = $pdf->Cell(800, 15, 'Observaciones',0, 1, 'C', 'true');
$pdf->Ln(5);
$pdf->SetTextColor(0,0,0);
$pdf->Cell(250, 10, utf8_decode($row_s['nombre_proveedor']) ,1,0, 'C', '');
$pdf->Cell(300, 10, 'FECHA EN QUE RECIBE Y ACEPTA EL PROVEEDOR' ,1,0, 'C', '');
$pdf->Cell(251, 10, 'ADMINISTRADOR DEL CONTRATO' ,1,1, 'C', '');
$pdf->Cell(250, 72, 'Nombre y firma de proveedor',1, 0, 'C', '');
$pdf->Cell(300, 72, '',1, 0, 'C', '');
$pdf->MultiCell(251, 8, utf8_decode('





--------------------------------------------------------------------------------------------------------
MTRA. MARÍA DEL CARMEN ESPINOZA REYES 
RESPONSABLE DEL CENTRO INTEGRAL DE SERVICIOS FARMACÉUTICOS'),1, 'C', '');



*/

    

$pdf->Output("$nombreproveedor $num2.pdf", 'I');
}
//Salida del documento

    
?>