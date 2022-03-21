<main role="main" class="container">
	<div class="card text-white bg-secondary mb-2">
		<div class="card-header">
			<h4 class="float-left">Editar Estado</h4>
			<?= $this->Html->link(__('<i class="fas fa-home"></i>'), ['action' => 'index'], ['class'=>'btn btn-outline-light float-right','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Volver a estados']); ?>
		</div>
	</div>
	<div class="row">
    <div class="col">
      <?= $this->Form->create($estado,['class'=>'needs-validation mb-3','novalidate'=>true]) ?>
				<div class="form-group">
					<label>Estado</label>
					<input value="<?= $estado['descripcion']?>" type="text" name="descripcion" class="form-control" placeholder="Estado" required>
					<div class="invalid-feedback">
						Por favor ingrese el nombre del estado
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