<style>
            .titulo {
            
            font-size:14px;
            color : green;
            text-align : center;
        }
        .titulo2 {
            
            font-size:14px;
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
    
	$sql = "SELECT COUNT(*) total FROM datospersonales WHERE year = '2021'";
    $result = mysqli_query($conexion3, $sql);
    $fila = mysqli_fetch_assoc($result);

    
    $tabla="";
    $query="SELECT * FROM datospersonales where year = '2021' ORDER by id_datopersonal desc";
    

    $buscarAlumnos=mysqli_query($conexion3,$query);
    if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
    {
        $tabla.= 
        
        '
        <strong style="float: left; margin-left:0 %; font-size: 20px; margin-top: 40px; font-style: italic;"><label>Total de contratos <input type="text" value='.$fila['total'].'></label></strong>
        <table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
       
            <tr style="background-color:#7C7C7C; color: white; font-style: italic; ">
                <th scope="col">Puesto</th>
                <th scope="col">Profesion</th>
                <th scope="col">CURP</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido paterno</th>
                <th scope="col">Apellido materno</th>
                <th scope="col">Monto minimo</th>
                <th scope="col">Monto maximo</th>
                <th scope="col">Monto consumido</th>
                <th scope="col">Estatus minimo</th>
                <th scope="col">Fecha vencimiento</th>
                <th scope="col">Vencimiento</th>
                <th scope="col">O.S</th>
                <th scope="col">Editar</th>
                <th scope="col">Ver</th>
                <th>Eliminar</th>
                
            </tr>';
          
        while($filaAlumnos= $buscarAlumnos->fetch_assoc())
        {
      
            $tabla.=
            '<tr>
                
                <td>'.$filaAlumnos['puesto'].'</td>
                <td>'.$filaAlumnos['profesion'].'</td>
                <td>'.$filaAlumnos['curp'].'</td>
                <td>'.$filaAlumnos['nombre'].'</td>
                <td>'.$filaAlumnos['appaterno'].'</td>
                <td>'.$filaAlumnos['apmaterno'].'</td>
                <td>'.$filaAlumnos['delegacion'].'</td>
                <td><a href="ordenSuminstro?Xy='.$valor.'&tr='.$contrato.'" target="popup" onClick="window.open(this.href, this.target, "width=1100,height=600,top=15px, left=220,scrollbars=NO,menubar=NO,titlebar= NO,status=NO,toolbar=NO" ); return false;"
                style="margin-left: 25px; background: none; color: black; font-size: 21px;"><i id="add" class="fas fa-file-signature" ></i></a></td>
                <td><a  href="editarContrato?Xy='.$valor.'"  ><i id="guardar" class="fas fa-edit" ></i></a></td>
                <td><a  href="verContrato?Xy='.$valor.'" ><i id="ver" class="fas fa-binoculars" style="width: 50px; height: 20px;"></i></a></td>
                <td><button type="button" value='.$valor.' style="background: none; border: 0; color:inherit" ><i id ="eliminar" class="fas fa-trash"></i></button></td>
                            
                
             </tr>';
            
            
        }
     
        $tabla.='</table>';
    } else{
       
    }
      
    echo $tabla;
    
    ?>
        <script type="text/javascript">
            var ibxUserTwo=document.getElementById("nombre");
                        var fired_button2=ibxUserTwo.value;
            $("button").click(function () {
                var fired_button = $(this).val();
                var mensaje = confirm("el registro se eliminara")
                
                if (mensaje == true) {
                    window.location.href = "frontend/eliminaProveedor?id_proveedor="+fired_button+"&nombre="+fired_button2;
                } else {
                    swal({
                    title: '¡CANCELADO!',
                    text: '',
                    type: 'error',
                    timer: 1000,
                    showConfirmButton: false
                     });
                }
            });

        
    </script>