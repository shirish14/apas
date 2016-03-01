<!DOCTYPE html>
<html lang="en">
<?php
// checking for the header array and the data inside
if (isset($header) && is_array($header)) {
  $this->load->view('partials/header', $header);
}
else {
  $this->load->view('partials/header');
}
?>

<script src="<?php print base_url(); ?>assets/js/jquery-1.11.1.min.js"></script> 

<body>
<div id="wrapper">

  <!-- Navigation -->
  <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.html">Agal Solutions</a>
        <!--<img src="<?php echo base_url('assets/img/logo.png')?>"/>-->
    </div>
      <!-- STARt HEADER -->
      <?php $this->load->view('partials/menu'); ?>
      <!-- Sub Header -->
      <?php
      // conditional load the sub header. Not required on all pages.
      if (isset($subheader) && $subheader == true) {
          //$this->load->view('partials/sub_header');
      }
      ?>
      <!-- END HEADER -->
    <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
      <?php $this->load->view('partials/sidebar'); ?>

    <!-- /.navbar-collapse -->
  </nav>

  <div id="page-wrapper">

    <div class="container-fluid">

      <!-- Page Heading -->
      <div class="row">
        <div class="col-lg-12">
          <h1 class="page-header">
              <?php if(isset($header['page_title'])): ?>
              <?php echo $header['page_title']; ?>
              <?php endif; ?>
          </h1>
        </div>
      </div>

        <!-- BEGIN PAGE CONTAINER-->
        <div class="page-content">
            <div id="portlet-config" class="modal hide">
                <div class="modal-header">
                    <button data-dismiss="modal" class="close" type="button"></button>
                    <h3>Widget Settings</h3>
                </div>
                <div class="modal-body"> Widget settings form goes here </div>
            </div>
            <div class="clearfix"></div>
            <div class="content">
                <?php $message_array = get_message(); ?>
                <?php if($message_array): ?>
                    <div class="alert alert-<?php echo $message_array['type']; ?>" id="message">
                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                        <?php echo $message_array['message']; ?>
                    </div>
                <?php endif; ?>

                <?php
                 if (isset($content['view_name']) && is_array($content['view_data'])) 
				{
                   $this->load->view($content['view_name'], $content['view_data']);
                }
				 
                ?>
            </div>
        </div>
        <!-- END PAGE -->

    </div>
    <!-- /.container-fluid -->

  </div>
  <!-- /#page-wrapper -->

</div>
<!-- /#wrapper -->

<!-- jQuery -->


<!-- Bootstrap Core JavaScript -->
<script src="<?php print base_url(); ?>assets/js/bootstrap.min.js"></script>

<!-- Morris Charts JavaScript -->
<script src="<?php print base_url(); ?>assets/js/plugins/morris/raphael.min.js"></script>
<script src="<?php print base_url(); ?>assets/js/plugins/morris/morris.min.js"></script>
<script src="<?php print base_url(); ?>assets/js/plugins/morris/morris-data.js"></script>
<!-- data  table  -->


	
	
 <link href='<?php print base_url(); ?>assets/css/dataTables.bootstrap.min.css ' rel='stylesheet' type='text/css'>
 <link href='<?php print base_url(); ?>assets/css/responsive.bootstrap.min.css' rel='stylesheet' type='text/css'>
 <link href='<?php print base_url(); ?>assets/css/styles.css' rel='stylesheet' type='text/css'>

 <script src="<?php print base_url(); ?>assets/js/jquery.dataTables.min.js"></script>
 <script src="<?php print base_url(); ?>assets/js/dataTables.bootstrap.min.js"></script>
 <script src="<?php print base_url(); ?>assets/js/dataTables.responsive.min.js"></script>
 <script src="<?php print base_url(); ?>assets/js/responsive.bootstrap.min.js"></script>
  
 <!--Date picker   -->
 <link href='<?php print base_url(); ?>assets/css/bootstrap-datepicker.css ' rel='stylesheet' type='text/css'>
 <script src="<?php print base_url(); ?>assets/js/bootstrap-datepicker.js"></script>
  <!--Date picker  end  -->
</body>
</html>

