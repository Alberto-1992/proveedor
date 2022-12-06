<?php 
error_reporting(0);

$lab = $_POST['lab'];
$dateFrom1 = $_POST['dateFrom1'];
$dateTo1 = $_POST['dateTo1'];


$lab2 = base64_encode($lab);
$dateFrom2 = base64_encode($dateFrom1);
$dateTo2 = base64_encode($dateTo1);

	require 'conexion.php';
  
    $tabla="";
    $query="SELECT *
     from consumoscisfa where central LIKE '$lab%' and fecha between '$dateFrom1' and '$dateTo1' limit 4000";
     
    $sql="SELECT sum(cantidad) as total
     from consumoscisfa where central LIKE '$lab%' and fecha between '$dateFrom1' and '$dateTo1'";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);
   





    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        
        $tabla.= 
        
        '
    <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 70px; font-style: italic;"><label>Total de salidas <input type="text" value='.$fila['total'].'></label><a href="exportExcelUnidad?lab='.$lab2.'&dateFrom2='.$dateFrom2.'&dateTo2='.$dateTo2.'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i></strong>
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>CLAVE HAREI</td>
                <td>DESCRIPCION</td>
                <td>CANTIDAD</td>
                <td>FECHA</td>
                <td>CENTRAL</td>
                
    
             
                
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
         
            
            
            $tabla.=
            '
            <tr>
            <td>'.$row['clavehraei'].'</td>
            <td>'.$row['descripcion'].'</td>
            <td>'.$row['cantidad'].'</td>
            <td>'.$row['fecha'].'</td>
            <td>'.$row['central'].'</td>
               
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>
