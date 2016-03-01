<?php
        $data = $content['view_data'];
        echo form_open("business_unit/business_insert");
			   
         $datain['business_unit_id'] = array(
        'name'  => 'business_unit_id',
        'id'    => 'business_unit_id',
        'type'  => 'hidden',
        'value'=>!empty($data['business_unit_id'])?$data['business_unit_id']:'',
        'class' => 'form-control'

         );
        $datain['name'] = array(
        'name'  => 'name',
        'id'    => 'name',
        'type'  => 'text',
         'value'=>!empty($data['name'])?$data['name']:'',
            'class' => 'form-control'
         );
        $datain['description'] = array(
        'name'  => 'description',
        'id'    => 'description',
        'type'  => 'text',
        'value'=>!empty($data['description'])?$data['description']:'',
            'class' => 'form-control'
        );
        $datain['tax_id'] = array(
        'name'  => 'tax_id',
        'id'    => 'tax_id',
        'type'  => 'text',
        'value'=>!empty($data['tax_id'])?$data['tax_id']:'',
            'class' => 'form-control'
        );
        $datain['bu_code'] = array(
        'name'  => 'bu_code',
        'id'    => 'bu_code',
        'type'  => 'text',
        'value'=>!empty($data['bu_code'])?$data['bu_code']:'',
            'class' => 'form-control'
        );
        $datain['address1'] = array(
        'name'  => 'address1',
        'id'    => 'address1',
        'type'  => 'text',
        'value'=>!empty($data['address1'])?$data['address1']:'',
            'class' => 'form-control'
        );
        $datain['address2'] = array(
        'name'  => 'address2',
        'id'    => 'address2',
        'type'  => 'text',
        'value'=>!empty($data['address2'])?$data['address2']:'',
            'class' => 'form-control'
        );
        $datain['city'] = array(
        'name'  => 'city',
        'id'    => 'city',
        'type'  => 'text',
        'value'=>!empty($data['city'])?$data['city']:'',
            'class' => 'form-control'
        );
        $datain['state_code'] = array(
        'name'  => 'state_code',
        'id'    => 'state_code',
        'type'  => 'text',
        'value'=>!empty($data['state_code'])?$data['state_code']:'',
            'class' => 'form-control'
        );
        $datain['zip'] = array(
        'name'  => 'zip',
        'id'    => 'zip',
        'type'  => 'text',
        'value'=>!empty($data['zip'])?$data['zip']:'',
            'class' => 'form-control'
        );
        $datain['county_code'] = array(
        'name'  => 'county_code',
        'id'    => 'county_code',
        'type'  => 'text',
        'value'=>!empty($data['county_code'])?$data['county_code']:'',
            'class' => 'form-control'
         );
        $datain['country'] = array(
        'name'  => 'country',
        'id'    => 'country',
        'type'  => 'text',
        'value'=>!empty($data['country'])?$data['country']:'',
            'class' => 'form-control'
        );
?>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-5">
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">Name</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['business_unit_id']);?>
                    <?php echo form_input($datain['name']);?>
                </div>
            </div><br>
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">Description</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['description']);?>
                </div>
            </div><br>
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">Code</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['bu_code']);?>
                </div>
            </div><br>
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">Tax Id</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['tax_id']);?>
                </div>
            </div><br>
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">Address1</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['address1']);?>
                </div>
            </div><br>
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">Address2</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['address2']);?>
                </div>
            </div><br>

            </div>
        <div class="col-xs-12 col-sm-6 col-md-5">
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">City</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['city']);?>
                </div>
            </div><br>
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">State Code</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['state_code']);?>
                </div>
            </div><br>
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">Zip</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['zip']);?>
                </div>
            </div><br>
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">Country Code</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['county_code']);?>
                </div>
            </div><br>
            <div class="form-group clearfix">
                <label class="col-sm-4 control-label" for="country_code">Country</label>
                <div class="col-sm-5">
                    <?php echo form_input($datain['country']);?>
                </div>
            </div><br>
        </div>
    </div>
    <div class="row">
        <div class="col-xs-12 col-sm-6 col-md-5">&nbsp;</div>
        <div class="col-xs-12 col-sm-6 col-md-5">
        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-5">
                <?php if(!$data){
                    echo form_submit('submit', lang('business_unit_submit_button'),'class="btn btn-large btn-info"');
                }else{
                    echo form_submit('submit', lang('business_unit_update_submit_button'),'class="btn btn-large btn-info"');
                }
                ?>
            </div>
        </div>
    </div>
				
</div>
<?php  echo form_close();?>