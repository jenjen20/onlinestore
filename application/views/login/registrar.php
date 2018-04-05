<!DOCTYPE html>
<html>
<head>
	<title><?php echo $titulo; ?></title>
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
		<div class="card">
			<h4 class="card-header"><?php echo $titulo; ?></h4>
			<div class="card-body">
				<?php echo form_open('registro/index', array('class' => 'form-horizontal', 'data-toggle' => 'validator')); ?>
				<?php echo form_hidden('id', $id); ?>
				<fieldset>
					<div class="form-group">
						<!-- <?php echo form_error('nombre'); ?> -->
					</div>
					<div class="form-group">
						<label for="nombre">Nombres:</label>
						<div class="controls">
							<?php echo form_input($nombre); ?>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="apellidos">Apellidos:</label>
						<div class="controls">
							<?php echo form_input($apellidos); ?>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="fecnacimiento">Fec. Nacimiento:</label>
						<div class="controls">
							<?php echo form_input($cumpleanios); ?>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="email">Email:</label>
						<div class="controls">
							<?php echo form_input($email); ?>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-group">
						<label for="passw">Contraseña:</label>
						<div class="controls">
							<?php echo form_input($password); ?>
							<div class="help-block with-errors"></div>
						</div>
					</div>
					<div class="form-group">
						<div class="controls">
							<button class="btn btn-success">Registrar</button>
						</div>
					</div>
				</fieldset>	
				<?php echo form_close(); ?>		
			</div>
		</div>

	</div>
</body>
</html>