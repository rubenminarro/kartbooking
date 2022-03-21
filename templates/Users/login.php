<?= $this->Form->create(null,['class'=>'form-signin needs-validation','novalidate'=>true]) ?>

	<?= $this->Html->image('go-kart.png', ['alt' => 'Super Karts', 'class'=>'mb-4', 'width'=>'85%', 'height'=>'auto']) ?>
  <h1 class="h3 mb-3 font-weight-normal">Por favor ingrese sus datos</h1>
	
	<div class="row">
		<div class="col">
			<?= $this->Flash->render() ?>
		</div>
	</div>

	<div class="form-group">
		<input type="text" name="username" class="form-control" placeholder="Usuario" required autofocus>
		<div class="invalid-feedback">
			Por favor ingrese el usuario
		</div>
	</div>
  
	<div class="form-group">
		<input type="password" name="password" class="form-control" placeholder="Contraseña" required>
		<div class="invalid-feedback">
			Por favor ingrese la contraseña
		</div>
	</div>
  
	<button class="btn btn-lg btn-block" style="background-color:var(--orange);color:var(--white);" type="submit">Ingresar</button>
  <p class="mt-5 mb-3 text-muted">&copy; <?= date("Y"); ?></p>
<?= $this->Form->end() ?>

<script type="text/javascript">
	
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