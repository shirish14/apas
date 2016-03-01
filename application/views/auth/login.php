<!DOCTYPE html>
<html lang="en">
<?php $this->load->view('partials/header', array('page_title' => 'Sign in - Agal Psychometric Assessment System')); ?>
<link href='<?php print base_url(); ?>assets/css/styles.css' rel='stylesheet' type='text/css'>
<body class="error-body no-top">

<div class="row login-container">
  <div class="col-md-4 col-sm-4 col-xs-4 col-md-offset-4 col-sm-offset-4 col-xs-offset-4">
    <div class="grid simple">
      <div class="grid-title no-border">
        <div class="center"><a href="<?php print base_url(); ?>"><img src="<?php print base_url(); ?>assets/img/logo.png" class="logo" /></a></div>
      </div>

      <div class="grid-body no-border" id="form_traditional_validation">
        <?php echo form_open('auth/validate','class="form form-signin"'); ?>
        <p>Enter your username and password to login</p>
        <br>
        <?php if ($message) : ?>
          <div id="infoMessage" class="alert alert-error"><?php echo $message;?></div>
        <?php endif; ?>

        <div class="row-fluid">
          <div class="row form-row">
            <div class="input-append col-md-11 col-sm-11 col-xs-11 info">
              <input type="text" class="input-block-level input-xlarge form-control" placeholder="Email address" name="identity" id="identity" value="<?php print $identity['value'];?>" autocomplete="off"/>
              <span class="add-on"><span class="arrow"></span><i class="fa fa-align-justify"></i> </span>
            </div>
          </div>
          <div class="row form-row">
            <div class="input-append col-md-11 col-sm-11 col-xs-11 info">
              <input type="password" class="input-block-level form-control" placeholder="Password" name="password" />
              <span class="add-on"><span class="arrow"></span><i class="fa fa-lock"></i> </span>
            </div>
          </div>
        </div><br />

        <div class="form-actions">
          <div class="pull-right">
            <button class="btn btn-info btn-medium pull-right" type="submit" name="submit">Submit</button>
          </div>
          <div class="check-info pull-left"><?php print anchor('auth/forgot_password', 'Forgot Password?'); ?>
          </div>
          <?php echo form_close();?>
        </div>

      </div>
    </div>
  </div>


  <!-- END CONTAINER -->

  <!--[if IE]>

</body>
</html>


