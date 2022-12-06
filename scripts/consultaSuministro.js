function tipoFarmacia()
{ 

 let ID_usuario =  $("#tipo1").val();
 let year = $("#year").val();
    let ob = {ID_usuario:ID_usuario, year:year};

     $.ajax({
                type: "POST",
                url:"consultaSuministros.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado2").html(data);
            
                }
             });
}
function tipoFarmacia2()
{ 

 let ID_usuario =  $("#tipo2").val();
 let year = $("#year2").val();
    let ob = {ID_usuario:ID_usuario, year:year};

     $.ajax({
                type: "POST",
                url:"consultaSuministros.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado2").html(data);
            
                }
             });
}

function tipoFarmacia3()
{ 

 let ID_usuario =  $("#tipo3").val();
 let year = $("#year3").val();
    let ob = {ID_usuario:ID_usuario, year:year};

     $.ajax({
                type: "POST",
                url:"consultaSuministros.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado2").html(data);
            
                }
             });
}
function tipoFarmacia4()
{ 

 let ID_usuario =  $("#tipo4").val();
 let year = $("#year3").val();
    let ob = {ID_usuario:ID_usuario, year:year};

     $.ajax({
                type: "POST",
                url:"consultaSuministros.php",
                data: ob,
                beforeSend: function(objeto){
                
                },
                success: function(data)
                { 
                 
                 $("#tabla_resultado2").html(data);
            
                }
             });
}
  
