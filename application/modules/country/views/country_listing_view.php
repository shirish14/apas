


<script>
 $(document).ready(function() {
   datatable_url= "<?php echo base_url('country/country_list')?>";
	} );	
</script>
<script src="<?php print base_url(); ?>assets/js/datatable.js"></script>	 	
	
  <a class="btn btn-success"  href="country/country_insert_page/"><i class="glyphicon glyphicon-plus"></i> Add Country</a>
   <br/><br/>
  
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

 
        <thead>
            <tr>
                
                <th>code</th>
                <th>Name</th>
                <th>Action</th>
            </tr>
			<tbody>
			</tbody>
        </thead>
    </table>
	
