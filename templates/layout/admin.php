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
      'base',
      'litepicker',
      'all.min',
      'datatables.min',
    ]) 
  ?>

  <?= $this->Html->script([
      'jquery-3.2.1.min',
      'bootstrap.min',
      'bootstrap.bundle.min',
      'popper.min',
      'moment.min',
      'litepicker',
      'datatables.min',
      'jquery.mask',
    ]) 
  ?>

  <?= $this->fetch('meta') ?>
  <?= $this->fetch('css') ?>
  <?= $this->fetch('script') ?>
</head>
<body>


  <nav class="navbar navbar-expand-lg navbar-dark mb-4" style="background-color: #fd0003;">
    
    <a class="navbar-brand" href="#" onclick="return false;">
      <?= $this->Html->image('logo_super_kart.png', ['alt' => 'Super Karts', 'class'=>'img-fluid']) ?>
    </a>
      
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav mr-auto">
        <li <?= ($this->request->getParam('controller') == 'Reservas') ? 'class="nav-item active"' : 'nav-item' ?>>
          <?= $this->Html->link('Reservas',['controller'=>'Reservas', 'action' => 'index'],['class'=>'nav-link']);?>
        </li>
        <li <?= ($this->request->getParam('controller') == 'Pilotos') ? 'class="nav-item active"' : 'nav-item' ?>>
          <?= $this->Html->link('Pilotos',['controller'=>'Pilotos', 'action' => 'index'],['class'=>'nav-link']);?>
        </li>
        <li <?= ($this->request->getParam('controller') == 'Horarios') ? 'class="nav-item active"' : 'nav-item' ?>>
          <?= $this->Html->link('Horarios',['controller'=>'Horarios', 'action' => 'index'],['class'=>'nav-link']);?>
        </li>
        <li <?= ($this->request->getParam('controller') == 'Users') ? 'class="nav-item active"' : 'nav-item' ?>>
          <?= $this->Html->link('Usuarios',['controller'=>'Users', 'action' => 'index'],['class'=>'nav-link']);?>
        </li>
        <li <?= ($this->request->getParam('controller') == 'Estados') ? 'class="nav-item active"' : 'nav-item' ?>>
          <?= $this->Html->link('Estados',['controller'=>'Estados', 'action' => 'index'],['class'=>'nav-link']);?>
        </li>
        <li <?= ($this->request->getParam('controller') == 'Karts') ? 'class="nav-item active"' : 'nav-item' ?>>
          <?= $this->Html->link('Karts',['controller'=>'Karts', 'action' => 'index'],['class'=>'nav-link']);?>
        </li>
        <li class="nav-item">
          <?= $this->Html->link('Cerrar sesión',['controller'=>'Users', 'action'=>'logout'],['class'=>'nav-link']);?>
        </li>
      </ul>
    </div>

    <a class="float-right" href="#" onclick="return false;">
      <?= $this->Html->image('logo_reserva.png', ['alt' => 'Reserva de Kartings', 'class'=>'img-fluid', 'style'=>'float:right;']) ?>
    </a>

  </nav>

  <?= $this->fetch('content') ?>

  <footer class="footer" style="background-color: #fd0003;">
    <div class="container text-center">
      <span class="text-muted" style="color: white !important;">Copyright &copy; <?= date("Y"); ?> <a href="http://seintos.com" style="color: white;">Seintos</a></span>
    </div>
  </footer>

</body>

</html>