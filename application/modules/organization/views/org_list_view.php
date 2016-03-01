<?php $data = $content['view_data'];?>
<!DOCTYPE html>
<html>
    <head>
       
	 
	<script src="<?php print base_url(); ?>assets/js/jquery-1.11.1.min.js"></script>
<script src="<?php print base_url(); ?>assets/js/delete.js"></script>	
	<script src="<?php print base_url(); ?>assets/js/organization/organization_datatable.js"></script>	 
 <link href='https://cdn.datatables.net/1.10.10/css/dataTables.bootstrap.min.css ' rel='stylesheet' type='text/css'>
 <link href='https://cdn.datatables.net/responsive/2.0.0/css/responsive.bootstrap.min.css' rel='stylesheet' type='text/css'>
 
 <script src="https://cdn.datatables.net/1.10.10/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/1.10.10/js/dataTables.bootstrap.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.0.0/js/dataTables.responsive.min.js"></script>
 <script src="https://cdn.datatables.net/responsive/2.0.0/js/responsive.bootstrap.min.js"></script>
 
 

    </head>
    <body >
  
  <a class="btn btn-success"  href="<?PHP echo base_url();?>organization/org_insert"><i class="glyphicon glyphicon-plus"></i> Add Organization</a>
   <br/><br/>
    <table id="example2" class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%">

 
        <thead>
            <tr>
                
                <th>Organization Name</th>
                <th>Description</th>
                <th>Organization Code</th>
                <th>Tax ID</th>
                <th>Address1</th>
                
                <th>City</th>
                <th>State Code</th>
				
				<th>County Code</th>
				<th>Action</th>
            </tr>
			<tbody>
			</tbody>
        </thead>
    </table>
	</body>
</html>
