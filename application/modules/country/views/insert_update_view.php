<?php $data = $content['view_data'];

$datain['country_id'] = array(
    'name'  => 'country_id',
    'id'    => 'country_id',

    'type'  => 'hidden',
    'value'=>!empty($data['country_id'])?$data['country_id']:'',
);
$datain['country_code'] = array(
    'name'  => 'country_code',
    'id'    => 'country_code',

    'type'  => 'text',
    'value'=>!empty($data['country_code'])?$data['country_code']:'',
     'class' => 'form-control',
);
$datain['country_name'] = array(
    'name'  => 'country_name',
    'id'    => 'country_name',

    'type'  => 'text',
    'value'=>!empty($data['country_name'])?$data['country_name']:'',
    'class' => 'form-control',
);
?>

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-5">
        <div class="js-error"></div>
        <?php if (validation_errors()): ?>
            <div class="alert alert-error">
                <?php
                $errors = validation_errors();
                echo $errors;
                ?>
            </div>
        <?php endif; ?>

        <?php $attributes = array("class" => 'form-horizontal');
        echo form_open("country/country_insert",$attributes);?>


        <div class="form-group clearfix">
            <label class="col-sm-4 control-label" for="country_code">Country Code</label>
            <div class="col-sm-5">
                <?php echo form_input($datain['country_id']);?>
                <?php echo form_input($datain['country_code']);?>
            </div>
        </div><br>

        <div class="form-group clearfix">
            <label class="col-sm-4 control-label" for="country_name">Country Name</label>
            <div class="col-sm-5">
                <?php echo form_input($datain['country_name']);?>
            </div>
        </div><br>

        <div class="form-group">
            <div class="col-sm-offset-4 col-sm-5">
        <?php if(!$data){
                echo form_submit('submit', lang('country_submit_button'),'id="submit_button" class="btn btn-large btn-info"');
              }
              else{
                echo form_submit('submit', lang('country_update_submit_button'),'id="submit_button" class="btn btn-large btn-info"');
              }
        ?> </div>
        </div>
<?php echo form_close();?>


    </div>
</div>