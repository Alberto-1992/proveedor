<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/styles.css">
    <link href="css/main.css" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="iconos/css/all.min.css">
    <link rel="stylesheet" href="iconos/css/all.css">
    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>HRAEI</title>

    <!--scripts para ejectuar ajax con onblur y editables   -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    
    <!--importante para desplegar modals-->
    <script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
    
    <script src="iconos/js/all.min.js"></script>
    <script src="graficoConsumosMedicamentos.js"></script>
    <script src="scripts/listarMedicamento.js"></script>
    <script src="scripts/selectContrato.js"></script>
    <script src="consolidadas.js"></script>
    <script src="consolidadasExterno.js"></script>
    <script src="scripts/medicamentos.js"></script>
    <script src="scripts/medicamentoEnOrdenFG.js"></script>
    <script src="scripts/salidasCisfa.js"></script>
    <script src="scripts/entradasCisfa.js"></script>
    <script src="scripts/cancelarOrdenOs.js"></script>
   

</head>
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
<body>
<?php 
            
			if (isset($_SESSION['usuarioFG'])){
				$usernameSesion = $_SESSION['usuarioFG'];
				require 'conexion.php';
				$query ="SELECT nombre_trabajador from login where correo_electronico = '$usernameSesion' limit 1";
                $res = mysqli_query($conexion2, $query);
                $rw = mysqli_fetch_assoc($res);
			
			}
			  	 
    ?>


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
$var = base64_decode($_GET['var']);
require 'conexion.php';

$sql = $conexion2->query("SELECT sum(monto) total1, sum(monto2) total2, sum(monto3) total3 FROM ordensuministro where claveContrato = $var");
$row = mysqli_fetch_assoc($sql);

$total1 = $row['total1'];
$total2 = $row['total2'];
$total3 = $row['total3'];

$total4 = $total1 + $total2 + $total3;

$sql = $conexion2->query("SELECT sum(importe) as total FROM ordensuministro where claveContrato = $var");
$row = mysqli_fetch_assoc($sql);

$totalReal = $row['total'];

$sql = $conexion2->query("SELECT total_minimo,total_maximo FROM proveedores where id_proveedor = $var");
$row = mysqli_fetch_assoc($sql);

$totalMinimo = $row['total_minimo'];
$totalMax = $row['total_maximo'];

$totalFinal2 = $totalMinimo - $totalReal;
if($totalFinal2 <= -1){
     $totalRes = 0;
}else{
    $totalRes = $totalFinal2;
}
?>
<header style="background-color: #1778A9">

        <label class="lnr lnr-menu"
            style="font-size: 23px; font-style: italic; float: left; margin-left: 18px; color: white;">Menu</label>

        <strong id="cabecera" style="color: white; float: left; margin-left: 42%; font-size: 18px;">CONTRATOS CISFA</strong>

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
    
<style>
/**
           .imagenCisfa2{
                width: 100%;
                height: 120px;
                background: white;
                float: left;
                margin-left: 0%;
                background-image: url(https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRbNIGjQwMRYhvjMiXYRxAO7XiFrk9pcpd1hA&usqp=CAU);
                background-repeat: no-repeat;
                background-size: 100% 100%;
}
**/
       </style>
<div class="box2">
    <div class="box1">
       <?php
       require 'menuCisfa/menuOrdenesFG.php';
       
       ?>
       </div>
  
    <div class="box03">
  
   
     <div class="imagenCisfa" style="margin-top: 25px; height: 88px; "></div>
     <!--
            <strong style="float: left; margin-left:  1%; font-size: 15px; margin-top: 70px; font-style: italic;"><label>Total real <input type="text" value="<?php echo formatMoney($total4); ?>"></label></strong>
<strong style="float: left; margin-left:  1%; font-size: 15px; margin-top: 70px; font-style: italic;"><label>Total en O.S <input type="text" value="<?php echo formatMoney($totalReal); ?>"></label></strong>
<strong style="float: left; margin-left: 0%; font-size: 15px; margin-top: 70px; font-style: italic;"><label>Minimo a cubrir <input type="text" value="<?php echo formatMoney($totalMinimo); ?>"></label></strong>   
<strong style="float: left; margin-left: 0%; font-size: 15px; margin-top: 70px; font-style: italic;"><label>Faltante a cubrir <input type="text" value="<?php echo formatMoney($totalRes); ?>"></label></strong> -->
<!--<strong style="float: left; margin-left: 0%; font-size: 15px; margin-top: 0px; font-style: italic;"><label>Monto maximo <input type="text" value="<?php echo formatMoney($totalMax); ?>"></label></strong>--> 
<a href="exportExcelOS?id='<?php echo $var; ?>'" ><i class="fas fa-cloud-download-alt" style="font-size: 25px;  margin-top: 60px; float: left; margin-left: 100px;"></a></i>
                <input list="medicamentoEnOrdenFG" class="form-control" id="medicamento_orden2" style="margin-left: auto; margin-right: auto; margin-top: 50px; width: 550px; height: 40px;"  onchange="medicamento_enorden2();" placeholder="Clave, Nombre o CNIS del Medicamento">
           
        <datalist id="medicamentoEnOrdenFG" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query("SELECT DISTINCT claveHraei, descripcionDelBien FROM ordensuministro where fechacontrato = '2022' and farmacia = 'gratuita'");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['claveHraei'];
              $nombre = $row_s['descripcionDelBien'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                            <div id="tabla_resultados" class="table table-responsive table-striped table-darkgray table-hover" style="cursor: pointer;  margin-left: 0px; margin-top: 0px; font-size: 12px; overflow-x: hidden; overflow-y: scroll; height: auto; line-height: 1em; width: 100%;"></div><br>
<div class="table table-striped table-darkgray table-hover" style="cursor: pointer; margin-left: 0px; margin-top: -55px; font-size: 12px;"> 
  

 
 
<!--<label class="lnr lnr-magnifier"  data-toggle="modal"
                    data-target="#myModal_medicamentoEnOrden" style="color: blue; font-size: 20px; cursor: pointer; margin-left: 30px;"></label>-->
                    <div id="tabla_result"></div>
        <div class="contenedor" style="overflow-x: hidden; overflow-y: scroll; height: 85em; line-height: 1em; width: 100%; margin-top: 10px;">
                 <table class="table table-bordered table-striped table-hover" style="width: 100%; float: left; margin-top: 10px; margin-left: 1px; font-size: 12px; ">
                  
                 <thead> 
                  
                 <tr>
                <!-- definimos cabeceras de la tabla --> 
                 
                 <th>clave orden</th>
                 <th>Ver PDF</th>
                 <th>Fecha de orden</th>
                 <th>Fecha limite</th>
                <!-- <th>Dias vencidos</th>
                 <th>Dias penalizados</th>
                 <th>Fecha en que entrego todo el insumo</th>-->
                 <th>$ orden</th>
                 <th>$ primer entrega</th>
                 <th>$ segunda entrega</th>
                 <th>$ tercer entrega</th>
                 <th>$ cuarta entrega</th>
                 <th>$ quinta entrega</th>
                 <th>Seguimineto</th>
                 <th>Penalizar</th>
                 <th>Ver penalizaciones</th>
                 
                 
                 </tr>
                  
                 </thead>
                  
                  
                 <tbody>
                <script>

                    $(document).on("blur", "#fechaEntrego", function(){

                        let id= $(this).data("id_entrega");
                        let nombre = $(this).text();
                        actualizar_datos(id, nombre, "fechaEntrego");
                    });
                    $(document).on("blur", "#cumplio", function(){

                        let id= $(this).data("id_cumplio");
                        let nombre = $(this).text();
                        actualizar_datos(id, nombre, "cumplio");
                    });
                    $(document).on("blur", "#diasPenalizados", function(){

                        let id= $(this).data("id_penalizacion");
                        let nombre = $(this).text();
                       
                        actualizar_datos(id, nombre, "diasPenalizados");
                    });
                    $(document).on("blur", "#fechadeRegistro", function(){

                        let id= $(this).data("id_defecha");
                        let nombre = $(this).text();
                        actualizar_datos(id, nombre, "fechaRegistro");
                        
                    });
           

                    function actualizar_datos(id, texto, columna){
          
                        let ob = {id:id, texto:texto, columna:columna};
                        
                        $.ajax({
                        url: 'modelo/modelo_actualiza_ordenes.php',
                        type: 'POST',
                        data: ob,
                        success: function(data){
                            $('#tabla_result').html(data);
                        }

                    })

                    }

                </script>
                 
<?php
error_reporting(0);
             
                 $nombre = base64_decode($_GET['nombre']);
                 $nombre3 = base64_encode($nombre);
                 $var3 = base64_encode($var);
                 $var2 = 0;
                
                 require 'conexion.php';
                   
                     $sql = "SELECT DISTINCT numeroorden.claveUnicaContrato, numeroorden.fechaRegistro, numeroorden.fechaEntrego, numeroorden.totalOrden, numeroorden.cumplio, numeroorden.diasPenalizados from numeroorden  where id_contrato= $var and estatus = 1";
                     $result=mysqli_query($conexion2, $sql);
                   
                           while($row=$result->fetch_assoc())
                       
                        {
                            $tota_l = $row['claveUnicaContrato'];
                            $sq_l ="SELECT sum(monto) totalMonto, sum(monto2) totalMonto2, sum(monto3) totalMonto3, sum(monto4) totalMonto4, sum(monto5) totalMonto5 from ordensuministro where claveUnicaOrden = '$tota_l'";
                            $resul_t=mysqli_query($conexion2, $sq_l);
                            while($row_s=$resul_t->fetch_assoc()){ 
                            $cumplio = $row['cumplio'];

                                if($cumplio == 'no'){
                                    $date = $row['fechaRegistro'];
                     //Incrementamos los dias que se requieran
                                    $mod_date = strtotime($date."+ 15 days");
                                    $dia = date("Y-m-d",$mod_date) . "\n";
                                    $actual_dia = date("Y-m-d");

                                    $datetime1 = date_create($dia);
                                    $datetime2 = date_create($actual_dia);

                                if($datetime2>=$datetime1){
                                    $contador = date_diff($datetime1, $datetime2);
                                    $differenceFormat = '%a';
                                    $totalDias= $contador->format($differenceFormat);
                                }else{
                                     $totalDias = 0;
                                }
                                }else{
                                    $date = $row['fechaRegistro'];
                                    $mod_date = strtotime($date."+ 15 days");
                                    $dia = date("Y-m-d",$mod_date) . "\n";
                                    $totalDias = 'cumplio en entrega programada';
                                }if($cumplio == 'destiempo'){
                                    $date = $row['fechaRegistro'];
                                    $mod_date = strtotime($date."+ 15 days");
                                    $dia = date("Y-m-d",$mod_date) . "\n";
                                    $totalDias = 'entrega a destiempo';
                                }
                                    $claveUnica = base64_encode($row['claveUnicaContrato']);
                                    $fecha = base64_encode($row['fechaRegistro']);
                                    $dia2 = base64_encode($dia);
                                    $totalDias2 = base64_encode($totalDias);
                         echo '                
                            <tr>
                                <td>'.$row['claveUnicaContrato'].'</td>
                                <td><a href="verPDFFG?var='.$var3.'&valor2='.$claveUnica.'" target="_blank"><i id="pdf" class="fas fa-file-pdf"  style="width: 50px; height: 20px; font-size: 22px; text-align: center;"></a></i></td>
                                <td id="fechadeRegistro" data-id_defecha='.$row['claveUnicaContrato'].' contenteditable>'.$row['fechaRegistro'].'</td>
                                <td>'.$dia.'</td>
                                
                                <td>'.formatMoney($row['totalOrden']).'</td>
                                <td>'.formatMoney($row_s['totalMonto']).'</td>
                                <td>'.formatMoney($row_s['totalMonto2']).'</td>
                                <td>'.formatMoney($row_s['totalMonto3']).'</td>
                                <td>'.formatMoney($row_s['totalMonto4']).'</td>
                                <td>'.formatMoney($row_s['totalMonto5']).'</td>
                            
                                <td><a href="seguimientoEntregaFG?claveEntrega='.$claveUnica.'&dias='.$totalDias.'&nombre='.$nombre3.'&fecha='.$fecha.'&fechaEntrega='.$dia2.'&var='.$var3.'" target="_blank" style="margin-top: 0%; outline:none; cursor:pointer; font-size: 20px; margin-left: 30px;"><span class="lnr lnr-enter"></span></a></td>
                                <td><button value="'.$claveUnica.'&dias='.$totalDias2.'&nombre='.$nombre3.'&fecha='.$fecha.'&fechaEntrega='.$dia2.'&var='.$var3.'" style="border: none; cursor:pointer; background: none; font-size: 22px; color: red; margin-left: 30px;" ><span class="lnr lnr-lock"></span></button></td>
                                <td><a href="vistaPenalizaciones?var='.$var3.'&valor2='.$claveUnica.'"><i id="pdf" class="fas fa-file-pdf"  style="width: 80px; height: 20px; font-size: 22px; text-align: center;"></a></i></td>
                            
                
                            </tr>';
                           
               
                        }
                    }
                    
                        ?>       
                    </tbody>  
                </table>
            </div>
        </div>
    </div>
</div>
       
    </body>
    <!--importante para desplegar menu lateral -->
        <script src="frontend/js/script.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
        <script src="script/scripts.js"></script>
</html>
 <?php
require 'modals/buscarMedicamento.php';
require 'modals/medicamentoEnOrden.php';
require 'modals/medicamentoConsolidado.php';
require 'modals/registrarProveedor.php';
require 'modals/salidasCisfa.php';
require 'modals/cancelarOrdenSuministro.php';
require 'modals/entradasCisfa.php';
?>
<script>
    $("button").click(function () {
                var fired_button = $(this).val();

                    window.location.href = "registrarEntregaFG?claveEntrega="+ fired_button;
                
            });
    </script>
             