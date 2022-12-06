<div id="myModal_consultarFactura" class="modal fade" role="dialog">

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
    
                            
                        </div><br>
                                        
                  <div class="container" style="margin-top: 10px; width: 97%; padding: 5px;">
                               
                        <strong style="color: black;">SELECCIONA EL NUMERO DE FACTURA</strong>

<input list="consult_Fact" class="form-control" id="consultaFactu" name="" type="text" style="height: 35px; width: 100%;" onchange="selectFactura();">
           
        <datalist id="consult_Fact" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT num_factura, nombre_laboratorio FROM facturas");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['num_factura'];
              $nombre = $row_s['nombre_laboratorio'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                            
                            <strong style="color: black;">BUSCAR POR NOMBRE O CLAVE HRAEI</strong>

<input list="consult_claveH" class="form-control" id="consultaClaveH" name="" type="text" style="height: 35px; width: 100%;" onchange="selectClaveH();">
           
        <datalist id="consult_claveH" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT clavehraei, descripcion FROM facturas");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                            
                            <strong style="color: black;">SELECCIONA EL NOMBRE DEL PROVEEDOR</strong>

<input list="consult_laboratorio" class="form-control" id="consultaLaboratorio" name="" type="text" style="height: 35px; width: 100%;" onchange="selectLaboratorio();">
           
        <datalist id="consult_laboratorio" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT nombre_laboratorio FROM facturas");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['nombre_laboratorio'];
              $nombre = $row_s['nombre_laboratorio'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist>
                <input type="submit" onclick="todasFacturas();" class="btn btn-warning" value="Ver todas las facturas" 
                     style="width: 100%; margin-left: 0px; margin-top: 20px;"><br><br>  
<script>
function selectFactura(val)
{
    let factura2 = $("#consultaFactu").val();
    let ob = {factura2:factura2};

    $.ajax({
        type: "POST",
        url: 'consultaFactura.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}

function selectClaveH(val)
{
    let clavehraei = $("#consultaClaveH").val();
    let ob = {clavehraei:clavehraei};

    $.ajax({
        type: "POST",
        url: 'consultaFacturaClave.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}
function selectLaboratorio(val)
{
    let laboratorio = $("#consultaLaboratorio").val();
    let ob = {laboratorio:laboratorio};

    $.ajax({
        type: "POST",
        url: 'consultaLaboratorio.php',
        data: ob,
        success: function(resp){
             $('#tabla_resultado').html(resp);
           
        }
        
    });
    
}
function todasFacturas(val)
{
    let fecha = '2021';
    let ob = {fecha:fecha};
    
    $.ajax({
        type: "POST",
        url: 'consultaTodasFacturas.php',
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
    </div>  