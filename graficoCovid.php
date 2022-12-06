<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

	
        <script src="Highcharts-4.1.5/js/highcharts.js"></script>
        <script src="Highcharts-4.1.5/js/highcharts-3d.js"></script>
        <script src="Highcharts-4.1.5/js/modules/exporting.js"></script>
      
    <title>Document</title>
</head>

<body >
   


    <?php
$val1 = $_POST['val1'];
$val2 = $_POST['val2'];
$val3 = $_POST['val3'];
$val4 = $_POST['val4'];
$val5 = $_POST['val5'];
$val6 = $_POST['val6'];
$val7 = $_POST['val7'];
$val8 = $_POST['val8'];
$val9 = $_POST['val9'];
$val10 = $_POST['val10'];
$val11 = $_POST['val11'];
$val12 = $_POST['val12'];
$fecha1 = $_POST['fecha1'];
$fecha2 = $_POST['fecha2'];

require 'conexion.php';

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val1' ");
$result = mysqli_fetch_assoc($sql);

$total5 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val2'");
$result = mysqli_fetch_assoc($sql);

$total4 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val3'");
$result = mysqli_fetch_assoc($sql);

$total3 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val4'");
$result = mysqli_fetch_assoc($sql);

$total2 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val5'");
$result = mysqli_fetch_assoc($sql);


$total1 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val6' ");
$result = mysqli_fetch_assoc($sql);


$total6 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val7' ");
$result = mysqli_fetch_assoc($sql);


$total7 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val8' ");
$result = mysqli_fetch_assoc($sql);


$total8 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val9' ");
$result = mysqli_fetch_assoc($sql);


$total9 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val10' ");
$result = mysqli_fetch_assoc($sql);


$total10 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val11' ");
$result = mysqli_fetch_assoc($sql);


$total11 = $result['descripcion'];

$sql = $conexion2->query("SELECT LEFT(descripcion, 30) as descripcion from covid where clavehraei = '$val12' ");
$result = mysqli_fetch_assoc($sql);


$total12 = $result['descripcion'];


?>


<div class="contenedor" style="width: 100%; height: auto; margin-left: auto; margin-right: auto; margin-top: 15px;">
<script type="text/javascript">
	$(function(){
 $('#horizontal').highcharts({
        chart: {
            type: 'bar'
            
        },
        title: {
            text: 'Graficos consumos claves HRAEI'
        },
        subtitle: {
            text: 'HRAEI'
        },
        xAxis: {
            categories: [
			
			['<?php echo $total5 ?>'],
			
			
			['<?php echo $total4 ?>'],
			
			
			['<?php echo $total3 ?>'],
			
			
			['<?php echo $total2 ?>'],
		
			
			['<?php echo $total1 ?>'],
			
			['<?php echo $total6 ?>'],
				
				 
			['<?php echo $total7 ?>'],
			
			['<?php echo $total8 ?>'],
			
			['<?php echo $total9 ?>'],
			
			['<?php echo $total10 ?>'],
			
			['<?php echo $total11 ?>'],
			
			['<?php echo $total12 ?>'],
			],
            title: {
                text: null
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: 'Puntaje',
                align: 'high'
            },
            labels: {
                overflow: 'justify'
            }
        },
        tooltip: {
            valueSuffix: ''
        },
        plotOptions: {
            bar: {
                dataLabels: {
                    enabled: true
                }
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            x: -40,
            y: 100,
            floating: true,
            borderWidth: 1,
            backgroundColor: ((Highcharts.theme && Highcharts.theme.legendBackgroundColor) || '#FFFFFF'),
            shadow: true
        },
        credits: {
            enabled: false
        },
        series: [{
            name: 'Cantidad consumida',
            data: [
			<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total from covid where clavehraei = '$val1' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res['total'] ?>],
		
<?php
}
?>	
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total2 from covid where clavehraei = '$val2' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res2=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res2['total2'] ?>],
		
<?php
}
?>	
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total3 from covid where clavehraei = '$val3' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res3=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res3['total3'] ?>],
		
<?php
}
?>
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total4 from covid where clavehraei = '$val4' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res4=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res4['total4'] ?>],
		
<?php
}
?>
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total5 from covid where clavehraei = '$val5' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res5=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res5['total5'] ?>],
		
<?php
}
?>
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total6 from covid where clavehraei = '$val6' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res6=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res6['total6'] ?>],
		
<?php
}
?>
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total7 from covid where clavehraei = '$val7' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res7=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res7['total7'] ?>],
		
<?php
}
?>
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total8 from covid where clavehraei = '$val8' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res8=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res8['total8'] ?>],
		
<?php
}
?>
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total9 from covid where clavehraei = '$val9' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res9=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res9['total9'] ?>],
		
<?php
}
?>
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total10 from covid where clavehraei = '$val10' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res10=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res10['total10'] ?>],
		
<?php
}
?>
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total11 from covid where clavehraei = '$val11' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res11=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res11['total11'] ?>],
		
<?php
}
?>
<?php
$sql = $conexion2->query("SELECT sum(cantidad) as total12 from covid where clavehraei = '$val12' and fecha BETWEEN '$fecha1' and '$fecha2'");
while($res12=mysqli_fetch_array($sql)){			
?>			
			[<?php echo $res12['total12'] ?>],
		
<?php
}
?>
			]
        }]
    });
});
</script>




<div id="horizontal" style="width: 100%; height: 750px;"></div>

</body>
</html>