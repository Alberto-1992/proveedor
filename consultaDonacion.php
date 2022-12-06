<!DOCTYPE html>
<html>
    <link href="https://framework-gb.cdn.gob.mx/favicon.ico" rel="shortcut icon">
	<script src="iconos/js/all.min.js"></script>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
	<link rel="stylesheet" href="iconos/css/all.css?n=1">
	<link rel="stylesheet" href="css/style.css?n=1">
	<script src="iconos/js/all.min.js"></script>
    

    <div class="imagenCisfa" style="margin-top: -40px; "></div>
    <title>Ordenes de suministro</title>

</style>

<body>
              
<?php 

  require'conexion.php';
  $donacion = $_POST['donacion'];
  $query2="SELECT sum(cantidadrecibida) as total from donaciones where numerodonacion = '$donacion'";
    $resul = mysqli_query($conexion2, $query2);
    $result2 = mysqli_fetch_assoc($resul);
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
    $tabla="";
    $query="SELECT *
     from donaciones where numerodonacion = '$donacion' ";
     
    
    
    

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        
        $tabla.= 
        
        '
        <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 70px; font-style: italic;"><label>Total donaciones<input type="text" value='.$result2['total'].'></label>
       <a href="exportExcelDonacion" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i></strong>
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>Clave HRAEI</td>
                <td>Cadro basico</td>
                <td>Descripcion</td>
                <td>Unidad de medida</td>
                <td>Cantidad recibida</td>
                <td>Lote</td>
                <td>Caducidad</td>
                <td>Numero de donación</td>
                
    
             
                
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
         
            
            
            $tabla.=
            '
            <tr>
            <td>'.$row['clavehraei'].'</td>
            <td>'.$row['cuadrobasico'].'</td>
            <td>'.$row['descripcion'].'</td>
            <td>'.$row['unidadmedida'].'</td>
            <td>'.$row['cantidadrecibida'].'</td>
            <td>'.$row['lote'].'</td>
            <td>'.$row['caducidad'].'</td>
            <td>'.$row['numerodonacion'].'</td>
            
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>
   </body>
   </html>