$('select.dropdown')
  .dropdown()
;
$(document).ready(function() {
    $('#example').DataTable( {
        dom: 'T<"clear">lfrtip'
    } );
} );