<!DOCTYPE html>
<html lang="es">
<head>
  <?= $this->Html->charset(); ?>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title><?= $title; ?></title>

  <meta content="Somos un equipo que brinda servicios de entrenamiento, diversión y aprendizaje, mediante alquileres de karting para todo publico en el kartodromo parque de la velocidad ciudad de Luque" name="description">
  
  <meta content="karting paraguay, karting luque, alquileres de karting, karting entrenamiento" name="keywords">

  <link href="img/favicon.png" rel="icon">
  
  
  <?= $this->Html->css([
      'bootstrap',
      'base',
      'litepicker',
      'all.min'
    ]) 
  ?>

  <?= $this->Html->script([
      'jquery-3.2.1.min',
      'bootstrap.min',
      'bootstrap.bundle.min',
      'popper.min',
      'moment.min',
      'litepicker'
    ]) 
  ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>
<body>

  <nav class="navbar navbar-expand-lg navbar-light fixed-top" style="background-color: #000;display: flex;
  justify-content: space-between;">
    
    <a class="navbar-brand" href="#" onclick="return false;">
      <?= $this->Html->image('logo_super_kart.png', ['alt' => 'Super Karts', 'class'=>'img-fluid']) ?>
    </a>

    <a class="float-right" href="#" onclick="return false;">
      <?= $this->Html->image('logo_reserva.png', ['alt' => 'Reserva de Kartings', 'class'=>'img-fluid', 'style'=>'float:right;']) ?>
    </a>

  </nav>

  <?= $this->fetch('content') ?>

  <footer class="footer" style="background-color: #000;">
    <div class="container text-center">
      <span class="text-muted" style="color: white !important;">Copyright &copy; <?php echo date("Y"); ?> <a href="http://seintos.com" style="color: white;">Seintos </a></span>
    </div>
  </footer>

</body>

</html>