<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<link rel="stylesheet" href="iconos/css/all.min.css?n=1">
	<link rel="stylesheet" href="iconos/css/all.css?n=1">
	<link rel="stylesheet" href="css/style.css?n=1">
	<script src="iconos/js/all.min.js"></script>	
	
	
</head>

<body>
<?php
require "conexion.php";
error_reporting(0);
$val = $_POST['ID_usuario'];

$tabla="";
$query="SELECT *
FROM seguimiento where clavehraei = '$val' and movimiento = 'salida'";


//En caso de fallo en consulta probar con esta opcion
//$buscarAlumnos=mysqli_query($conexion2,$query);
//if (mysqli_num_rows($buscarAlumnos)>0)

$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	
    '
    
        <table class="table table-striped table-darkgray" style="margin-top: 0px; margin-left:-18px;">
        
          <thead>
            <tr style="background-color: #7C7C7C; color: white; font-size:15px; font-style: italic">

            <th scope="col">CLAVE HRAEI</th>
            <th scope="col">CANTIDAD</th>
            <th scope="col">MOVIMIENTO</th>
            <th scope="col">UBICACION</th>
            <th scope="col">FECHA</th>
   	
        </tr>
        </thead>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	

		$total += $filaAlumnos['cantidad'];
		$mensaje = "EL TOTAL DE SALIDAS SON:   ";
		$tabla.=
        '  <tbody>
     
        <tr>
		 
            <td>'.$filaAlumnos['clavehraei'].'</td>
            <td>'.$filaAlumnos['cantidad'].'</td>
            <td>'.$filaAlumnos['movimiento'].'</td>
            <td>'.$filaAlumnos['ubicacion'].'</td>
            <td>'.$filaAlumnos['fecha'].'</td>
  
			</tr>
            </tbody>
         
        ';
		
		
	}

	$tabla.='</table>';
	$conexion2->close();
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;
echo $mensaje, $total;

?>
   </body>
   </html>