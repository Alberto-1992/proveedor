<?php
//-----------------conexion para el inicio de sesion del sistema-------------IMPORTANTE-----solo modificar las credenciales del nombre de la base, la contraseña y usuario no mover nada mas de lo contrario deja de funcionar el inicio de sesion
try{
   $conexion = new PDO('mysql:host=localhost;dbname=u972837353_proveedor', 'u972837353_cisfa', 'cisfaHraei123');
 }catch(PDOException $prueba_error){
  echo "Error: " . $prueba_error->getMessage();
 }

 try{
  $conexion5 = new PDO('mysql:host=localhost;dbname=u972837353_proveedor', 'u972837353_cisfa', 'cisfaHraei123');
}catch(PDOException $prueba_error){
 echo "Error: " . $prueba_error->getMessage();
}
 $con = new mysqli("localhost", "u972837353_cisfa", "cisfaHraei123", "u972837353_proveedor");
if ($con->connect_errno)
{
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
 $conect = new mysqli("127.0.0.1", "u972837353_rh", "rHbolsa2021", "u972837353_bolsatrabajo");
if ($con->connect_errno)
{
    echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
    exit();
}
@mysqli_query($con, "SET NAMES 'utf8'");
 $host = 'localhost';
 $basededatos = 'u972837353_proveedor';
 $usuario = 'u972837353_cisfa';
 $contraseña = 'cisfaHraei123';
 
 $conexion2 = new mysqli($host, $usuario,$contraseña, $basededatos);
 $conexion2-> set_charset("utf8");
 if ($conexion2 -> connect_errno)
 {
   die("Fallo la conexion:(".$conexion2 -> mysqli_connect_errno().")".$conexion2-> mysqli_connect_error());
 }
 mysqli_query($conexion2,  'utf8');
 
 $host = 'localhost';
 $basededatos = 'u972837353_proveedor';
 $usuario = 'u972837353_cisfa';
 $contraseña = 'cisfaHraei123';
 
 $conexion3 = new mysqli($host, $usuario,$contraseña, $basededatos);
 $conexion3-> set_charset("utf8");
 if ($conexion2 -> connect_errno)
 {
   die("Fallo la conexion:(".$conexion3 -> mysqli_connect_errno().")".$conexion3-> mysqli_connect_error());
 }
 mysqli_query($conexion3,  'utf8');
//-----------------conexion para el inicio de sesion del sistema-------------IMPORTANTE-----solo modificar las credenciales del nombre de la base, la contraseña y usuario no mover nada mas de lo contrario deja de funcionar el inicio de sesion



//-----------------IMPORTANTE---------------conexion para la generacion de archivo de excel--------------no eliminar conexion
/*class Conexion{
  var $ruta;
  var $usuario;
  var $contrasena;
  var $baseDatos;

  function Conexion(){
    $this->ruta       ="localhost"; //
    $this->usuario    ="root"; //usuario que tengas definido
    $this->contrasena ="serverlocal"; //contraseña que tengas definidad
    $this->baseDatos  ="postulate"; //base de datos personas, si quieres utilizar otra base de datos solamente cambiala
  }

  function conectarse(){
   
    //------------------------TIPO DE CONEXION 2 - RECOMENDADA---------------------------------------------
    $enlace = mysqli_connect($this->ruta, $this->usuario, $this->contrasena, $this->baseDatos);
    if($enlace){
     // echo "Conexion exitosa";	//si la conexion fue exitosa nos muestra este mensaje como prueba, despues lo puedes poner comentarios de nuevo: //
    }else{
      die('Error de Conexión (' . mysqli_connect_errno() . ') '.mysqli_connect_error());
    }
    return($enlace);
    // mysqli_close($enlace); //cierra la conexion a nuestra base de datos, un ounto de seguridad importante.
  }
}
*/
/*
$bd_host = "localhost";
$bd_usuario = "root";    // el alias de la cuenta creada de la base de datos
$bd_password = "serverlocal";          // la contrasena de la cuenta
$bd_base = "proveedor";   // el nombre de la base de datos

$con = mysql_connect($bd_host, $bd_usuario,$bd_password); 
mysql_select_db($bd_base, $con);
mysql_set_charset('utf8'); 

  if($con==TRUE){
   //echo "coneccion existosa";
  }
  */
  ?>
  