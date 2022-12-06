function select_lab(val)
{
    
    $.ajax({
        type: "POST",
        url: 'consultaMinNoProveedor.php',
        data: 'id_datoProveedor='+val,
        success: function(resp){
            $('#tabla_result').html(resp);
            
        }
        
    });
    
}
function select_max_no_lab(val)
{
    
    $.ajax({
        type: "POST",
        url: 'consultaMaxNoProveedor.php',
        data: 'id_datoProveedor='+val,
        success: function(resp){
            $('#tabla_resu').html(resp);
            
        }
        
    });
    
}

