<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <title>Document</title>
</head>
<body>
<?php session_start();

    error_reporting(0);
    include 'funciones/funcionEliminaRegistr.php';
//mysql_connect("localhost","root","serverlocal");

//selección de la base de datos con la que vamos a trabajar 
//mysql_select_db("farmacia");

//Creamos la sentencia SQL y la ejecutamos
//$sSQL="Delete From medicamento Where clave='{$_GET["clave"]}'";
//mysql_query($sSQL);
$clav = base64_decode($_GET['id_medicamento']);
delete('listamedicamento','id_medicamento',$clav);        
          
          /*  $path = "frontend/cartaLaboralPrivado1/".$numAleatorio47;
							if(file_exists($path)){
								$directorio = opendir($path);
								while ($archivo = readdir($directorio))
								{
									if (is_dir($archivo)){
                                        unlink($archivo);
									}
								}
                            }
                            */
                            /*
                            $path2 = "../SysteamHRAEI/frontend/hojaDeServicio1/".$numAleatorio48;
							if(file_exists($path2)){
								$directorio2 = opendir($path2);
								while ($archivo2 = readdir($directorio2))
								{
									if (is_dir($archivo2)){
                                        unlink($archivo2);
									}
								}
							}
            
            
                            $dir = "../SystemHRAEI/frontend/cartaLaboralPrivado1/".$numAleatorio47;     
                            $files = opendir($dir); // Devuelve un vector con todos los archivos y directorios
                            $ficherosEliminados = 0;
                            foreach($files as $f){
                               if (is_file($dir.$f)) {
                                  if (unlink($dir.$file) ){
                                     $ficherosEliminados++;
                                   }
                                }
                            }
                            
            deleteDirectory('hojaDeServicio1');
*/
if(delete != false){
echo "<script>swal({
    title: 'Good',
    timer: 1000,
    showConfirmButton: false
  
    });
    </script>";
}else{
   echo "<script>alert('Error inesperado, intente nuevamente');</script>";
}

echo "<script>setTimeout('window.history.back();',1000);</script>"

?> 
</body>
</html>