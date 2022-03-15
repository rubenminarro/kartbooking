<main role="main" class="container">
	<div class="card text-white bg-secondary mb-2">
		<div class="card-header">
			<h4 class="float-left">Editar Piloto</h4>
			<?= $this->Html->link(__('<i class="fas fa-home"></i>'), ['action' => 'index'], ['class'=>'btn btn-outline-light float-right','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Volver a pilotos']); ?>
		</div>
	</div>
	<div class="row">
    <div class="col">
      <?= $this->Form->create($piloto,['class'=>'needs-validation mb-3','novalidate'=>true]) ?>
				<div class="form-group">
					<label>Nombre</label>
					<input value="<?= $piloto['nombre']?>" type="text" name="nombre" class="form-control" placeholder="Nombre" required>
					<div class="invalid-feedback">
						Por favor ingrese el nombre
					</div>
				</div>
				<div class="form-group">
					<label>Apellido</label>
					<input value="<?= $piloto['apellido']?>" type="text" name="apellido" class="form-control" placeholder="Apellido" required>
					<div class="invalid-feedback">
						Por favor ingrese el apellido
					</div>
				</div>
				<div class="form-group">
					<label>Cédula de identidad</label>
					<input value="<?= $piloto['ci']?>" type="text" name="ci" class="form-control" placeholder="Cédula de identidad" required>
					<div class="invalid-feedback">
						Por favor ingrese la cédula de identidad
					</div>
				</div>
				<div class="form-group">
					<label>Correo</label>
					<input value="<?= $piloto['correo']?>" type="email" name="correo" class="form-control" placeholder="Correo" required>
					<div class="invalid-feedback">
						Por favor ingrese el correo
					</div>
				</div>
				<div class="form-group">
					<label>Teléfono</label>
					<input value="<?= $piloto['telefono']?>" type="number" name="telefono" class="telefono form-control" placeholder="Teléfono" required>
					<div class="invalid-feedback">
						Por favor ingrese el teléfono
					</div>
				</div>
				<?= $this->Form->button('Guardar',['class'=>'btn btn-primary']); ?>
      <?= $this->Form->end() ?>
    </div>
	</div>
</main>

<script type="text/javascript">
	
	$(document).ready(function() {
		$('[data-toggle="tooltip"]').tooltip();
  });

	(function() {
		'use strict';
		window.addEventListener('load', function() {
			// Fetch all the forms we want to apply custom Bootstrap validation styles to
			var forms = document.getElementsByClassName('needs-validation');
			// Loop over them and prevent submission
			var validation = Array.prototype.filter.call(forms, function(form) {
				form.addEventListener('submit', function(event) {
					if (form.checkValidity() === false) {
						event.preventDefault();
						event.stopPropagation();
					}
					form.classList.add('was-validated');
				}, false);
			});
		}, false);
	})();

</script>