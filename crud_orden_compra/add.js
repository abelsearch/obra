$(document).ready(function(){

// 
$("body").one("click",".edit",function(event){ 
   $('#stock').Tabledit({
        deleteButton: false,
        editButton: true,          
        columns: {
          identifier: [0, 'id'],                    
          editable: [[4, 'cantidad']]
        },
        hideIdentifier: true,
        url: 'crud_orden_compra/editar.php'        
    });  
   e.preventDefault(); // cancel click
    });

//
 




}); 