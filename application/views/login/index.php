<!DOCTYPE html>
<html>
	<head>
    	<title>Log In</title>
    	<meta charset="utf-8">      <!-- Bootstrap -->
    	<link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>extra/bootstrap/css/bootstrap.min.css">
    	<link rel="stylesheet" href="<?php echo base_url(); ?>extra/bootstrap/css/bootstrap-theme.min.css">
      	<link rel="stylesheet" href="<?php echo base_url(); ?>extra/css/jquery.dataTables.min.css">
      	<link rel="stylesheet" href="<?php echo base_url(); ?>extra/css/login-styles.css">
      	<script src="<?php echo base_url(); ?>extra/js/jquery-1.11.3.min.js"></script>
      	<script src="<?php echo base_url(); ?>extra/bootstrap/js/bootstrap.min.js"></script>
      	<script src="<?php echo base_url(); ?>extra/js/validator.min.js"></script>

  	</head>
  
  	<body>
 		<div class="container">
	        <div class="card card-container">
				<a href="<?php echo base_url('registro/index'); ?>">Registro de usuario</a>
	            <img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
	            <p id="profile-name" class="profile-name-card"></p>
	            <!-- <form class="form-signin"> -->
	            <?php echo form_open('autorizar/index', array('class' => 'form-signin', 'data-toggle' => 'validator')); ?>
	                <span id="reauth-email" class="reauth-email"></span>
	                <!-- <input type="email" id="inputEmail" class="form-control" placeholder="Direccion de Email" required autofocus> -->
	                <?php echo form_input($email); ?>
	                <div class="help-block with-errors"></div>
	                <!-- <input type="password" id="inputPassword" class="form-control" placeholder="Password" required> -->
	               <?php echo form_input($password); ?>
	               <div class="help-block with-errors"></div>
	               <button class="btn btn-lg btn-primary btn-block btn-signin" type="submit" id="btnEntrar">Entrar</button>
	            <!-- /form -->
	            <?php echo form_close(); ?>	
	            <span><?php echo $msg; ?></span>
	            <a href="#" class="forgot-password">
	                Olvidaste tu Password?
	            </a>
	        </div><!-- /card-container -->
    	</div><!-- /container -->

	</body>
 </html>