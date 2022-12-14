<?php
error_reporting(0);
require_once ('app/lib/pdf/fpdf.php');
require 'conexion.php';
date_default_timezone_set("America/Mexico_City");
$hoy=date("Y-m-d");    
$total = base64_decode($_GET['valor3']);
$valor= base64_decode($_GET['valor']);
$edita= mysqli_query($conexion2, $querY); 
$var= base64_decode($_GET['var']);
$num = base64_decode($_GET['valor2']);
$fecha2= base64_decode($_GET['fecha']);
$fechaLimite= base64_decode($_GET['fechaLimite']);

$sql2 = "SELECT *, numeroorden.totalOrden, ordensuministro.claveHraei, ordensuministro.descripcionDelBien, ordensuministro.unidadMedida, ordensuministro.minimo, ordensuministro.maximo, ordensuministro.id_ordenSuministro, ordensuministro.cantidad, ordensuministro.precioUnitario,
ordensuministro.importe, ordensuministro.claveUnicaOrden, ordensuministro.claveContrato, ordensuministro.diasVencidos, ordensuministro.procentaje, ordensuministro.totalPenalizacion from proveedores inner join numeroorden on numeroorden.claveUnicaContrato='$num' inner join ordensuministro on ordensuministro.claveUnicaOrden = '$num' and ordensuministro.claveContrato = $var and ordensuministro.cumplioEntrega = 'no' where id_proveedor= $var ";
$resultado = mysqli_query($conexion2, $sql2);
//$row2 = mysqli_fetch_assoc($resultado);
$sql = "SELECT ordensuministro.partidaPresupuestal, ordensuministro.claveHraei, ordensuministro.cuadroBasico, ordensuministro.cucop, ordensuministro.descripcionDelBien, 
ordensuministro.unidadMedida, ordensuministro.minimo, ordensuministro.maximo, ordensuministro.id_ordenSuministro, ordensuministro.cantidad, ordensuministro.precioUnitario,
ordensuministro.importe, ordensuministro.claveUnicaOrden, ordensuministro.claveContrato, proveedores.nombre_proveedor, proveedores.domicilio_proveedor, proveedores.telefono_proveedor,
proveedores.email_proveedor, proveedores.numero_pedido, proveedores.numero_procedimiento, numeroorden.totalOrden, numeroorden.fechaRegistro, oficiosPenalizcion.numOficioPenalizacion from ordensuministro inner join proveedores on proveedores.id_proveedor =$var inner join numeroorden on claveUnicaContrato = '$num' inner join oficiospenalizcion on oficiospenalizcion.numOficioPenalizacion ='$valor' and ordensuministro.claveUnicaOrden ='$num' and ordensuministro.claveContrato =$var and ordensuministro.cumplioEntrega = 'no'";
$result = mysqli_query($conexion2, $sql);

class PDF extends FPDF {

    var $tablewidths;
    var $footerset;
    
    function _beginpage($orientation, $size) {
     $this->page++;
    
    // Resuelve el problema de sobrescribir una p??gina si ya existe.
     if(!isset($this->pages[$this->page])) 
      $this->pages[$this->page] = '';
     $this->state  =2;
     $this->x = $this->lMargin;
     $this->y = $this->tMargin;
     $this->FontFamily = '';
    
     // Compruebe el tama??o y la orientaci??n.
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
    
      // Nuevo tama??o o la orientaci??n
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
    
    function Footer() {
    
     // Compruebe si pie de p??gina de esta p??gina ya existe ( lo mismo para Header ( ) )
     if(!isset($this->footerset[$this->page])) {
      $this->SetY(-15);
    
      // Numero de Pagina
      $this->Cell(0,10,'Pagina '.$this->PageNo().'/{nb}',0,0,'C');
    
      // Conjunto Footerset
      $this->footerset[$this->page] = true;
     }
    }
    
    function morepagestable($datas, $lineheight=13) {
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
    
      // Escribir el contenido y recordar la altura de la m??s alta columna
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
    
      // Obtener la altura est??bamos en la ??ltima p??gina utilizada
      $h = $tmpheight[$row.'-'.$maxpage];
    
      //Establecer el "puntero " al margen izquierdo
      $l = $this->lMargin;
    
      // Establecer el "$currpage en la ultima pagina
      $currpage = $maxpage;
     }
    
     // Dibujar las fronteras
     // Empezamos a a??adir una l??nea horizontal en la ??ltima p??gina
     $this->page = $maxpage;
     $this->Line($l,$h,$fullwidth+$l,$h);
     // Ahora empezamos en la parte superior del documento
     for($i = $startpage; $i <= $maxpage; $i++) {
      $this->page = $i;
      $l = $this->lMargin;
      $t  = ($i == $startpage) ? $startheight : $this->tMargin;
      $lh = ($i == $maxpage)   ? $h : $this->h-$this->bMargin;
      $this->Line($l,$t,$l,$lh);
      foreach($this->tablewidths AS $width) {
       $l += $width;
       $this->Line($l,$t,$l,$lh);
      }
     }
     // Establecerlo en la ??ltima p??gina , si no que va a causar algunos problemas
     $this->page = $maxpage;
    }
    public function DrawHeader($header, $w) {
        // Colors, line width and bold font
        // Header
        $this->SetFillColor(233, 136, 64);
        $this->SetTextColor(255);
        $this->SetDrawColor(128, 0, 0);
        $this->SetLineWidth(0.3);
        $this->SetFont('', 'B');        
        $num_headers = count($header);
        for($i = 0; $i < $num_headers; ++$i) {
            $this->Cell($w[$i], 7, $header[$i], 1, 0, 'C', 1);
        }
        $this->Ln();
        // Color and font restoration
        $this->SetFillColor(224, 235, 255);
        $this->SetTextColor(0);
        $this->SetFont('');
    }
    function Header()
{
    // Logo
    //$this->Image('imagenes/images.png', 25 ,20, 50 , 50);
    //$this->Image('imagenes/logo3.jpg' , 85 ,20, 50 , 50);
    // Arial bold 15
    //$this->SetFont('Arial','B',15);
    // Movernos a la derecha
    //$this->Cell(80);
    // T??tulo
    //$this->Cell(30,10,'Title',1,0,'C');
    // Salto de l??nea
    //$this->Ln(20);
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
    $domicilio = "ALMAC??N GENERAL DEL HOSPITAL REGIONAL DE ALTA ESPECIALIDAD DE IXTAPALUCA, CARRETERA FEDERAL M??XICO-PUEBLA KM 34.5, ZOQUIAPAN, IXTAPALUCA, EDOM??X.";
    $fecha="QUINCE DIAS NATURALES CONTADOS A PARTIR DEL SIGUIENTE D??A H??BIL DE LA EMIS??N DE ESTA ??RDEN DE SUMINISTRO";
    while($row_s=$resultado->fetch_assoc()){
    $pdf = new PDF('L','pt');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 9);
    $pdf->Image('imagenes/images.png', 25 ,20, 50 , 50);
    $pdf->Image('imagenes/logo3.jpg' , 85 ,20, 50 , 50);
    $pdf->Cell(570, 5, '', 0);
    $pdf->MultiCell(220, 10, utf8_decode('Hospital Regional de Alta Especialidad de Ixtapaluca.
Centro Integral del Servicios Farmac??uticos.'), 0);
    $pdf->Cell(45, 10, '', 0);
    $pdf->SetFillColor(0, 128, 0);
    $pdf->Ln(28);
    $pdf->Cell(800, 1, '',0, 0, 'C', 'true');
    $pdf->Ln(-30);
    $pdf->SetFont('Arial', '', 9);
    //$pdf->Cell(650, 35, '"ejemplo"',0);
    $pdf->Ln(43);
    $pdf->SetFont('Arial', '', 9);
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(300, 25, utf8_decode('Ixtapaluca, Estado de M??xico a ').date('d-m-Y').'', 0);
    $pdf->Ln(25);
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(300, 25, utf8_decode('Oficio N??. ').$valor, 0);
    $pdf->Ln(25);
    $pdf->Cell(505, 25, '', 0);
    $pdf->Cell(30, 25, utf8_decode('Asunto: C??lculo para aplicaci??n de pena convencional'), 0);
    $pdf->Ln(25);
   
    $pdf->SetFont('Arial', '', 10);
    $pdf->Cell(300, 30, ' ', 0);
    $pdf->Ln(10);
    $pdf->Cell(110, 25, 'Nombre del proveedor: '.$row_s['nombre_proveedor'], 0);
    $pdf->Ln(25);
    $pdf->MultiCell(410, 10, ('Presente: '), 0);
    $pdf->Ln(10);
    $pdf->MultiCell(910, 12, utf8_decode('Por este medio me permito externderle un cordial saludo y en relacion a la orden de suministro '.$num.' emitida con fecha '.$row_s['fechaRegistro'].' derivado de la 
adjudicaci??n en favor del proveedor '.$row_s['nombre_proveedor'].', relativo al contrato '.$row_s['numero_pedido'].' para la entrega de los siguientes insumos.'), 0);

  
    $pdf->SetFont('Arial', 'B', 8);
   
    $pdf->Ln(20);
    $pdf->SetFillColor(0, 128, 0);
    $pdf->SetTextColor(255,255,255);
    $pdf->SetDrawColor(0, 0, 0);
    
    $pdf->Cell(84, 15, 'PartidaPresupuestal',0, 0, 'C', 'true');
    $pdf->Cell(65, 15, 'Clave HRAEI' ,0, 0, 'C', 'true');
    $pdf->Cell(80, 15, 'Cuadro basico',0, 0, 'C', 'true');
    $pdf->Cell(60, 15, 'CUCOP',0, 0, 'C', 'true');
    $pdf->Cell(260, 15, 'DESCRIPCION',0, 0, 'C', 'true');
    $pdf->Cell(80, 15, 'Unidad de medida',0, 0, 'C', 'true');
    $pdf->Cell(40, 15, 'Cantidad',0, 0, 'C', 'true');
    $pdf->Cell(70, 15, 'Precio unitario',0, 0, 'C', 'true');
    $pdf->Cell(60, 15, 'Importe',0, 0, 'C', 'true');
   
    
    $pdf->Ln(16);
    $pdf->SetFont('Arial', '', 8);
    $pdf->SetTextColor(0,0,0);
    $pdf->tablewidths = array(84,65,80,60,260,80,40,70,60);

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



$data[] = array(utf8_decode($a),utf8_decode($b),utf8_decode($c),utf8_decode($d),utf8_decode($e),utf8_decode($f),utf8_decode($i),utf8_decode($j),utf8_decode($k));

 
}
  

$pdf->morepagestable($data);
$pdf->AddPage();
$pdf->SetFont('Arial', '', 9);
$pdf->Image('imagenes/images.png', 25 ,20, 50 , 50);
$pdf->Image('imagenes/logo3.jpg' , 85 ,20, 50 , 50);
$pdf->Cell(570, 5, '', 0);
$pdf->MultiCell(220, 10, utf8_decode('Hospital Regional de Alta Especialidad de Ixtapaluca.
Centro Integral del Servicios Farmac??uticos.'), 0);
$pdf->SetFont('Arial', '', 10);
$pdf->Cell(590, 5, '', 0);
$pdf->Ln(50);
$pdf->MultiCell(910, 12, utf8_decode('Al respecto me permito informale que a pesar de que el proveedor '.$row_s['nombre_proveedor'].' contaba con 15 dias naturales contados a partir del siguiente d??a
h??bil de la emisi??n de la orden de suministro para la entrega de los insumos, se autoriz?? la recepci??n de los mismos con fechas posteriores en virtud de que existe la necesidad 
de estos para dar continuidad a los tratamientos farmacol??gicos de los pacientes del Hospital.



Por los anterior. se adjunta el calculo realizado para determinar el importe de la pena convencional a que se hizo acreedor '.$row_s['nombre_proveedor'].', a fin de que 
se lleven a cabo las gestiones que correspondan para aplicar la sanci??n.



Sin otro particular quedo a sus ??rdenes.



Atentamente
La Responsable del Centro Intergal de
Servicios Farmac??uticos




Lic. Mar??a del Carmen Espinoza Reyes



c.c.p Dr. H??ctor Zavala S??nchez.- Director de opreaciones
c.c.p Dr. Gilberto Adri??n Gasca L??pez.- Director M??dico
c.c.p Lic. Jes??s Antonio Alcaraz Granados.- Subdirector de Recursos Materiales
c.c.p Lic. Juan Manuel Rivera Garrido.- Subdirector de Recursos Financieros'), 0);

$pdf->SetTextColor(255,255,255);
$pdf->AddPage();

$pdf->SetFont('Arial', 'B', 8);
$pdf->Image('imagenes/images.png', 25 ,20, 50 , 50);
$pdf->Image('imagenes/logo3.jpg' , 85 ,20, 50 , 50);
$pdf->Cell(570, 5, '', 0);
$pdf->MultiCell(220, 10, utf8_decode('Hospital Regional de Alta Especialidad de Ixtapaluca.
Centro Integral del Servicios Farmac??uticos.'), 0);
$pdf->Ln(40);

$pdf->SetFillColor(0, 128, 0);
$pdf->SetTextColor(255,255,255);
$pdf->SetDrawColor(0, 0, 0);

$pdf->Cell(80, 25, 'Nombre proveedor',0, 0, 'C', 'true');
$pdf->Cell(80, 25, 'Fecha de entrega' ,0, 0, 'C', 'true');
$pdf->Cell(80, 25, 'N de orden',0, 0, 'C', 'true');
$pdf->Cell(60, 25, 'Clave HRAEI',0, 0, 'C', 'true');
$pdf->Cell(140, 25, 'Descripcion del bien',0, 0, 'C', 'true');
$pdf->Cell(40, 25, 'U D M',0, 0, 'C', 'true');
$pdf->Cell(40, 25, 'Cantidad',0, 0, 'C', 'true');
$pdf->Cell(40, 25, 'Precio',0, 0, 'C', 'true');
$pdf->Cell(40, 25, 'Total',0, 0, 'C', 'true');
$pdf->Cell(53, 25, 'Fecha limite',0, 0, '', 'true');
$pdf->Cell(40, 25, 'Dias',0, 0, '', 'true');
$pdf->Cell(40, 25, '%',0, 0, '', 'true');
$pdf->Cell(60, 25, 'Monto',0, 0, '', 'true');

$pdf->Ln(26);
$pdf->SetFont('Arial', '', 8);
$pdf->SetTextColor(0,0,0);
$pdf->tablewidths = array(80,80,80,60,140,40,40,40,40,53,40,40,60);

$item = 0;





$a=$row_s['nombre_proveedor'];
$b=$fecha2;
$c=$num;
$d=$row_s['claveHraei'];
$e=$row_s['descripcionDelBien'];
$f=$row_s['unidadMedida'];
$i=$row_s['cantidad'];
$j=formatMoney($row_s['precioUnitario']);
$k=formatMoney($row_s['importe']);
$l=$fechaLimite;
$m=$row_s['diasVencidos'];
$o=$row_s['procentaje'];
$p=formatmoney($row_s['totalPenalizacion']);



$data2[] = array(utf8_decode($a),utf8_decode($b),utf8_decode($c),utf8_decode($d),utf8_decode($e),utf8_decode($f),utf8_decode($i),utf8_decode($j),utf8_decode($k),utf8_decode($l),utf8_decode($m),utf8_decode($o),utf8_decode($p));
    
}

$pdf->morepagestable($data2);
$pdf->Ln(70);
$pdf->Cell(793,15, '                                                                                                                                                                                                                                                                                                                             TOTAL '.formatMoney($resultado2['totalPenalizacion']), 1,0);


$pdf->Output('Orden Suministro.pdf', 'I');
    
//Salida del documento
      
?>