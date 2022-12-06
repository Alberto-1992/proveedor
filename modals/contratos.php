<div id="myModal_contratos" class="modal fade" role="dialog">
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

   <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%); font-size: 12px; ">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h6 class="modal-title">Contratos CISFA </h6>
            </div>
            <div class="modal-body">
                

                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>

                          
                        </div>
<style>
    label{
        color: black;
    }
</style>
                    
  
                <div class="container" style="margin-top: 10px; width: 97%; padding: 5px;">       
                    <div class="modal-body" >
    <label>Filtrar por nombre de proveedor</label>
        <select class="list-group-item list-group-item-action bg-ligh" id="select_proveedor" style="height: 40px; cursor: pointer;" onchange="select_proveedor();" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value="">Nombre de proveedor</option>
                    <meta charset="UTF-8">
                    <?php

$sql_s = $conexion2->query ("SELECT datoPersonalProveedor FROM datosproveedor order by datoPersonalProveedor asc");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['datoPersonalProveedor'];
  $nombre = $row_s['datoPersonalProveedor'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>
             </select>
    <label>Filtrar por nùmero de contrato</label>    
        <select class="list-group-item list-group-item-action bg-ligh" id="select_numerocontrato" style="height: 40px; cursor: pointer;" onchange="select_numerocontrato();" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value="">Numero de contrato</option>
                    <meta charset="UTF-8">
                    <?php

$sql_s = $conexion2->query ("SELECT DISTINCT numero_pedido FROM proveedores where year = '2022' and tipoFarmacia = 'intrahospitalaria 2022' order by numero_pedido asc");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['numero_pedido'];
  $nombre = $row_s['numero_pedido'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>
             </select>
    <label>Filtrar por año de contratos</label>         
        <select class="list-group-item list-group-item-action bg-ligh" id="select_contrato" style="height: 40px; cursor: pointer;" onchange="select_contrato();" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value="">Año de contratos</option>
                    <meta charset="UTF-8">
                    <?php

$sql_s = $conexion2->query ("SELECT DISTINCT year FROM proveedores ");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['year'];
  $nombre = $row_s['year'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>
             </select>    
    <label>Fitar por tipo de contratos</label>
        <select class="list-group-item list-group-item-action bg-ligh" id="select_tipoFarm" style="height: 40px; cursor: pointer;" onchange="select_tipoFarm();" >
                <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
                    <option value="">Tipo de contrato</option>
                    <meta charset="UTF-8">
                    <?php

$sql_s = $conexion2->query ("SELECT DISTINCT tipoFarmacia FROM proveedores where year = 2022 and tipoFarmacia = 'intrahospitalaria 2022'");
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['tipoFarmacia'];
  $nombre = $row_s['tipoFarmacia'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>
             </select>
           
  
                        </div>
                    </div>    
                </div>
            </div>           
        </div> 
    </div>