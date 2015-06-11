<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title>X lol </title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- css -->
        <link rel="stylesheet" href="<?php echo base_url('assets/css/application.css') ?>">
        <link rel="stylesheet" href="<?php echo base_url('assets/css/lol-css.css') ?>">
        <script src="<?php echo base_url('assets/js/vendor/modernizr-2.6.2.min.js') ?>"></script>
    </head>
<body>
  

    <?php if(isset($errors)) { ?>
        <div class="alert alert-danger">
        <?php foreach ($errors as $error) { ?>
          <?= $error; ?>
        <?php } ?>
        </div>
      <?php } ?>

      <?php if($this->session->userdata('success')): ?>
        <div class="alert alert-success">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php echo $this->session->userdata('success'); ?>
          <?php $this->session->unset_userdata('success'); ?>
        </div>
      <?php endif; ?>

      <?php if($this->session->userdata('error')): ?>
        <div class="alert alert-danger">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
          <?php echo $this->session->userdata('error'); ?>
          <?php $this->session->unset_userdata('error'); ?>
        </div>
      <?php endif; ?>



    <?php $this->load->view($content); ?>

            <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script>window.jQuery  || document.write('<script src="assets/js/vendor/jquery-1.10.2.min.js"><\/script>')</script>
        <script src="<?php echo base_url('assets/js/plugins.js' ) ?>"></script>
        <script src="<?php echo base_url('assets/js/vendor/bootstrap.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/materialize.min.js') ?>"></script>
        <script src="<?php echo base_url('assets/js/main.js') ?>"></script>


  </body>
</html>