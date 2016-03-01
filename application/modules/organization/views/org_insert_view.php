<?php $data = $content['view_data'];?>
<!DOCTYPE html>
<html>
<head>
<title>Add Organization</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<link href="<?php print base_url(); ?>assets/layout/styles/layout.css" rel="stylesheet" type="text/css" media="all">
<script src="<?php print base_url(); ?>assets/layout/scripts/jquery-1.11.1.min.js"></script> 
</head>
<body id="top">

<div class="wrapper row3">
  <div class="rounded">
    <main class="container clear"> 
      
      <div id="content" class="three_quarter_dt"> 
        
        
        <h1>Add Organization</h1>
        <div id="comments">
         
          <ul>
            <li>
              <article>
                <?php echo form_open("organization/org_save");?>
			   <?php 
			   if(($data)){
			   $datain['org_id'] = array(
                'name'  => 'org_id',
                'id'    => 'org_id',
				
                'type'  => 'hidden',
				'value'=>$data['org_id'],
               );
			   $datain['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
				
                'type'  => 'text',
				'value'=>$data['name'],
                        );
            $datain['org_code'] = array(
                'name'  => 'org_code',
                'id'    => 'org_code',
				
                'type'  => 'text',
				'value'=>$data['org_code'],
               );
			   $datain['business_unit_id'] = array(
                'name'  => 'business_unit_id',
                'id'    => 'business_unit_id',
				
                'type'  => 'text',
				'value'=>$data['business_unit_id'],
                        );
            $datain['tax_id'] = array(
                'name'  => 'tax_id',
                'id'    => 'tax_id',
				
                'type'  => 'text',
				'value'=>$data['tax_id'],
               );
			   $datain['address1'] = array(
                'name'  => 'address1',
                'id'    => 'address1',
				
                'type'  => 'text',
				'value'=>$data['address1'],
                        );
            $datain['address2'] = array(
                'name'  => 'address2',
                'id'    => 'address2',
				
                'type'  => 'text',
				'value'=>$data['address2'],
               );$datain['city'] = array(
                'name'  => 'city',
                'id'    => 'city',
				
                'type'  => 'text',
				'value'=>$data['city'],
               );
			   $datain['state_code'] = array(
                'name'  => 'state_code',
                'id'    => 'state_code',
				
                'type'  => 'text',
				'value'=>$data['state_code'],
               );
			   $datain['zip'] = array(
                'name'  => 'zip',
                'id'    => 'zip',
				
                'type'  => 'text',
				'value'=>$data['zip'],
                        );
				$datain['county_code'] = array(
                'name'  => 'county_code',
                'id'    => 'county_code',
				
                'type'  => 'text',
				'value'=>$data['county_code'],
               );
			   $datain['description'] = array(
                'name'  => 'description',
                'id'    => 'description',
				'cols'  =>   25,
				'rows'  =>    5,
                'type'  => 'text',
				'value'=>$data['description'],
                        );}
			   else
			   {
			     $datain['org_id'] = array(
                'name'  => 'org_id',
                'id'    => 'org_id',
				
                'type'  => 'hidden',
				
               );
			   $datain['name'] = array(
                'name'  => 'name',
                'id'    => 'name',
				
                'type'  => 'text',
				
                        );
            $datain['org_code'] = array(
                'name'  => 'org_code',
                'id'    => 'org_code',
				
                'type'  => 'text',
				
               );
			   $datain['business_unit_id'] = array(
                'name'  => 'business_unit_id',
                'id'    => 'business_unit_id',
				
                'type'  => 'text',
				
                        );
            $datain['tax_id'] = array(
                'name'  => 'tax_id',
                'id'    => 'tax_id',
				
                'type'  => 'text',
				
               );
			   $datain['address1'] = array(
                'name'  => 'address1',
                'id'    => 'address1',
				
                'type'  => 'text',
				
                        );
            $datain['address2'] = array(
                'name'  => 'address2',
                'id'    => 'address2',
				
                'type'  => 'text',
				
               );
			$datain['city'] = array(
                'name'  => 'city',
                'id'    => 'city',
				
                'type'  => 'text',
				
               );
			   $datain['state_code'] = array(
                'name'  => 'state_code',
                'id'    => 'state_code',
				
                'type'  => 'text',
				
               );
			   $datain['zip'] = array(
                'name'  => 'zip',
                'id'    => 'zip',
				
                'type'  => 'text',
				
                        );
				$datain['county_code'] = array(
                'name'  => 'county_code',
                'id'    => 'county_code',
				
                'type'  => 'text',
				
               );
			   $datain['description'] = array(
                'name'  => 'description',
                'id'    => 'description',
				'cols'  =>   25,
				'rows'  =>5,
                'type'  => 'text',
				
                        );}
?>
            
            <div class="one_quarter first">
              <label for="email">Organization Name <span>*</span></label>
              <?php echo form_input($datain['name']);?>
            </div>
         <div class="one_quarter ">
              <label for="name">Organization Code <span>*</span></label>
              <?php echo form_input($datain['org_code']);?>
            </div>
			<div class="one_quarter">
              <label for="name">Business Unit Name<span>*</span></label>
<select name="business_unit_id" id="business_unit_id" >
<?php
foreach($groups as $row)
{
	echo '<option value="'.$row->business_unit_id.'">'.$row->name.'</option>';
}
?>
</select>
            </div>
					<?php echo form_input($datain['org_id']);?>
            <div class="one_quarter ">
              <label for="email">Tax ID</label>
              <?php echo form_input($datain['tax_id']);?>
            </div>
			 <div class="one_quarter first">
              <label for="url">Address1 <span>*</span></label>
              <?php echo form_input($datain['address1']);?>
            </div>
			 <div class="one_quarter">
              <label for="url">Address2 </label>
              <?php echo form_input($datain['address2']);?>
            </div>
            <div class="one_quarter  ">
              <label for="url">City <span>*</span></label>
              <?php echo form_input($datain['city']);?>
            </div>
			
			<div class="one_quarter ">
              <label for="name">State Code <span>*</span></label>
              <?php echo form_input($datain['state_code']);?>
            </div>
            
            <div class="one_quarter first">
              <label for="url">Zip  <span>*</span></label>
              <?php echo form_input($datain['zip']);?>
            </div>
			<div class="one_quarter " >
              <label for="email">County Code </label>
              <?php echo form_input($datain['county_code']);?>
            </div>
            <div class="block clear">
              <label for="comment">Description </label>
              <?php echo form_textarea($datain['description']); ?> 
            </div>
			
            <div  class="clear"></div>
             <div  class="center clear">
              <?php if(!$data){?>
  <p> <?php echo form_submit('submit', 'Insert');?> </p>
  <?php }else{?>
  <p><?php echo form_submit('submit', 'Update');?></p>
  <?php }?>
            </div>
          <?php echo form_close();?>
              </article>
            </li>
            
            
          </ul>
         
         
        </div>
      
      </div>
      
      <!-- / main body -->
      <div class="clear"></div>
    </main>
  </div>
</div>


<!-- JAVASCRIPTS --> 
<script src="<?php print base_url(); ?>assets/layout/scripts/jquery.min.js"></script> 
<script src="<?php print base_url(); ?>assets/layout/scripts/jquery.fitvids.min.js"></script> 
<script src="<?php print base_url(); ?>assets/layout/scripts/jquery.mobilemenu.js"></script>
</body>
</html>
