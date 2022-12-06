<style>
            .titulo {
            
            font-size:27px;
            color : blue;
            text-align : center;
        }
        .titulo2 {
            
            font-size:27px;
            color : red;
            text-align : center;
        }
    </style>
<?php 
error_reporting(0);
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
	require 'conexion.php';
    $numerocontrato = $_POST['ID_usuario'];
    
	$sql = "SELECT COUNT(*) total FROM proveedores WHERE numero_pedido = '$numerocontrato' and year = '2021'";
    $result = mysqli_query($conexion2, $sql);
    $fila = mysqli_fetch_assoc($result);

    
    $tabla="";
    $query="SELECT id_proveedor, 
    nombre_proveedor,  
    rfc_proveedor, 
    telefono_proveedor, 
    direccion_internet, 
    email_proveedor, 
    numero_pedido, 
    suficiencia_presupuestaria,
    requisicion,
    total_minimo,
    total_maximo,
    tipoFarmacia,
    vigencia_pedido_final,
    LEFT(domicilio_proveedor,40) AS domicilio_proveedor FROM proveedores where numero_pedido = '$numerocontrato' and year = '2021'";
    

    $buscarAlumnos=mysqli_query($conexion2,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        $tabla.= 
        
        '
        <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 40px; font-style: italic;"><label>Total de contratos <input type="text" value='.$fila['total'].'></label></strong>
        <table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
       
            <tr style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <th scope="col">Nombre proveedor</th>
                <th scope="col">RFC proveedor</th>
                <th scope="col">Telefono proveedor</th>
                <th scope="col">Tipo de contrato</th>
                <th scope="col">Email</th>
                <th scope="col">Numero pedido</th>
                <th scope="col">Monto minimo</th>
                <th scope="col">Monto maximo</th>
                <th scope="col">Monto consumido</th>
                <th scope="col">Estatus minimo</th>
                <th scope="col">Fecha vencimiento</th>
                <th scope="col">Vencimiento</th>
             
                
            </tr>';
          
        $fecha_actual = new DateTime(date('Y-m-d'));
        while($filaAlumnos= $buscarAlumnos->fetch_assoc())
        {
            $id = $filaAlumnos['id_proveedor'];
            $minimo = $filaAlumnos['total_minimo'];
            $maximo = $filaAlumnos['total_maximo'];
           $sql = $conexion2->query("SELECT sum(importe) as total from ordensuministro  where claveContrato = $id");
    $row = mysqli_fetch_assoc($sql);
    $totalContrato = $row['total'];
                $fecha_final = new DateTime($filaAlumnos['vigencia_pedido_final']);
                $dias = $fecha_actual->diff($fecha_final)->format('%r%a');
                // Si la fecha final es igual a la fecha actual o anterior
                 if ($dias <= 0) {
                    /*echo '<td><button class="btn btn-danger" style="width: 50px; height: 20px;  text-size:10px; color: black;"></button></td>';*/
                }elseif ($dias <= 15) {
                    /*echo '<td>Está a ' . $dias . ' días de vencer</td>';*/
                } else {
                    /*echo '<td></td>';*/
                }
                $MINIMOOK = "<i class='lnr lnr-flag'></i>";
                $sincubrir = "<i class='lnr lnr-flag'></i>";
                $valor = base64_encode($filaAlumnos['id_proveedor']);
                $name = base64_encode($filaAlumnos['nombre_proveedor']);
                $contrato = base64_encode($filaAlumnos['numero_pedido']);
            if($totalContrato >= $minimo ){
                $cubierto = "<span class='titulo'> $MINIMOOK";
            }elseif($totalContrato >= $maximo ){
                $cubierto = "Maximo cubierto ";
            }elseif($totalContrato < $minimo ){
                $cubierto = "<span class='titulo2'> $sincubrir";
            }
            $tabla.=
            '<tr>
            <input type="hidden" id="nombre" value="'.$name.'">
                
                <td>'.$filaAlumnos['nombre_proveedor'].'</td>
                <td>'.$filaAlumnos['rfc_proveedor'].'</td>
                <td>'.$filaAlumnos['telefono_proveedor'].'</td>
                <td>'.$filaAlumnos['tipoFarmacia'].'</td>
                <td>'.$filaAlumnos['email_proveedor'].'</td>
                <td>'.$filaAlumnos['numero_pedido'].'</td>
                <td>'.formatMoney($filaAlumnos['total_minimo']).'</td>
                <td>'.formatMoney($filaAlumnos['total_maximo']).'</td>
                <td>'.formatMoney($totalContrato).'</td>
                <td>'.$cubierto.'</td>
                <td>'.$filaAlumnos['vigencia_pedido_final'].'</td>
                <td>A '.$dias.' dias de vencer</td>
                
                            
                
             </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
       
    }
      
    echo $tabla;
    
    ?>
      