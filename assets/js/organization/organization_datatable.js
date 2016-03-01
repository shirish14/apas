       

	  var dataTable;
$(document).ready(function() {
     
        
        dataTable = $('#example2').DataTable( {
		    
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": base_url+'organization/org_list',
            "type": "POST",
			
			error: function(){  // error handling
							$(".table-grid-error").html("");
							$("#table").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#table-grid_processing").css("display","none");
							
						}
        },

        //Set column definition initialisation properties.
        "columnDefs": [
        { 
          "targets": [ -1 ], //last column
          "orderable": false, //set not orderable
        },
        ],
	} );
   
});
  

