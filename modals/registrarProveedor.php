<div id="myModal_proveedor" class="modal fade" role="dialog">
<script src="control_usuario.js"></script>
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content"
            style="width: 110%; height: auto; color: white; left: 50%; transform: translate(-50%);">
            <div class="modal-header" style="background: green; color: white;">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> Ingresa los datos del proveedor </h4>
            </div>
            <div class="modal-body">
              
                <div id="panel_editar">

                        <div class="cabecera-contrato">
                            <div class="imagen1"></div>
      
                        </div>


                                <!-- form start -->
                                <form action="registrarProveedor" method="POST">
                   
                            <div class="container" style="margin-top: 10px; width: 97%; padding: 5px;">
                                    <div class="form-body">
                                        
                                        <div class="form-group"><br>
                                            <label>NOMBRE DEL PROVEEDOR</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="datoPersonalProveedor" id="datoPersonalProveedor"
                                                    type="text" class="form-control" required="required"
                                                    onkeyup="mayus(this);">
                                            </div>

                                            <label>DOMICILIO PERSONAL</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="domicilioPersonal" id="domicilioPersonal" type="text"
                                                    class="form-control" onkeyup="mayus(this);">
                  
                                        </div>
                                
                                            <label>R.F.C</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="rfc" id="rfc" type="text"
                                                    class="form-control" onkeyup="mayus(this);">
                               
                                        </div>
                                 
                                            <label>TELEFONO</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="telefono" id="telefono" type="text" class="form-control"
                                                    >
                       
                                        </div>
                                  
                                            <label>DIRECCIÓN DE INTERNET</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="direccionInternet" id="direccionInternet" type="text"
                                                    class="form-control" onkeyup="mayus(this);">
                         
                                        </div>
                              
                                            <label>CORREO ELECTRONICO</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="correoElectronico" id="correoElectronico" type="text"
                                                    class="form-control" >
      
                                        </div>
                                      
                                            <label>NUMERO DE PROCEDIMIENTO</label>
                                            <div class="input-group">
                                                <div class="input-group-addon"><span
                                                        class="glyphicon glyphicon-envelope"></span></div>
                                                <input name="numeroDeProcedimiento" id="numeroDeProcedimiento"
                                                    type="text" class="form-control" 
                                                    onkeyup="mayus(this);">
                          
                                        </div>
                                    </div>
                                <br>
                            </div>
               
                <div id="panel_respuesta_edicion"></div>
                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" name="almacenarProveedor" value="Guardar"
                        onclick="btn_guardar_proveedor();" >
                    
                        </div>
                  </div>
                </div>
            </div>
        </div>
    </div>
</form>

