<html>
<div class="menu" id="submenu">
    <input type="text"
        style="width:100%; text-align: center; height:30px; margin-top:5px; font-size:15px; font-style: normal; color: white; background-color: #ddc9a3; border-radius:5px"
        disabled value="Hola&nbsp;<?php echo $rw['nombre_trabajador']; ?>">

    <div class="line">
        <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
            <label class="lnr lnr-enter">
                <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;" value="Contratos CISFA">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%;">
                    <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                                data-target="#myModal_contratos"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Contratos CISFA"></div>
                    <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                                data-target="#myModal_contratoProveedor"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Cargar contrato"></label></div>


                </div>
            </label>
        </li>
    </div>
    <hr style="margin: 0px 0px;">
    <div class="line">
        <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
            <label class="lnr lnr-unlink">
                <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;" value="Medicamentos">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%;">
                    <!--<div class=""><label class="dropdown-item"><input type="submit" onclick="window.open('medicamentos');"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Medicamento FI"></label></div>-->
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.open('medicamentosFG');"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Medicamento FG"></label></div>
                    <!--<div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                    data-target="#myModal_medicamentoEnOrden"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Medicamento en OS" ></label></div>
          <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                    data-target="#myModal_listarMedicamento"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Buscar Medicamento"></label></div>
            <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                    data-target="#myModal_listarMedicamentoCons"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Buscar Medicamento Cons."></label></div>-->

                </div>
            </label>
        </li>
    </div>
    <hr style="margin: 0px 0px;">

    <!-- <div class="line" >
    <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
       <label class="lnr lnr-user">
        <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                value="Proveedores">
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%;">
           <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                    data-target="#myModal_proveedor"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Cargar proveedor"></div>
          <div class=""><label class="dropdown-item"><input type="submit"  onclick="window.open('listaProveedores');"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Listar proveedores"></label></div>
          
          
      </div></label></li></div>-->

    <!-- 
    <div class="line" >
    <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
       <label class="lnr lnr-file-add">
        <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                value="Facturas">
        <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%;">
           <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                    data-target="#myModal_cargarFactura"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Cargar factura"></div>
          <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                    data-target="#myModal_consultarFactura"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Consultar factura"></label></div>
          
          
      </div></label></li></div>-->


    <div class="line">
        <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
            <label class="lnr lnr-book">
                <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                    value="Orden de suministro">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%;">
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.location.href='suministrosFG'"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Orden de suministro"></div>
                    <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                                data-target="#myModal_editarOrden"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Editar orden suministro"></label></div>
                    <div class=""><label class="dropdown-item"><input type="submit" data-toggle="modal"
                                data-target="#myModal_cancelarOrden"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Cancelar orden suministro"></label></div>



                </div>
            </label>
        </li>
    </div>
    <hr style="margin: 0px 0px;">

    <!--
        <div class="line"><label class="lnr lnr-enter"><input type="submit" data-toggle="modal"
                    data-target="#myModal_contratos"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                value="Contratos CISFA"></label></div>

            <div class="line"><label class="lnr lnr-heart-pulse"><input type="submit" data-toggle="modal"
                    data-target="#myModal_medicamentoEnOrden"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Medicamento en OS" ></label></div>
                    
        <div class="line"><label class="lnr lnr-magnifier"><input type="submit" data-toggle="modal"
                    data-target="#myModal_listarMedicamento"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Buscar Medicamento"></label></div>
                    
        <div class="line"><label class="lnr lnr-magnifier"><input type="submit" data-toggle="modal"
                    data-target="#myModal_listarMedicamentoCons"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Buscar Medicamento Cons."></label></div>
                    
        <div class="line"><label class="lnr lnr-unlink"><input type="submit" value="Listar medicamento"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px; border: 0; outline: none; "
                    onclick="listarMedicamento(); return false;" class="button">
                 </label></div>
        <div class="line"><label class="lnr lnr-database"><input type="submit" onclick="window.open('inventario','','');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Farmacia Gratuita"></label></div>-->
    <!-- <div class="line"><label class="lnr lnr-chart-bars"><input type="submit" value="Grafico consumos"
                    style="margin-left: 20px; background: none; color: black; font-size: 13px; border: 0; outline: none; "
                    onclick="graficosConsumosMedicamentos(); return false;" class="button">
                    
                    </label></div>-->
    <!--    
        <div class="line"><label class="lnr lnr-enter"><input type="submit" data-toggle="modal"
                    data-target="#myModal_contratoProveedor"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Cargar contrato"></label></div>
            -->
    <!--        
        <div class="line"><label class="lnr lnr-user"><input type="submit" data-toggle="modal"
                    data-target="#myModal_proveedor"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Cargar proveedor"></label></div>
            
        <div class="line"><label class="lnr lnr-file-add"><input type="submit" data-toggle="modal"
                    data-target="#myModal_cargarFactura"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Cargar factura"></label></div>
                  
        <div class="line"><label class="lnr lnr-file-empty"><input type="submit" data-toggle="modal"
                    data-target="#myModal_consultarFactura"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Consultar factura"></label></div>
            
        <div class="line"><label class="lnr lnr-book"><input type="submit" onclick="window.location.href='suministros'"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Orden de suministro"></label></div>
            
        <div class="line"><label class="lnr lnr-enter"><input type="submit" data-toggle="modal"
                    data-target="#myModal_cancelarOrden"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Cancelar orden suministro"></label></div>
                    
        <div class="line"><label class="lnr lnr-database"><input type="submit" data-toggle="modal"
                    data-target="#myModal_covid"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Pacientes COVID"></label></div>
            -->
    <!-- <div class="line"><label class="lnr lnr-database"><input type="submit" data-toggle="modal"
                    data-target="#myModal_salidasCisfa"
                    style="margin-left: 20px; background: none; color: black; font-size: 13px;"
                    value="Salidas CISFA"></label></div>
                    
        <div class="line"><label class="lnr lnr-database"><input type="submit" data-toggle="modal"
                    data-target="#myModal_entradasCisfa"
                    style="margin-left: 20px; background: none; color: black; font-size: 13px;"
                    value="Entradas CISFA"></label></div>
                
        <div class="line"><label class="lnr lnr-database"><input type="submit" data-toggle="modal"
                    data-target="#myModal_promedioCisfa"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Consumo prom. CISFA"></label></div>-->

    <!--   <div class="line"><label class="lnr lnr-enter"><input type="submit" data-toggle="modal"
                    data-target="#myModal_Donaciones"
                    style="margin-left: 20px; background: none; color: black; font-size: 14px;"
                    value="Cargar donacion"></label></div>
                    
        <div class="line"><label class="lnr lnr-enter"><input type="submit" data-toggle="modal"
                    data-target="#myModal_VerDonaciones"
                    style="margin-left: 20px; background: none; color: black; font-size: 14px;"
                    value="Ver donaciones"></label></div>-->

    <!--          
        <div class="line"><label class="lnr lnr-database"><input type="submit" onclick="window.open('entradasBodega','','');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Entradas bodega"></label></div>
                    
        <div class="line"><label class="lnr lnr-database"><input type="submit" onclick="window.open('salidasBodega','','');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Salidas bodega"></label></div>-->
    <div class="line">
        <li class="nav-item dropdown" id='dmenu' style="list-style:none;">
            <label class="lnr lnr-unlink">
                <input type="submit" id="navbarDropdown" data-toggle="dropdown"
                    style="margin-left: 8px; background: none; color: black; font-size: 13px;" value="Minimos/Maximos">
                <div class="dropdown-menu" aria-labelledby="navbarDropdown" style="width: 100%;">
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.open('minimos','','width=1300,height=900,left=70,top=50,toolbar=yes');"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Minimos no alcanzados"></div>
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.open('minimosCubiertos','','width=1300,height=900,left=70,top=50,toolbar=yes');"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Minimos alcanzados"></label></div>
                    <div class=""><label class="dropdown-item"><input type="submit"
                                onclick="window.open('maximosCubiertos','','width=1300,height=900,left=70,top=50,toolbar=yes');"
                                style="margin-left: 8px; background: none; color: black; font-size: 13px;"
                                value="Maximos alcanzados"></label></div>


                </div>
            </label>
        </li>
    </div>
    <hr style="margin: 0px 0px;">
    <!--
        <div class="line"><label class="lnr lnr-unlink"><input type="submit" onclick="window.open('minimos','','width=1300,height=900,left=70,top=50,toolbar=yes');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Minimos no alcanzados"></label></div>
                    
        <div class="line"><label class="lnr lnr-unlink"><input type="submit" onclick="window.open('minimosCubiertos','','width=1300,height=900,left=70,top=50,toolbar=yes');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Minimos alcanzados"></label></div>
                    
        <div class="line"><label class="lnr lnr-thumbs-up"><input type="submit" onclick="window.open('maximosCubiertos','','width=1300,height=900,left=70,top=50,toolbar=yes');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Maximos alcanzados"></label></div>
              
        <div class="line"><label class="lnr lnr-apartment"><input type="submit"  onclick="window.open('listaProveedores');"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px;"
                    value="Listar proveedores"></label></div>-->
    <!--<div class="line"><label class="lnr lnr-heart-pulse"><input type="submit" data-toggle="modal"
                    data-target="#myModal_minimosLab"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px; "
                    value="Minimos N/A por Laboratorio"></label></div>-->
    <!-- <div class="line"><label class="lnr lnr-heart-pulse"><input type="submit" data-toggle="modal"
                    data-target="#myModal_maximosLab"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px; "
                    value="Maximos Alcan. por Laboratorio"></label></div>-->
    <!--<div class="line"><label class="lnr lnr-book"><input type="submit" data-toggle="modal"
                    data-target="#myModal_folios"
                    style="margin-left: 20px; background: none; color: black; font-size: 15px; "
                    value="Generar folios Ordenes"></label></div>-->
    <!--<div class="line"><label class="lnr lnr-users"><input type="submit" 
                    style="margin-left: 20px; background: none; color: black; font-size: 14px;"
                    onclick="window.open('usuarios', '', 'width=1130,height=800, top=55, left=180, toolbar=yes');" value="Cuentas de usuarios">
                    </label></div>-->
    <!--<div class="line"><label class="lnr lnr-users"><input type="submit" 
                    style="margin-left: 20px; background: none; color: black; font-size: 14px;"
                    onclick="window.open('validar', '', 'width=1130,height=800, top=55, left=180, toolbar=yes');" value="Registrar usuario"></label></div>-->
    <div class="line"><label class=""><a href="close_sesion"
                style="color: red; font-size:17px; font-style:normal; margin-left: 60px; text-decoration: none;">
                Cerrar Sesion
            </a></label></div>

    <br><br><br><br>
</div>

</html>