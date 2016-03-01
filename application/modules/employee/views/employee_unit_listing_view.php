

<script>
 $(document).ready(function() {
   datatable_url= "<?php echo base_url('employee/employee_list')?>";
   
	} );	
</script>
<script src="<?php print base_url(); ?>assets/js/datatable.js"></script>	
 

  
  <a class="btn btn-success"  href="employee/employee_insert_page/"><i class="glyphicon glyphicon-plus"></i> Add Employee</a>
   <br/><br/> 
    <table id="example" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">
        <thead>
            <tr>
                
                <th>First Name</th>
                <th>Last Name</th>
                <th>Gender</th>
                <th>Date Of Birth</th>
                <th>Email Id</th>
                <th>Management Level</th>
				<th>Management Id</th>
				<th>Action</th>
            </tr>
			<tbody>
			</tbody>
        </thead>
    </table>
	