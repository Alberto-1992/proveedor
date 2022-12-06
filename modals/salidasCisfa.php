<div id="myModal_salidasCisfa" class="modal fade" role="dialog">

<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 100%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Salidas CISFA </h4>
            </div>
            <div class="modal-body">
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
    
                            
                        </div>
<!-- 
                        <div class="container" style="margin-top: 0px; width: 100%;">
                        <strong id="strong" style="color:black;">DATE FROM:</strong><br>
     <input  type="date" id="dateFrom1" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">DATE TO:</strong><br>
     <input  type="date" id="dateTo1" class="form-control" required="required" value=""
                                        style="width: 100%;" >
                              
                        <strong style="color: black;">SELECCIONA LA CENTRAL</strong>

<select class="form-control" id="selectCis" name="oficio_informe"  style="height: 35px; width: 100%;" onchange="selectCisfa();">
           
            <option>-Selecciona-</option>
            <?php
            /**
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT central FROM consumoscisfa");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['central'];
              $nombre = $row_s['central'];
              
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            **/
            
                        ?>
            
                            </select>--><br>
      <div class="container" style="margin-top: 10px; width: 97%; padding: 5px;">
        <strong id="strong" style="color:black;">TODAS LAS CLAVES DATE FROM:</strong><br>
     <input  type="date" id="dateFrom" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">TODAS LAS CLAVES DATE TO:</strong><br>
     <input  type="date" id="dateTo" class="form-control" required="required" value=""
                                        style="width: 100%;" >
     <input type="submit" onclick="selectDate();" class="btn btn-warning" value="Buscar Medicamento" 
                     style="width: 100%; margin-left: 0px; margin-top: 30px;"><br><br>
                     
                     
    <strong id="strong" style="color:black;">CLAVE DATE FROM:</strong><br>
     <input  type="date" id="dateFrom3" class="form-control" required="required" value=""
                                        style="width: 100%;" >
    
                     <strong id="strong" style="color:black;">CLAVE DATE TO:</strong><br>
     <input  type="date" id="dateTo3" class="form-control" required="required" value=""
                                        style="width: 100%;" >
                                        
      <strong id="strong" style="color:black;">CLAVE EN ESPECIFICO:</strong><br>  
    <input list="claves" id="clave" class="form-control" onchange="selectClave();" type="text" placeholder="Escribe la clave">
        <datalist id="claves" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT clavehraei FROM consumoscisfa");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['clavehraei'];
              $nombre = $row_s['clavehraei'];
              ?>
               <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
        </datalist><br>
               
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>  