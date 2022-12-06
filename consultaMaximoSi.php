<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <script src="iconos/js/all.min.js"></script>
    <link rel="stylesheet" href="iconos/css/all.min.css">
    <link rel="stylesheet" href="iconos/css/all.css">
    <link rel="stylesheet" href="css/style.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>

</head>
<style>
    th{
        font-size: 13px;
    }
    td{
        font-size: 13px;
    }
</style>
<body>
    <?php

require "conexion.php";
$sql = $conexion2->query("SELECT COUNT(*) total FROM listamedicamento where cantidad >= maximoconsumo and fechaContrato = 2022");
    $fila = mysqli_fetch_assoc($sql);
$tabla="";
$query="SELECT id_medicamento, 
PROVEEDOR,
otroLaboratorio, 
CLAVEHRAEI, 
UNIDADDEMEDIDA, 
PRECIOUNITARIO, 
MINIMOCONSUMO, 
MAXIMOCONSUMO,
cantidad, 
MINIMOPRECIO, 
MAXIMOPRECIO, LEFT(DESCRIPCION,400) AS DESCRIPCION, count(*) total, numeroContrato, farmacia FROM listamedicamento where cantidad >= maximoconsumo and fechaContrato = '2022' group by listamedicamento.CLAVEHRAEI asc ";

if(isset($_POST['alumnos']))
{
	$q=$conexion2->real_escape_string($_POST['alumnos']);
	$query="SELECT id_medicamento,  
    PROVEEDOR,
    otroLaboratorio, 
    CLAVEHRAEI,  
    UNIDADDEMEDIDA, 
    PRECIOUNITARIO, 
    MINIMOCONSUMO, 
    MAXIMOCONSUMO,
    cantidad, 
    MINIMOPRECIO, 
    MAXIMOPRECIO, LEFT(DESCRIPCION,400) AS DESCRIPCION, numeroContrato, farmacia FROM listamedicamento where
		listamedicamento.id_medicamento LIKE '%".$q."%' OR
		listamedicamento.PROVEEDOR LIKE '%".$q."%' OR
        listamedicamento.otroLaboratorio LIKE '%".$q."%' OR
        listamedicamento.CLAVEHRAEI LIKE '%".$q."%' OR
        listamedicamento.DESCRIPCION LIKE '%".$q."%' OR
        listamedicamento.UNIDADDEMEDIDA LIKE '%".$q."%' OR
        listamedicamento.PRECIOUNITARIO LIKE '%".$q."%' OR
        listamedicamento.MINIMOCONSUMO LIKE '%".$q."%' OR
        listamedicamento.MAXIMOCONSUMO LIKE '%".$q."%' OR
        listamedicamento.cantidad LIKE '%".$q."%' OR
        listamedicamento.MINIMOPRECIO LIKE '%".$q."%' OR
        listamedicamento.numeroContrato LIKE '%".$q."%' OR
        listamedicamento.farmacia LIKE '%".$q."%' OR
		listamedicamento.MAXIMOPRECIO  LIKE '%".$q."%' group by listamedicamento.CLAVEHRAEI";
}
//En caso de fallo en consulta probar con esta opcion
//$buscarAlumnos=mysqli_query($conexion2,$query);
//if (mysqli_num_rows($buscarAlumnos)>0)

$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	
    '
    <strong style="float: left; margin-left: 45%; font-size: 25px; font-style: italic; margin-top: -35px;"><label>Maximos alcanzados <input type="text" value='.$fila['total'].'></label></strong>
    
    
        <table id="ghatable" class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
        
            <tr style="background-color: #7C7C7C; color: white; font-size:15px; font-style: italic">
            <th scope="col">Proveedor</th>
            <th scope="col">N° de contrato</th>
            <th scope="col">Farmacia</th>
            <th scope="col">Clave HRAEI</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Unidad de medida</th>
            <th scope="col">Precio unitario</th>
            <th scope="col">Minimo consumo</th>
            <th scope="col">Maximo consumo</th>
            <th scope="col">Consumo real</th>
            <th scope="col">Minimo precio</th>
            <th scope="col">Maximo precio</th>
			
        </tr>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	
		
		$tabla.=
        '
        <tr>

            <td>'.$filaAlumnos['PROVEEDOR'].'</td>
            <td>'.$filaAlumnos['numeroContrato'].'</td>
            <td>'.$filaAlumnos['farmacia'].'</td>
            <td>'.$filaAlumnos['CLAVEHRAEI'].'</td>
            <td>'.$filaAlumnos['DESCRIPCION'].'</td>
            <td>'.$filaAlumnos['UNIDADDEMEDIDA'].'</td>
            <td>$'.$filaAlumnos['PRECIOUNITARIO'].'</td>
            <td>'.$filaAlumnos['MINIMOCONSUMO'].'</td>
            <td>'.$filaAlumnos['MAXIMOCONSUMO'].'</td>
            <td>'.$filaAlumnos['cantidad'].'</td>
            <td>$'.$filaAlumnos['MINIMOPRECIO'].'</td>
            <td>$'.$filaAlumnos['MAXIMOPRECIO'].'</td>
			
			
			</tr>
         
        ';
		
		
	}

	$tabla.='</table>';
	$conexion2->close();
} else
	{
		$tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
	}


echo $tabla;

?>
  

</body>

</html>