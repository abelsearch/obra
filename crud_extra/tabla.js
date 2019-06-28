$(document).ready(function(){
  $('#data_table').Tabledit({
    deleteButton: false,
    editButton: false,      
    columns: {
      identifier: [0, 'id'],                    
      editable: [[1, 'cantidad_real'], [2, 'precio_real'], [3, 'importe_real']]
    },
    hideIdentifier: true,
    url: 'live_edit.php'    
  });
});