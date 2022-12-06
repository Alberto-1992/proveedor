<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/styles.css">
    <link href="css/main.css" rel="stylesheet">
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="icono/icono.ico" rel="shortcut icon">
    <link href="https://fonts.googleapis.com/css?family=Raleway:300,400,600" rel="stylesheet" type="text/css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

    <title>HRAEI</title>

    <link rel="stylesheet" href="https://cdn.linearicons.com/free/1.0.0/icon-font.min.css">
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>

    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>

    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="librerias/bootstrap/css/bootstrap-theme.min.css">

    <script type="text/javascript" src="librerias/bootstrap/js/jquery.min.js"></script>
    <script type="text/javascript" src="librerias/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <link rel="stylesheet" href="iconos/css/all.min.css?n=1">
    <link rel="stylesheet" href="iconos/css/all.css?n=1">
    <script src="iconos/js/all.min.js"></script>
    <script src="scripts/tablamedicamentoFG.js"></script>
    <script src="scripts/tablamedicamentobusFG.js"></script>
    <script src="scripts/listarMedicamento.js"></script>
    <script src="scripts/selectContrato.js"></script>
    <script src="consolidadas.js"></script>
    <script src="consolidadasExterno.js"></script>
    <script src="scripts/medicamentos.js"></script>
    <script src="scripts/medicamentoEnOrden.js"></script>
    <script src="scripts/salidasCisfa.js"></script>
    <script src="scripts/entradasCisfa.js"></script>
    <script src="scripts/cancelarOrdenOs.js"></script>
    <script src="scripts/mult.js"></script>
    <script src="scripts/medicamentosbusFG.js"></script>



    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
        integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"
        integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous">
    </script>



    <script>
    function opener() {
        nwin = window.open("", "newWin", "toolbar=no,location= no,resizable=no",
            width = 200, height = 200, left = 100, top = 100)
    }
    </script>


</head>

<body>


    <header style="background-color: #727272;">


        <strong id="cabecera" style="color: white; float: left; margin-left: 42%; font-size: 18px;">Medicamentos
            contratos CISFA </strong>

        <script>
        //	window.onload = function(){killerSession();}
        //	function killerSession(){
        //	setTimeout("window.open('confirmCloseSession.php','_top');", 2.4e+6);
        //	}
        </script>
        <script type="text/javascript">
        $('.nav-item dropdown').hover(function() {
            $('#navbarDropdown').trigger('click')

        })
        </script>

    </header>

    <div id="box1">
        <div class="imagenCisfa" style="margin-top: -34px; border-radius: 25px; height: 94px;"></div>
        <input list="consult_medica" class="form-control" id="buscardor" type="text"
            onchange="btn_buscar_medicamentobus();" placeholder="Clave, Nombre o CNIS del Medicamento">

        <datalist id="consult_medica">
            <?php
            require 'conexion.php';
            $sql_s = $conexion2->query("SELECT DISTINCT DESCRIPCION, CLAVEHRAEI FROM listamedicamento where  fechaContrato = '2022' and farmacia = 'gratuita'");
            while ($row_s = mysqli_fetch_array($sql_s)) {
              $ID_usuario = $row_s['CLAVEHRAEI'];
              $nombre = $row_s['DESCRIPCION'];
              ?>
            <option value="<?php echo $ID_usuario; ?>"> <?php echo $nombre; ?></option>

            <?php
            }
            
            
                        ?>

        </datalist>
        <input type="submit" data-toggle="modal" data-target="#myModal_cargamedicamento" class="btn btn-success"
            value="  +  Cargar Medicamento" id="boton">
        <div class="autoheight">



            <div id="tabla_resultadobus"></div>

            <div id="tabla_resultado" class="adaptar"></div>
        </div>
    </div>
    <style>
    .box1 {
        width: 100%;
        height: 100%;
        background: #ffffff;
        color: black;
        display: flex;
        position: absolute;
        overflow-y: hidden;

    }

    .autoheight {
        width: 100%;
        height: 100%;
        background: white;
        color: black;
        display: flex;

    }

    ::-webkit-scrollbar {
        width: 5px;
    }

    ::-webkit-scrollbar-track {
        background: #ACAEAD;
        border-radius: 50px;
    }

    ::-webkit-scrollbar-thumb {
        background: #fff;
        border-radius: 50px;
    }

    #boton {
        width: 180px;
        height: 35px;
        margin-top: 60px;

    }

    #buscardor {
        margin-top: 60px;
        width: 40em;
        float: left;
    }

    #tabla_resultadobus {
        width: 50%;
        height: 70em;
        position: relative;
        float: left;
        margin-left: 10px;
        margin-top: 0px;
        resize: horizontal;
        overflow: auto;
        font-size: 12px;

    }

    .adaptar {
        width: 100%;
        height: 70em;
        font-size: 12px;
        position: relative;
        resize: horizontal;
        overflow: auto;
        margin-left: 5px;
        overflow-x: auto;


    }
    </style>
    <?php
require 'modals/buscarMedicamentobus.php';
require 'modals/cargarMedicamentoFG.php';
?>
    <script src="frontend/js/script.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
</body>

</html>