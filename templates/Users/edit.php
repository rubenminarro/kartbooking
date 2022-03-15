<main role="main" class="container">
	<div class="card text-white bg-secondary mb-2">
		<div class="card-header">
			<h4 class="float-left">Editar Usuario</h4>
			<?= $this->Html->link(__('<i class="fas fa-home"></i>'), ['action' => 'index'], ['class'=>'btn btn-outline-light float-right','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Volver a usuarios']); ?>
		</div>
	</div>
	<div class="row">
    <div class="col">
      <?= $this->Form->create($user,['class'=>'needs-validation mb-3','novalidate'=>true]) ?>
				<div class="form-group">
					<label>Usuario</label>
					<input value="<?= $user['username']?>" type="text" name="username" class="form-control" placeholder="Usuario" required>
					<div class="invalid-feedback">
						Por favor ingrese el usuario
					</div>
				</div>
				<div class="form-group">
					<label>Correo</label>
					<input value="<?= $user['email']?>" type="email" name="email" class="form-control" placeholder="Correo" required>
					<div class="invalid-feedback">
						Por favor ingrese el correo
					</div>
				</div>
				<div class="form-group">
					<label>Contraseña</label>
					<input value="<?= $user['password']?>" type="password" name="password" class="form-control" placeholder="Contraseña" required>
					<div class="invalid-feedback">
						Por favor ingrese la contraseña
					</div>
				</div>
				<div class="form-group">
					<label for="id_estado">Estado</label>
					<?= $this->Form->select(
							'id_estado',
							$estados,
							['class'=>'custom-select cambiar-estado','value'=>$user['id_estado']]
						);
					?>
					<div class="invalid-feedback">
						Por favor ingrese el estado
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