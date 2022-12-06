<style>
    td{
        cursor: pointer;
    }
    td:hover{
        background: #BAC0C4;
    }
    th{
        font-size: 13px;
    }
    tbody{
        overflow: scroll;
    }
</style>
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
$val = $_POST['ID_usuario'];


$tabla="";
$query="SELECT DISTINCT
CLAVEHRAEI, 
DESCRIPCION FROM listamedicamento where CLAVEHRAEI like '$val%' and fechaContrato = '2022' and farmacia = 'intrahospitalaria' or DESCRIPCION like '%$val%' and fechaContrato = '2022'  and farmacia = 'intrahospitalaria' or CLAVEDECUADROBASICO like '%$val%' and fechaContrato = '2022'  and farmacia = 'intrahospitalaria'";


//En caso de fallo en consulta probar con esta opcion
//$buscarAlumnos=mysqli_query($conexion2,$query);
//if (mysqli_num_rows($buscarAlumnos)>0)

$buscarAlumnos=mysqli_query($conexion2,$query);
if(!empty($buscarAlumnos) AND mysqli_num_rows($buscarAlumnos)>0)
{
	$tabla.= 
	
    '

<table id="ghatable"  class="table table-striped table-darkgray table-hover"  cellspacing="0" width="100%"  >
               
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
            <th scope="col">Clave HRAEI</th>
            <th scope="col">Descripcion</th>
           
			
        </tr>';
		//include("funciones/funcionEliminaRegistr.php");
	//	include("funciones/guardaCandidato.php");
		
while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	$clave = $filaAlumnos['CLAVEHRAEI'];
		
		$tabla.=
        '  
     <tbody>
        <tr>
     
            <td id='.$clave.' class="checks">'.$filaAlumnos['CLAVEHRAEI'].'</td>
            <td id='.$clave.' class="checks">'.$filaAlumnos['DESCRIPCION'].'</td>
       
			</tr>
      </tbody>
         
        ';
		
		
	}

	$tabla.='</table>';
	$conexion2->close();
} else
	{
		$tabla="No se encontraron criterios de búsqueda.";
	}


echo $tabla;

?>

    <script>
  $(function(){

  $('table').on('click', '.checks', function(){ 
  
      let ID_usuario = $(this).prop('id');
     

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consulta_listaMedicamento.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
         
                }
             });
    });
});
        $("button").click(function () {
            var fired_button = $(this).val();
            var mensaje = confirm(
            "¡El medicamento se eliminara de la base de datos! ¿Desea continuar?");

            if (mensaje == true) {
                window.location.href = "eliminaMedicamento?id_medicamento=" + fired_button;
            } else {
                swal("Proceso cancelado", " ", "error");
            }
        });
    </script>
