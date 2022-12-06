<style>
    td{
        cursor: pointer;
        
    }
    td:hover{
        background: #BAC0C4;
        
    }
    tbody{
        overflow: scroll;
    }
   
</style>
<table class="table table-bordered table-striped table-hover" >
                  
                  
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
            <th>Proveedor</th>
            <th>Contrato</th>
            <th>Fuente de financiamiento</th>
            <th>Clave HRAEI</th>
            <th>Descripcion</th>
            <th>CNIS</th>
            <th>CUCOP</th>
            <th>UDM</th>
            <th>Precio</th>
            <th>Minimo consumo</th>
            <th>Maximo consumo</th>
            <th>Consumo real</th>
            <th>Minimo precio</th>
            <th>Maximo precio</th>
            <th>Eliminar</th>
                 
                 
        </tr>
                  

                  
                  
           
    <?php
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
require "conexion.php";
error_reporting(0);

$query="SELECT * FROM listamedicamento where fechaContrato = '2022' and farmacia = 'intrahospitalaria' group by listamedicamento.id_medicamento desc ";
$buscarAlumnos=mysqli_query($conexion2,$query);

while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	$clave = base64_encode($filaAlumnos['id_medicamento']);
		
	echo	
        '  
     <tbody>
        <tr>
            <td id='.$clave.' class="check" title="click para editar">'.$filaAlumnos['PROVEEDOR'].' </td>
            <td id='.$clave.' class="check" title="click para editar">'.$filaAlumnos['numeroContrato'].'</td>
            <td>'.$filaAlumnos['tipoAdjudicacion'].'</td>
            <td>'.$filaAlumnos['CLAVEHRAEI'].'</td>
            <td>'.$filaAlumnos['DESCRIPCION'].'</td>
            <td>'.$filaAlumnos['CLAVEDECUADROBASICO'].'</td>
            <td>'.$filaAlumnos['CUCOP'].'</td>
            <td>'.$filaAlumnos['UNIDADDEMEDIDA'].'</td>
            <td>'.formatMoney($filaAlumnos['PRECIOUNITARIO']).'</td>
            <td>'.$filaAlumnos['MINIMOCONSUMO'].'</td>
            <td>'.$filaAlumnos['MAXIMOCONSUMO'].'</td>
            <td>'.$filaAlumnos['cantidad'].'</td>
            <td>'.formatMoney($filaAlumnos['MINIMOPRECIO']).'</td>
            <td>'.formatMoney($filaAlumnos['MAXIMOPRECIO']).'</td>
			<td><button type="button" id="elimina" value='.$clave.'  style="background: none; border: 0; color:inherit"> <i id ="eliminar" class="fas fa-trash"></i></button></td>
		
			
			</tr>
      
         </tbody>
        ';
		
		
	}


	$conexion2->close();

?>

</table>
</div>
 <script >
 
 $(function(){

  $('table').on('click', '.check', function(){ 
  
      let clave = $(this).prop('id');
     
     window.open ('editarListaMedicamento?clave='+clave);
  });
});
        $("button").click(function () {
            let fired_button = $(this).val();
            let mensaje = confirm(
            "¡El medicamento se eliminara de la base de datos! ¿Desea continuar?");
            let ob = {fired_button:fired_button};
            if (mensaje == true) {
                $.ajax({
                type: "POST",
                url:"eliminaMedicamento.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 $("#tabla_resultado2").html(data);
                }
             });
            } else {
                swal("Proceso cancelado", " ", "error");
            }
        });
    </script>