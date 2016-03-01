

<script>
 $(document).ready(function() {
   datatable_url= "<?php echo base_url('business_unit/business_list')?>";
   
	} );	
</script>
<script src="<?php print base_url(); ?>assets/js/datatable.js"></script>	
 

  
  <a class="btn btn-success"  href="business_unit/business_insert_page/"><i class="glyphicon glyphicon-plus"></i> Add Business Unit</a>
   <br/><br/> 
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th>BU Name</th>
                <th>Description</th>
                <th>Tax ID</th>
                <th>Address1</th>
                <th>Address2</th>
                <th>City</th>
                <th>State Code</th>
				<th>Action</th>
            </tr>
			<tbody>
			</tbody>
        </thead>
    </table>
	