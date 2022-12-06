<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    
    <link href="css/estilosMenu.css" rel="stylesheet">
  
    <title>Document</title>
</head>
<body>

<div id="menu" style="width: 150px; background: red; margin-top: 60px; float: right;">
        <ul>
            <li class="nivel1" ><a href="#" class="btn btn-info" style="background-color: #36BFF7">Ver</a>
                <ul class="nivel2">
                     <li><a href="principal">Inicio</a></li>
                    
                     <li><a href="#" data-toggle="modal"
                    data-target="#myModal_folios">Folios</a></li>
                    
                 </ul>
             </li>

            
        </ul>	
    </div>



     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>
</html>

<div id="myModal_folios" class="modal fade"  role="dialog" >

        <script src="control_usuario.js"></script>
        <script src="metas.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
    <div class="modal-dialog" >

        <!-- Modal content-->
        <div class="modal-content"
   >
            <div class="modal-header" style="background: green; color: white; animation-fill-mode: unset;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Activar folios</h4>
            </div>
            <div class="modal-body" >
           
                <div id="panel_editar">

                    <div class="contrato-nuevo">
                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
                            
                        </div>

                        <div class="container" style="margin-top: -25px;">
  
<strong style="color: black;">SELECCIONA</strong>

<select class="form-control" id="folio" name="ejeUno" onchange="select_folio(this.value);" style="height: 35px;">
            <option>-Selecciona-</option>
            <?php
            require('conexion.php');
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
  
 var val =  $("#folio").val();
 var encodedString = btoa(val);

    window.location.href = "Folio?val="+encodedString;
}

     </script> 
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
