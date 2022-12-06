<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="css/styles.css?=1">
    <link href="css/main.css?n=1" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>HRAEI</title>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
   
    <script src="control_usuario.js"></script>
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">

    <script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
    <script src="iconos/js/all.min.js"></script>
    <script src="graficoConsumosMedicamentos.js"></script>
    <script src="scripts/listarMedicamento.js"></script>
    <script src="scripts/selectContratoFg.js"></script>
    <script src="consolidadas.js"></script>
    <script src="consolidadasExterno.js"></script>
    <script src="scripts/medicamentos.js"></script>
    <script src="scripts/medicamentoEnOrden.js"></script>
    <script src="scripts/salidasCisfa.js"></script>
    <script src="scripts/entradasCisfa.js"></script>
    <script src="scripts/cancelarOrdenOsFG.js"></script>
    <script src="scripts/mult.js"></script>
    <script src="scripts/consultaFG.js"></script>
    <script src="scripts/cerrarMenu.js"></script>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>



    <script>
        function opener() {
            nwin = window.open("", "newWin", "toolbar=no,location= no,resizable=no",
                width = 200, height = 200, left = 100, top = 100)
        }
        /*
       $(document).ready(function() {    
  
        //Añadimos la imagen de carga en el contenedor
        $('#tabla_resultado').html('<div id="tabla_resultado" style="position: fixed; top: 0px; left: 0px; width: 100%; height: 100%; z-index: 9999;  opacity: .8; background: url(imagenes/loader.gif) 50% 50% no-repeat rgb(249,249,249);"><br/>Un momento, por favor...</div>');
 
        
        return false;
                
});
 */      
    </script>
 

</head>

<body >

    <?php 
            
			if (isset($_SESSION['usuarioFG'])){
				$usernameSesion = $_SESSION['usuarioFG'];
				require 'conexion.php';
				$query ="SELECT nombre_trabajador from login where correo_electronico = '$usernameSesion' limit 1";
                $res = mysqli_query($conexion2, $query);
                $rw = mysqli_fetch_assoc($res);
			
			}
			  	 
    ?>
   
<header style="background: #ddc9a3;">

        <label class="lnr lnr-menu"
            style="font-size: 23px; font-style: italic; float: left; margin-left: 18px; color: white;">Menu</label>

        <strong id="cabecera" style="color: white; float: left; margin-left: 42%; font-size: 18px;">FARMACIA GRATUITA</strong>

        <script>
        
		//	window.onload = function(){killerSession();}
		//	function killerSession(){
		//	setTimeout("window.open('confirmCloseSession.php','_top');", 2.4e+6);
		//	}
</script>
<script type="text/javascript">


$('.nav-item dropdown').hover(function(){
	$('#navbarDropdown').trigger('click')

})

</script>

    </header>
<div class="box2">
    <div class="box1">
    <?php
        require'menuCisfa/menuFG.php';
    ?>
    </div>
     <div class="box03">
       <!-- <div class="imagenCisfa" style="margin-top: -34px; border-radius: 25px; height: 94px;"></div>
      <div id="tabla_resultados" style="font-size: 12px;"></div>-->
            <div id="tabla_resultado" style="font-size: 12px;">
    
              </div>
        
<style>

::-webkit-scrollbar{
    width: 10px;
}
::-webkit-scrollbar-track{
    background: #ACAEAD;
    border-radius: 50px;
}
::-webkit-scrollbar-thumb{
    background: #fff;
    border-radius: 50px;
}
</style>
      </div>
      </div>
   

       
        <script src="frontend/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="script/scripts.js"></script>
</body>
</html>
<?php
require 'modals/buscarMedicamento.php';
require 'modals/contratosFG.php';
require 'modals/medicamentoEnOrden.php';
require 'modals/medicamentoConsolidado.php';
require 'modals/cargarContrato.php';
require 'modals/registrarProveedor.php';
require 'modals/cargarFactura.php';
require 'modals/salidasCisfa.php';
require 'modals/consultarFactura.php';
require 'modals/cancelarOrdenSuministroFG.php';
require 'modals/entradasCisfa.php';
require 'modals/promedioCisfa.php';
require 'modals/editarOrdenFG.php';
?>

<div id="myModal_folios" class="modal fade" role="dialog">
        <script src="control_usuario.js"></script>
        <script src="metas.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 800px; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Generar folios</h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
                         
                        </div>



<strong style="color: black;">SELECCIONA</strong>

<select class="form-control" id="folio" name="ejeUno" onchange="select_folio(this.value);" style="height: 35px;">
            <option>-Selecciona-</option>
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT referenciaCorta FROM numeroorden ");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['referenciaCorta'];
  $nombre = $row_s['referenciaCorta'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>

                </select><br><br>
<script>
function select_folio()
{ //id="select_usuario"
  
 let val =  $("#folio").val();
 let encodedString = btoa(val);

    window.location.href = "Folio?val="+encodedString;
}

     </script> 
                       
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<div id="myModal_minimosLab" class="modal fade" role="dialog">
<script src="control_usuario.js"></script>
<script src="metas.js"></script>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>

    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 800px; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Minimos no alcanzados por laboratorio </h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
       
                    
                        </div>

<strong style="color: black;">SELECCIONA EL NOMBRE DEL PROVEEDOR</strong>

<select class="form-control" id="mySelect" name="ejeUno" onchange="select_lab(this.value);" style="height: 35px;">
            <option>-Selecciona un proveedor-</option>
            <?php
            require('conexion.php');
           
        $sql_s = $conexion2->query('SELECT DISTINCT PROVEEDOR FROM listamedicamento order by PROVEEDOR asc');
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['PROVEEDOR'];
  $nombre = $row_s['PROVEEDOR'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>

</select><br>
   
     <strong id="strong" style="color:black;">SELECCIONA EL NÚMERO DEL CONTRATO:</strong><br>
     <select class="form-control" id="tabla_result"  name="metaEspecifica6" style=" height: 35px;">
     <option value=""> Seleccione el numero de contrato </option>
     <input type="submit" class="btn btn-warning" value="CONSULTAR" 
                    onclick="select_min();" style="width: 100%; margin-left: 0px; margin-top: 5px;">
     
</select><br><br>
<script>
function select_min()
{ //id="select_usuario"
  
 let ID_usuario =  $("#tabla_result").val();
 
// alert("Hola select = "+ID_usuario);

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaMinNoLaboratorio.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}

     </script> 
      
                         
                                </div>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
        
<div id="myModal_maximosLab" class="modal fade" role="dialog">
        <script src="control_usuario.js"></script>
        <script src="metas.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 800px; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Maximos alcanzados por laboratorio</h4>
            </div>
            <div class="modal-body">
                <p> Edicion .</p>
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
                          
                        </div>

<strong style="color: black;">SELECCIONA EL NOMBRE DEL PROVEEDOR</strong>

<select class="form-control" id="mySelect" name="ejeUno" onchange="select_max_no_lab(this.value);" style="height: 35px;">
            <option>-Selecciona un proveedor-</option>
            <?php
            require('conexion.php');
          
        $sql_s = $conexion2->query('SELECT DISTINCT PROVEEDOR FROM listamedicamento order by PROVEEDOR asc');
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['PROVEEDOR'];
  $nombre = $row_s['PROVEEDOR'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


?>
</select><br>
   
     <strong id="strong" style="color:black;">SELECCIONA EL NÚMERO DEL CONTRATO:</strong><br>
     <select class="form-control" id="tabla_resu" onchange="select_max();" name="metaEspecifica6" style=" height: 35px;">
     <option value=""> Seleccione el numero de contrato </option>
</select><br><br>
<script>
function select_max()
{ //id="select_usuario"
  
 let ID_usuario =  $("#tabla_resu").val();
 
// alert("Hola select = "+ID_usuario);

    let ob = {ID_usuario:ID_usuario};

     $.ajax({
                type: "POST",
                url:"consultaMaxLaboratorio.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado").html(data);
            
                }
             });
}

     </script> 
                  
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!-- inicio modal -->




<div id="myModal_covid" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Pacientes COVID </h4>
            </div>
            <div class="modal-body">
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>
<strong id="strong" style="color:black;">TODAS LAS CLAVES DATE FROM:</strong><br>
     <input  type="date" id="dateFromCovid" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">TODAS LAS CLAVES DATE TO:</strong><br>
     <input  type="date" id="dateToCovid" class="form-control" required="required" value=""
                                        style="width: 100%;" >
     <input type="submit" onclick="selectDateCovid();" class="btn btn-warning" value="Buscar Medicamento" 
                     style="width: 100%; margin-left: 0px; margin-top: 30px;"><br><br>
                     
                    
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

<div id="myModal_VerDonaciones" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Facturas CISFA </h4>
            </div>
            <div class="modal-body">
              
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>
                                        
                  
                               
                        <strong style="color: black;">SELECCIONA EL NUMERO DE DONACION</strong>

<input list="consult_Donacion" class="form-control" id="consultaDonacion" name="" type="text" style="height: 35px; width: 100%;" onchange="selectDonacion();">
           
        <datalist id="consult_Donacion" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT numerodonacion FROM donaciones");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['numerodonacion'];
              $nombre = $row_s['numerodonacion'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                <input type="submit" onclick="todasDonaciones();" class="btn btn-warning" value="Ver todas las donaciones" 
                     style="width: 100%; margin-left: 0px; margin-top: 20px;"><br><br>  
<script>
function selectDonacion(val)
{
    let donacion = $("#consultaDonacion").val();
    let ob = {donacion:donacion};

    $.ajax({
        type: "POST",
        url: 'consultaDonacion.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}

function todasDonaciones(val)
{
    let fecha = '2021';
    let ob = {fecha:fecha};
    
    $.ajax({
        type: "POST",
        url: 'consultaTodasDonaciones.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}


</script>        
                        
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  

<div id="myModal_Donaciones" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 800px; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Donaciones CISFA </h4>
            </div>
            <div class="modal-body">
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>

                        <strong id="strong" style="color:black; float: right;">Numero Donacion:</strong><br>
     <input  type="text" id="numFacturaDonacion" class="form-control" required="required"  value=""
                                        style="width: 30%; float: right" >
    
                     <strong id="strong" style="color:black; float: left; margin-top: -20px;">Fecha:</strong><br>
     <input  type="date" id="fechaFacturaDonacion" class="form-control" required="required" value=""
                                        style="width: 30%; float: left;  margin-top: -20px;" ><br>
                                        
                   
                               
                        <strong style="color: black;">SELECCIONA LA CLAVE DE MEDICAMENTO</strong>

<input list="selectClave" class="form-control" id="selectClaveDonacion" name="" type="text" style="height: 35px; width: 100%;" onchange="selectProvDonacion();">
           
        <datalist id="selectClave" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT clavehraei FROM listamedicamento where fechaContrato = 2021");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['clavehraei'];
              $nombre = $row_s['clavehraei'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                            
<script>
                    function selectProvDonacion(val)
{
    
    let factura = $("#numFacturaDonacion").val();
    let fechaFactura = $("#fechaFacturaDonacion").val();
    let clave = $("#selectClaveDonacion").val();
    let ob = {factura:factura, fechaFactura:fechaFactura, clave:clave};

    $.ajax({
        type: "POST",
        url: 'consultaCargaDonacion.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}




</script>        
                        
                    
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

