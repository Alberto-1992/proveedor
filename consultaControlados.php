<?php 
error_reporting(0);


	require 'conexion.php';
  
    $tabla="";
    $query="SELECT *
     from controlados ";
       $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        $tabla.= 
        
        '
        <table id="ghatable"  class="table table-striped table-darkgray"  cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>ID</td>
                <td>Nombre medicamento</td>
                <td>Presentacion</td>
                <td>Salida</td>
                <td>Utilizado</td>
                
    
             
                
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
         
            $tabla.=
            '
            <tr onkeyup="myFunction(this)">
            <td>'.$row['id_control'].'</td>
            <td>'.$row['nombremedicamento'].'</td>
            <td>'.$row['presentacion'].'</td>
            <td>'.$row['salida'].'</td>
             <td id="id_controlado" data-id_control='.$row['id_control'].' contenteditable>'.$row['id_proveedor'].'</td>
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>