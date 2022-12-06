$.ajax({
                type: "POST",
                url : 'consultaBolsaTrabajo.php',
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado3").html(data);
            
                }
             });