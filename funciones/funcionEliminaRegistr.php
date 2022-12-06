<?php 
function db_query($query) {
    $connection = mysqli_connect("localhost","u972837353_cisfa","cisfaHraei123","u972837353_proveedor");
    $result = mysqli_query($connection,$query);

    return $result;
}

function delete($tblname, $field, $usuario){

	$sql = "delete from ".$tblname." where ".$field."=".$usuario."";
	
	return db_query($sql);
}


?>