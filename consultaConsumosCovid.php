<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
        <script src="Highcharts-4.1.5/js/highcharts.js"></script>
        <script src="Highcharts-4.1.5/js/highcharts-3d.js"></script>
        <script src="Highcharts-4.1.5/js/modules/exporting.js"></script>
      
</head>

<body><br>
   

<div class="form-row">
<div class="form-group col-md-1" style="margin-left: 10px;">
    <label>Fecha inicio</label>
        <input type="date" class="form-control" id="fecha1" >
    </div>
<div class="form-group col-md-1" style="margin-left: 30px;">
    <label>Fecha final</label>
        <input type="date" class="form-control" id="fecha2" >
    </div><H1 style="margin-left: 85px;">Consumos CISFA</H1>
</div>


<div class="form-group col-md-1">
   
    <input list="consult" class="form-control" id="val1" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val1 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val1; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
   
    <input list="consult" class="form-control" id="val2" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
           
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val2 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val2; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
    
    <input list="consult" class="form-control" id="val3" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
          
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val3 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val3; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
  
    <input list="consult" class="form-control" id="val4" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
          
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val4 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val4; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
    
    <input list="consult" class="form-control" id="val5" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
         
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val5 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val5; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">

    <input list="consult" class="form-control" id="val6" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
         
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val6 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val6; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
   
    <input list="consult" class="form-control" id="val7" name="" type="text" placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
         
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val7 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val7; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
    
    <input list="consult" class="form-control" id="val8" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
         
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val8 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val8; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
   
    <input list="consult" class="form-control" id="val9" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
         
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val9 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val9; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
    
    <input list="consult" class="form-control" id="val10" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
         
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val10 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val10; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
   
    <input list="consult" class="form-control" id="val11" name="" placeholder="clave HRAEI" type="text"  onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
         
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val11 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val11; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
<div class="form-group col-md-1">
  
    <input list="consult" class="form-control" id="val12" name="" type="text"  placeholder="clave HRAEI" onchange="consultarCovid();">
           
        <datalist id="consult" >
            <?php
         
            $sql_s = $conexion2->query ("SELECT DISTINCT descripcion, clavehraei FROM covid");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $val12 = $row_s['clavehraei'];
              $nombre = $row_s['descripcion'];
              ?>
               <option value="<?php echo $val12; ?>"> <?php echo $nombre; ?></option>
            
               <?php
            }
            
            
                        ?>
            
                            </datalist></div>
                    <script>
                    function consultarCovid(){
                        
                        let val1 = $("#val1").val();
                        let val2 = $("#val2").val();
                        let val3 = $("#val3").val();
                        let val4 = $("#val4").val();
                        let val5 = $("#val5").val();
                        let val6 = $("#val6").val();
                        let val7 = $("#val7").val();
                        let val8 = $("#val8").val();
                        let val9 = $("#val9").val();
                        let val10 = $("#val10").val();
                        let val11 = $("#val11").val();
                        let val12 = $("#val12").val();
                        let fecha1 = $("#fecha1").val();
                        let fecha2 = $("#fecha2").val();
                    
                        let ob = {val1:val1, val2:val2, val3:val3, val4:val4, val5:val5, val6:val6, val7:val7, val8:val8, val9:val9, val10:val10, val11:val11, val12:val12, fecha1:fecha1, fecha2:fecha2}
                             $.ajax({
                                type: "POST",
                                url: 'graficoCovid.php',
                                data: ob,
                                success: function(resp){
                                $('#tabla_resultado').html(resp);
           
        }
        
    });
}
                   
                   
                    
                </script>
               </div><br><br><br>
                
<div id="tabla_resultado" style="width: 100%; height: 750px;"></div>

</body>
</html>