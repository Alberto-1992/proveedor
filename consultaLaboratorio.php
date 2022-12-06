 <script>
          $(document).on("blur", "#caducidad", function(){

            let id= $(this).data("id_caducidad");
            let nombre = $(this).text();
            actualizar_datos(id, nombre, "caducidad");
        });
        $(document).on("blur", "#contrato", function(){

            let id= $(this).data("id_contrato");
            let nombre = $(this).text();
            actualizar_datos(id, nombre, "numeroContrato");
        });
        function actualizar_datos(id, texto, columna){

                $.ajax({
                url: 'consultaActualizaFactura.php',
                method: 'POST',
                data: {id:id, texto:texto, columna:columna},
                succes: function(data){

                }

            })

            }
     </script>         
<?php 

  require'conexion.php';
  $laboratorio = $_POST['laboratorio'];
  $query2="SELECT sum(total) as total2 from facturas where nombre_laboratorio = '$laboratorio'";
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
     from facturas where nombre_laboratorio = '$laboratorio' ";
     
    
    
    

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        
        $tabla.= 
        
        '
        <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 70px; font-style: italic;"><label>Total facturas<input type="text" value='.formatMoney($result2['total2']).'></label>
       <a href="exportExcelFacturasLaboratorio?factura='.$laboratorio.'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px"></a></i></strong>
        <table id="ghatable" class="table table-striped table-darkgray table-hover" cellspacing="0" width="100%"   >
       
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <td>Numero factura</td>
                <td>Numero contrato</td>
                <td>Fecha factura</td>
                <td>Nombre proveedor</td>
                <td>CLAVE HRAEI</td>
                <td>Descripcion</td>
                <td>Caducidad</td>
                <td>Cantidad</td>
                <td>Costo unitario</td>
                <td>Total</td>
                
    
             
                
            </tr>';
       
    while($row= $buscarAlumnos->fetch_assoc())
        {
         
            
            
            $tabla.=
            '
            <tr>
            <td>'.$row['num_factura'].'</td>
            <td id="contrato" name="valor1" data-id_contrato='.$row['id_factura'].' contenteditable>'.$row['numeroContrato'].' </td>
            <td>'.$row['fecha_factura'].'</td>
            <td>'.$row['nombre_laboratorio'].'</td>
            <td>'.$row['clavehraei'].'</td>
            <td>'.$row['descripcion'].'</td>
            <td id="caducidad" name="valor1" data-id_caducidad='.$row['id_factura'].' contenteditable>'.$row['caducidad'].' </td>
            <td>'.$row['cantidad'].'</td>
            <td>'.formatMoney($row['costounitario']).'</td>
            <td>'.formatMoney($row['total']).'</td>
            
            </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
        $tabla="No se encontraron coincidencias con sus criterios de búsqueda.";
    }
      
    echo $tabla;
    
    ?>
