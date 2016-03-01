<?php $data = $content['view_data'];?>
<script src="<?php print base_url(); ?>assets/js/employee/employee_dependent_dropdown.js"></script>
<div class="table-responsive">
               <?php echo form_open("employee/employee_insert");?>
			   <?php
				$datain['employee_id'] = array(
                'name'  => 'employee_id',
                'id'    => 'employee_id',
				'type'  => 'hidden',
				'value'=>!empty($data['employee_id'])?$data['employee_id']:'',
				
				 );
			    $datain['first_name'] = array(
                'name'  => 'first_name',
                'id'    => 'first_name',
				'type'  => 'text',
				 'value'=>!empty($data['first_name'])?$data['first_name']:'',
				 );
                $datain['last_name'] = array(
                'name'  => 'last_name',
                'id'    => 'last_name',
				'type'  => 'text',
				'value'=>!empty($data['last_name'])?$data['last_name']:'',
				);
			    $datain['middle_name'] = array(
                'name'  => 'middle_name',
                'id'    => 'middle_name',
				'type'  => 'text',
				'value'=>!empty($data['middle_name'])?$data['middle_name']:'',
				);
				$datain['gender'] = array(
                'name'  => 'gender',
                'id'    => 'gender',
				'type'  => 'text',
				'value'=>!empty($data['gender'])?$data['gender']:'',
				);
				$datain['date_of_birth'] = array(
                'name'  => 'date_of_birth',
                'id'    => 'date_of_birth',
				'type'  => 'text',
				'value'=>!empty($data['date_of_birth'])?$data['date_of_birth']:'',
				);
				$datain['emp_no'] = array(
                'name'  => 'emp_no',
                'id'    => 'emp_no',
				'type'  => 'text',
				'value'=>!empty($data['emp_no'])?$data['emp_no']:'',
				);
				$datain['email'] = array(
                'name'  => 'email',
                'id'    => 'email',
				'type'  => 'text',
				'value'=>!empty($data['email'])?$data['email']:'',
				);
				$datain['password'] = array(
                'name'  => 'password',
                'id'    => 'password',
				'type'  => 'text',
				'value'=>!empty($data['password'])?$data['password']:'',
				);
				$datain['management_level'] = array(
                'name'  => 'management_level',
                'id'    => 'management_level',
				'type'  => 'text',
				'value'=>!empty($data['management_level'])?$data['management_level']:'',
				);
				$datain['manager_id'] = array(
                'name'  => 'manager_id',
                'id'    => 'manager_id',
				'type'  => 'text',
				'value'=>!empty($data['manager_id'])?$data['manager_id']:'',
				 );
			/*	$datain['organization_id'] = array(
                'name'  => 'organization_id',
                'id'    => 'organization_id',
				'type'  => 'text',
				'value'=>!empty($data['organization_id'])?$data['organization_id']:'',
				);*/
				/*$datain['business_unit_id'] = array(
                'name'  => 'business_unit_id',
                'id'    => 'business_unit_id',
				'type'  => 'text',
				'value'=>!empty($data['business_unit_id'])?$data['business_unit_id']:'',
				);*/
				$datain['access'] = array(
                'name'  => 'access',
                'id'    => 'access',
				'type'  => 'text',
				'value'=>!empty($data['access'])?$data['access']:'',
				);
				
				$datain['confirm_password'] = array(
                'name'  => 'confirm_password',
                'id'    => 'confirm_password',
				'type'  => 'text',
				
				);
				
			
			
			
			  
?>

 <p>
    
    <?php echo form_input($datain['employee_id']);?>
  </p>

  <p>
    <?php echo lang('employee_first_name_label', 'first_name');?>
    <?php echo form_input($datain['first_name']);?>
  </p>

  <p>
    <?php echo lang('employee_last_name_label', 'last_name');?>
    <?php echo form_input($datain['last_name']);?>
  </p>
   <p>
    <?php echo lang('employee_middle_name_label', 'middle_name');?>
    <?php echo form_input($datain['middle_name']);?>
  </p>
  <p>
    <?php echo lang('employee_gender_label', 'gender');?>
    <?php echo form_input($datain['gender']);?>
  </p>
  <p>
    <?php echo lang('employee_date_of_birth_label', 'date_of_birth');?>
    <?php echo form_input($datain['date_of_birth']);?>
  </p>
  <p>
    <?php echo lang('employee_emp_no_label', 'emp_no');?>
    <?php echo form_input($datain['emp_no']);?>
  </p>
  <p>
    <?php echo lang('employee_email_label', 'email');?>
    <?php echo form_input($datain['email']);?>
  </p>
  <p>
    <?php echo lang('employee_password_label', 'password');?>
    <?php echo form_input($datain['password']);?>
  </p>
   <p>
    <?php echo lang('employee_confirm_password_label', 'confirm_password');?>
    <?php echo form_input($datain['confirm_password']);?>
  </p>
  <p>
    <?php echo lang('employee_management_level_label', 'management_level');?>
    <?php echo form_input($datain['management_level']);?>
  </p>
  <p>
    <?php echo lang('employee_manager_id_label', 'manager_id');?>
    <?php echo form_input($datain['manager_id']);?>
  </p>
  
  
  <p>
    <?php echo lang('employee_access_label', 'access');?>
    <?php echo form_input($datain['access']);?>
  </p>

 
 <p>
 
 


 
				  
 </p>
 <p>
    <?php echo lang('employee_business_unit_id_label', 'business_unit_id');?>
   <?php echo form_dropdown('business_unit_id',$bu_id,$selected=!empty($data['business_unit_id'])?$data['business_unit_id']:'','id="business_unit_id"');?>
  </p>
 <p>
    <?php echo lang('employee_organization_id_label', 'organization_id');?>
	  <div id="org_div_id"></div>
  <?php echo form_dropdown('organization_id',$org_id,$selected=!empty($data['organization_id'])?$data['organization_id']:'','id="organization_id"'); ?>
 
  </p>
 
 
 
 

 
 
<?php if(!$data){?>
  <p> <?php echo form_submit('submit', lang('employee_submit_button'));?> </p>
<?php }else{?>
<p><?php echo form_submit('submit', lang('employee_update_submit_button'));?></p>
<?php }?>
<?php echo form_close();?>
</div>

	


