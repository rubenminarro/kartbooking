<main role="main" class="container">
	<div class="card text-white bg-secondary mb-2">
		<div class="card-header">
			<h4 class="float-left">Editar Horario</h4>
			<?= $this->Html->link(__('<i class="fas fa-home"></i>'), ['action' => 'index'], ['class'=>'btn btn-outline-light float-right','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Volver a horarios']); ?>
		</div>
	</div>
	<div class="row">
    <div class="col">
      <?= $this->Form->create($horario,['class'=>'needs-validation mb-3','novalidate'=>true]) ?>
				<div class="form-group">
					<label>Inicio</label>
					<input value="<?= $horario['inicio']?>" type="text" name="inicio" class="horarios form-control" placeholder="Horario de inicio" required>
					<div class="invalid-feedback">
						Por favor ingrese el horario de inicio
					</div>
				</div>
				<div class="form-group">
					<label>Fin</label>
					<input value="<?= $horario['fin']?>" type="text" name="fin" class="horarios form-control" placeholder="Fin del horario" required>
					<div class="invalid-feedback">
						Por favor ingrese el fin del horario
					</div>
				</div>
				<div class="form-group">
					<label>Cantidad</label>
					<input value="<?= $horario['cantidad']?>" type="text" name="cantidad" class="form-control" placeholder="Ingresa la cantidad de pilotos" required>
					<div class="invalid-feedback">
						Por favor ingrese la cantidad de pilotos
					</div>
				</div>
				<div class="form-group">
					<label for="id_estado">Estado</label>
					<?= $this->Form->select(
							'id_estado',
							$estados,
							['class'=>'custom-select cambiar-estado','value'=>$horario['id_estado']]
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
		$('.horarios').mask('00:00', {placeholder: "__:__"});
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