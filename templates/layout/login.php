<!DOCTYPE html>
<html lang="es">
<head>
  <?= $this->Html->charset(); ?>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>

  <meta content="Somos un equipo que brinda servicios de entrenamiento, diversión y aprendizaje, mediante alquileres de karting para todo publico en el kartodromo parque de la velocidad ciudad de Luque" name="description">
  
  <meta content="karting paraguay, karting luque, alquileres de karting, karting entrenamiento" name="keywords">

  <?= $this->Html->meta('icon', 'img/favicon.png',['type'=>'image/png']); ?>
  
  <?= $this->Html->css([
      'bootstrap',
			'signin'
    ]) 
  ?>

  <?= $this->Html->script([
      'jquery-3.2.1.min',
      'bootstrap.min',
      'bootstrap.bundle.min'
    ]) 
  ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>
<body class="text-center">
	<?= $this->fetch('content') ?>
</body>