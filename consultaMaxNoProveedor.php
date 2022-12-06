<?php
include('conexion.php');
$prove =$_POST["id_datoProveedor"];

$sql_s = $conexion2->query('SELECT DISTINCT numeroContrato FROM listamedicamento WHERE PROVEEDOR = "'.$prove.'"');
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['numeroContrato'];
  $nombre = $row_s['numeroContrato'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


?>
</select>