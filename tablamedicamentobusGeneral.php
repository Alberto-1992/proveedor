<style>
    td{
        cursor: pointer;
        
    }
    td:hover{
        background: #BAC0C4;
        
    }
      
</style>
<table class="table table-bordered table-striped table-hover" >
                  
                  
            <tr class="#" style="background-color:#7C7C7C; color: white; font-style: italic; ">
    
            <th>Clave HRAEI</th>
            <th>Descripcion</th>
            
                 
                 
        </tr>
        
    <?php

require "conexion.php";
error_reporting(0);

$query="SELECT * FROM listamedicamento where fechaContrato = '2022' and farmacia = 'intrahospitalaria' group by listamedicamento.id_medicamento desc ";
$buscarAlumnos=mysqli_query($conexion2,$query);

while($filaAlumnos= $buscarAlumnos->fetch_assoc())
	{
	
	$clave = $filaAlumnos['CLAVEHRAEI'];
		
	echo	
        '  
     
        <tr>
            <td id='.$clave.' class="checks">'.$filaAlumnos['CLAVEHRAEI'].'</td>
            <td id='.$clave.' class="checks">'.$filaAlumnos['DESCRIPCION'].'</td>
            
			</tr>
      
         
        ';
		
		
	}


	$conexion2->close();

?>

</table>
</div>
 <script >
 
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