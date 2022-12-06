<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!DOCTYPE html>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
<link rel="stylesheet" href="css/bootstrap.min.css">
<link rel="stylesheet" href="css/jquery.dataTables.min.css">
<script src="js/jquery-3.5.1.min.js"></script>
<script src="js/jquery.dataTables.min.js"></script>
<script src="js/jquery.tabledit.js"></script>
<link rel="stylesheet" href="iconos/css/all.min.css">
	<link rel="stylesheet" href="iconos/css/all.css">

    <link rel="stylesheet" href="css/main.css">
    <link href="icono/icono.ico" rel="shortcut icon">
	<script src="iconos/js/all.min.js"></script>
    <div class="imagenCisfa" style="margin-top: 10px; "></div>
    <title>Ordenes de suministro</title>


<script>
 $(document).on("blur", "#fechaEntrego", function(){

let id= $(this).data("id_entrega");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "fechaEntregaInsumo");
});


$(document).on("blur", "#pzasEntrego", function(){

let id= $(this).data("id_entrego");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "pzasEntrego");
});

$(document).on("blur", "#monto", function(){

let id= $(this).data("id_monto");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "monto");
});

$(document).on("blur", "#fechaParcial", function(){

let id= $(this).data("id_parcial");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "fechaParcial");
});

$(document).on("blur", "#pzasEntrego2", function(){

let id= $(this).data("id_entrego2");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "pzasEntrego2");
});

$(document).on("blur", "#monto2", function(){

let id= $(this).data("id_monto2");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "monto2");
});

$(document).on("blur", "#fechaParcial2", function(){

let id= $(this).data("id_parcial2");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "fechaParcial2");
});

$(document).on("blur", "#pzasEntrego3", function(){

let id= $(this).data("id_entrego3");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "pzasEntrego3");
});

$(document).on("blur", "#monto3", function(){

let id= $(this).data("id_monto3");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "monto3");
});

$(document).on("blur", "#fechaParcial3", function(){

let id= $(this).data("id_parcial3");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "fechaEntrego3");
});

$(document).on("blur", "#pzasEntrego4", function(){

let id= $(this).data("id_entrego4");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "pzasEntrego4");
});

$(document).on("blur", "#monto4", function(){

let id= $(this).data("id_monto4");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "monto4");
});

$(document).on("blur", "#fechaParcial4", function(){

let id= $(this).data("id_parcial4");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "fechaEntrego4");
});

$(document).on("blur", "#pzasEntrego5", function(){

let id= $(this).data("id_entrego5");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "pzasEntrego5");
});

$(document).on("blur", "#monto5", function(){

let id= $(this).data("id_monto5");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "monto5");
});

$(document).on("blur", "#fechaParcial5", function(){

let id= $(this).data("id_parcial5");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "fechaEntrego5");
});

$(document).on("blur", "#claveHraei", function(){

let id= $(this).data("id_clave");
let nombre = $(this).text();
//alert(id);
actualizar_datos(id, nombre, "claveHraei");
});

function myFunction(o) {
          
          var _tr = $(o);
          var _1 = _tr.find("td").eq(6).html();
          var _2 = _tr.find("td").eq(11).html();
          var _11=parseFloat(_1);
          var _22=parseFloat(_2);
          var total= (_11 * _22);
          var _total = _tr.find("td").eq(12);

          if( isNaN(total) ){
              _total.html(0) ;
          }else{
              _total.html(total.toFixed(2)) ;
          }
  
      
      
      var _tr = $(o);
          var _1a = _tr.find("td").eq(6).html();
          var _2a = _tr.find("td").eq(14).html();
          var _11a=parseFloat(_1a);
          var _22a=parseFloat(_2a);
          var total_a= (_11a * _22a);
          var _total_a = _tr.find("td").eq(15);

          if( isNaN(total_a) ){
              _total_a.html(0) ;
          }else{
              _total_a.html(total_a.toFixed(2)) ;
          }
          
          var _tr = $(o);
          var _1b = _tr.find("td").eq(6).html();
          var _2b = _tr.find("td").eq(17).html();
          var _11b=parseFloat(_1b);
          var _22b=parseFloat(_2b);
          var total_b= (_11b * _22b);
          var _total_b = _tr.find("td").eq(18);

          if( isNaN(total_b) ){
              _total_b.html(0) ;
          }else{
              _total_b.html(total_b.toFixed(2)) ;
          }
          
          var _tr = $(o);
          var _1c = _tr.find("td").eq(6).html();
          var _2c = _tr.find("td").eq(20).html();
          var _11c=parseFloat(_1c);
          var _22c=parseFloat(_2c);
          var total_c= (_11c * _22c);
          var _total_c = _tr.find("td").eq(21);

          if( isNaN(total_c) ){
              _total_c.html(0) ;
          }else{
              _total_c.html(total_c.toFixed(2)) ;
          }
          
          var _tr = $(o);
          var _1d = _tr.find("td").eq(6).html();
          var _2d = _tr.find("td").eq(23).html();
          var _11d=parseFloat(_1d);
          var _22d=parseFloat(_2d);
          var total_d= (_11d * _22d);
          var _total_d = _tr.find("td").eq(24);

          if( isNaN(total_d) ){
              _total_d.html(0) ;
          }else{
              _total_d.html(total_d.toFixed(2)) ;
          }
  
}
      
      
</script>
<script>

            function actualizar_datos(id, texto, columna){

                $.ajax({
                url: 'modelo/actualizar_entrega_insumo.php',
                method: 'POST',
                data: {id:id, texto:texto, columna:columna},
                succes: function(data){

            }

        })

    }

</script>
<style>
::-webkit-scrollbar{
    width: 5px;
}
::-webkit-scrollbar-track{
    background: #ACAEAD;
    border-radius: 50px;
}
::-webkit-scrollbar-thumb{
    background: #fff;
    border-radius: 50px;
}
   #datatables-example{
       overflow-y: scroll;
       overflow-x: scroll;
   }
tbody{
    overflow-y: scroll;
    top: 100px;
}
td{
    cursor:pointer;
    top: 100px;
}

</style>

                <div class="table-responsive"> 
  
                <input type="submit" onclick="window.close();" value="Finalizar" class="btn btn-danger" style=" width: 130px; height: 27px; font-size: 12px; left: 10px; margin-top: 0px; position: fixed; z-index: 9; display: inline;">
                                         <input type="submit" onClick="location.reload(false);" value="Procesar" class="btn btn-primary" style=" width: 130px; height: 27px; font-size: 12px; display: inline; left: 145px; margin-top: 0px; color: white; position: fixed; z-index: 9;"><br><br>
                 <table id="datatables-example"  class="table table-striped table-bordered table-darkgray table-hover" style="width: 99%; float: left; margin-left: 10px; margin-top: 0px; font-size: 12px;">
                  
                 <thead> 
                  
                 <tr  style="color: white; background: green;">
                               <!-- definimos cabeceras de la tabla --> 
                 
                 <th>Datos del Proveeedor</th>
                 <th>Clave HRAEI</th>
                 <th>CNIS</th>
                 <th>Descripción</th>
                 <th>U D M</th>
                 <th>Cantidad solicitada</th>
                 <th>Precio unitario</th>
                 <th>Total</th>
                 <th>Fecha limite</th>
                 <th>Fecha entrega total</th>
                 <th>Penalizar</th>
                 <th>Entrega parcial 1 PZAS</th>
                 <th>Monto de entrega 1</th>
                 <th>Fecha entrega parcial 1</th>
                 <th>Entrega parcial 2 PZAS</th>
                 <th>Monto de entrega 2</th>
                 <th>Fecha entrega parcial 2</th>
                 <th>Entrega parcial 3 PZAS</th>
                 <th>Monto de entrega 3</th>
                 <th>Fecha entrega parcial 3</th>
                 <th>Entrega parcial 4 PZAS</th>
                 <th>Monto de entrega 4</th>
                 <th>Fecha entrega parcial 4</th>
                 <th>Entrega parcial 5 PZAS</th>
                 <th>Monto de entrega 5</th>
                 <th>Fecha entrega parcial 5</th>
                 
                 
                 
                 
                 </tr>
                  
                 </thead>
                  
                  
                 <tbody>
                     <?php
                     $total= 0;
                 $var = 0;
                 $var2 = 0;
                 $claveEntrega = base64_decode($_GET['claveEntrega']);
                 $nombre = base64_decode($_GET['nombre']);
                 $fecha = base64_decode($_GET['fecha']);
                 $fechaEntrega = base64_decode($_GET['fechaEntrega']);
                 $var = base64_decode($_GET['var']);
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
                 require 'conexion.php';
                 $valor2="LA-006000999-E4-2020";
                     $sql = $conexion2->query("SELECT *, left(descripcionDelBien, 30) as descripcion from ordensuministro where claveUnicaOrden = '$claveEntrega' order by claveHraei asc");
                    
                 
                           while($row=$sql->fetch_assoc())
                       
                        {
                      
                            $descripcion = $row['descripcion'];
                            $claveOrden = $row['claveUnicaOrden'];
                            $consult = $conexion2->query("SELECT fechaRegistro FROM numeroorden where claveUnicaContrato = '$claveOrden'");
                                $row_r = mysqli_fetch_assoc($consult);
                             $fechaOrden = $row_r['fechaRegistro'];
                            $date = $fechaEntrega;
                     //Incrementamos los dias que se requieran
                            $mod_date = strtotime($date."+ 0 days");
                            $dia = date("d-m-Y",$mod_date) . "\n";
                            $actual_dia = $row['fechaEntregaInsumo'];
                    
                            $datetime1 = date_create($dia);
                            $datetime2 = date_create($actual_dia);

                                if($datetime2>=$datetime1){
                                    $contador = date_diff($datetime1, $datetime2);
                                    $differenceFormat = '%a';
                                    $totalDias= $contador->format($differenceFormat);
                                }else{
                                     $totalDias = 0;
                                }
                          ?>
                 
                 <tr onkeyup="myFunction(this)" >
                 <td colspan="1" rowspan="1"><?php echo Nombre.':&nbsp'.$row['nombreproveedor'].'<br>'.Fecha.':&nbsp'.$fechaOrden.'<br>'.Numero.' '.de.' '.orden.':&nbsp'.$row['claveUnicaOrden'];?></td>
                 <td><?php echo $row['claveHraei']; ?></td>
                 <td><?php echo $row['cuadroBasico']; ?></td>
                 <td data-id="<?php echo $descripcion; ?>" class="show-modal-qualification"><?php echo $descripcion; ?></td>
                 <td><?php echo $row['unidadMedida']; ?></td>
                 <td><?php echo $row['cantidad']; ?></td>
                 <td><?php echo $row['precioUnitario']; ?></td>
                 <td><?php echo formatMoney($row['importe']); ?></td>
                 <td><?php echo $fechaEntrega; ?></td>
                 <td id="fechaEntrego" data-id_entrega='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['fechaEntregaInsumo'] ?></td>
                 <td><input class="penaliza" type="checkbox" value="<?php echo $row['id_ordenSuministro']; ?>" id="activar" <?php echo $row['penalizar']; ?> <?php if ($row['penalizar'] == "1") echo 'checked="checked"' ?>></td>
               
                 <td id="pzasEntrego" data-id_entrego='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['pzasEntrego'] ?></td>
                 <td id="monto" data-id_monto='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo formatMoney($row['monto']) ?></td>
                 <td id="fechaParcial" data-id_parcial='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['fechaParcial'] ?></td>
                 <td id="pzasEntrego2" data-id_entrego2='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['pzasEntrego2'] ?></td>
                 <td id="monto2" data-id_monto2='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo formatMoney($row['monto2']) ?></td>
                 <td id="fechaParcial2" data-id_parcial2='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['fechaParcial2'] ?></td>
                 <td id="pzasEntrego3" data-id_entrego3='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['pzasEntrego3'] ?></td>
                 <td id="monto3" data-id_monto3='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo formatMoney($row['monto3']) ?></td>
                 <td id="fechaParcial3" data-id_parcial3='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['fechaEntrego3'] ?></td>
                 <td id="pzasEntrego4" data-id_entrego4='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['pzasEntrego4'] ?></td>
                 <td id="monto4" data-id_monto4='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo formatMoney($row['monto4']) ?></td>
                 <td id="fechaParcial4" data-id_parcial4='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['fechaEntrego4'] ?></td>
                 <td id="pzasEntrego5" data-id_entrego5='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['pzasEntrego5'] ?></td>
                 <td id="monto5" data-id_monto5='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo formatMoney($row['monto5']) ?></td>
                 <td id="fechaParcial5" data-id_parcial5='<?php echo $row['id_ordenSuministro'] ?>' contenteditable><?php echo $row['fechaEntrego5'] ?></td>
                              
                 </tr>
            <?php } ?>
        </tbody>
    </table>
    <?php
                    $total += $row['totalPenalizacion'];
                    $id= $row['id_ordenSuministro'];
                        
                        
                 
                        ?>
                      <script type="text/javascript">
                      $('.penaliza').click(function() {
                                
                        let id_orden = $(this).val();
           
                        let ob = {id_orden:id_orden};
                    $.ajax({
                        type: "POST",
                        url: 'actualizarPenalizacion.php',
                        data: ob,
                        beforeSend: function(objeto){
                        },    
                        success: function(resp){
           
                        }
        
                        });   
                    });
                             
                         </script>  
     
                 </div>
                     </div>
                                     
                                         <?php
                                       //   echo '<input type="submit "><a href="Orden.php?var='.$id_unico.'&valor2='.$claveUnica.'&total='.$var.'&id_unico='.$id_unico.'&claveContrato='.$claveUnica.'" class="btn btn-info" style=" width: 150px; float: right; margin-right: 580px; margin-top: 0px;">GENERAR ORDEN</a>';
                                      //    echo '<input type="submit "><a onclick="actualiza();" class="btn btn-danger" style=" width: 150px; float: right; margin-right: -380px; margin-top: 0px; color: white;">TOTAL</a>';
                                       
                                      
                                         ?>
                                        
                                         
                                      
                                  
    <script>
        function actualiza(){
            location.reload();
                 
            };
                                         
    $(document).ready(function () {
    $('#datatables-example').DataTable({
        pagingType: 'full_numbers',
    });
});
  $('.show-modal-qualification').click(function() {
  $('#qualification').modal({ show:true });
  $('#descripcion').text($(this).data('id'));

});
                    </script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
                                 
</div>  

<div class="modal" role="dialog" id="qualification" >
  <div class="modal-dialog modal-xl">
  

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 750px; height: 450px; color: white;  margin-top: 50%; left: 50%; transform: translate(-50%); ">
            <div class="modal-header" style="background: green; color: white;">
              
                <h4 class="modal-title">Descripcion completa</h4>
            </div>
       
                

                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>

                          
                        </div>
<style>
    label{
        color: black;
    }
</style>
                   
  
               
                    <div class="modal-body" >
  
      
                    <strong style="color: black;">Descripción completa</strong>
                            <div class="input-group">
                                <div class="input-group-addon"><span class="glyphicon glyphicon-blackboard"></span></div>
                                <textarea id="descripcion" name="descripcion" placeholder="Descripción Completa" class="form-control"
                                     onkeyup="mayus(this);" rows="12"></textarea>
                            </div>
   
                </div>
            </div>           
        </div> 
    </div>