<?php $data = $content['view_data'];?>

 <link href='https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css ' rel='stylesheet' type='text/css'>
 <link href='https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css' rel='stylesheet' type='text/css'>
 <script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script>
<script src="<?php print base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
<div class="table-responsive">
                 <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

 
        <thead>
            <tr>
                
                <th>Country Code</th>
                <th>Country Name</th>
             	<th>Action</th>
            </tr>
			<tbody>
			</tbody>
        </thead>
    </table>
				
</div>
  <script type="text/javascript">
	  var dataTable;
$(document).ready(function() {
     
        alert('hi');
        dataTable = $('#example').DataTable( {
		    
        "processing": true, //Feature control the processing indicator.
        "serverSide": true, //Feature control DataTables' server-side processing mode.
        
        // Load data for the table's content from an Ajax source
        "ajax": {
            "url": "<?php echo site_url('country/country_list')?>",
            "type": "POST",
			
			error: function(){  // error handling
			
							$(".table-grid-error").html("");
							$("#table").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
							$("#table-grid_processing").css("display","none");
							
						},
						success: function(data){  // error handling
						 alert('hi');
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
  


} );
</script>