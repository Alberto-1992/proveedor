<?php
include('conexion.php');
$prove = $_POST["id_datoProveedor"];

$sql_s = $conexion2->query('SELECT DISTINCT claveUnicaOrden FROM objetocontratacion WHERE clave_objeto_contratacion = "'.$prove.'"');
while ($row_s = mysqli_fetch_array($sql_s)) {
  $ID_usuario = $row_s['claveUnicaOrden'];
  $nombre = $row_s['claveUnicaOrden'];
  ?>
   <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

   <?php
}


            ?>

</select>