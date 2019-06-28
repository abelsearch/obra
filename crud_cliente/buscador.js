 $(document).ready(function() {
    $('#example').dataTable({
      "iDisplayLength": 5,
      "ordering": false,
      //"searching": true,
      "paging": false,
      "ordering": false,
      "info": false
    }); 
     $("#search").click(function(){
    document.getElementById("example").focus();
  });
  })