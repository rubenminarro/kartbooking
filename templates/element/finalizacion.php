<fieldset>
	<div class="form-card">
		<div class="row">
			<div class="col-7">
				<h2 class="fs-title">La reserva se completado correctamente:</h2>
			</div>
			<div class="col-5">
				<h2 class="steps">Paso 4 - 4</h2>
			</div>
		</div> 
		<div class="row">
			<div class="col-xl-8 col-lg-10 col-md-10 col-sm-10 mx-auto text-center">
				<?= $this->Html->image('reserva_finalizar.png', ['alt' => 'Super Karts', 'class'=>'img-fluid']) ?>
			</div>
		</div>
		<div class="row justify-content-center">
			<div class="col-7 text-center">
				<h4>Tu reserva se ha creado con éxito</h4>
				<p>Preséntate al menos 30 minutos antes de la hora reservada.</p>
			</div>
		</div>
	</div>
	<button onclick="location.reload();" class="btn btn-danger" role="button" aria-disabled="true">Finalizar</button>
</fieldset>