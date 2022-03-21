<fieldset>
	<div class="form-card">
		<div class="row">
			<div class="col-7">
				<h2 class="fs-title">Seleccione la fecha de reserva:</h2>
			</div>
			<div class="col-5">
				<h2 class="steps">Paso 2 - 5</h2>
			</div>
		</div> 
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto text-center">
				<input type="hidden" id="fecha-reserva" name="fecha_reserva">
			</div>
		</div>
		<br>
		<div class="row">
			<div class="col-7">
				<h2 class="fs-title">Seleccione una sesión dispnible:</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto text-center">
				<div id="loader"><?= $this->Html->image('ajax-loading.gif', ['alt' => 'Loader', 'class'=>'img-fluid text-center']) ?></div>
			</div>
		</div>
		<input type="hidden" id="id-horario" name="id_horario">
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
				<div id="alert-horarios" class="alert alert-danger fade show" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h4 class="alert-heading">Lo sentimos!</h4>
					<hr>
					<p class="mb-0">Pero ha sobrepasado la cantidad de pilotos por sesión permitida.</p>
				</div>
			</div>
		</div>
		<div id="asientos-libres-contenedor"></div>
	</div>
	<button onclick="cargarAscientos($('#fecha-reserva').val());" type="button" name="previous" class="previous action-button-previous btn btn-secondary"/>Anterior</button>
	<button id="pt2" type="button" name="next" style="background-color:var(--orange);color:var(--white);" class="next action-button text-right btn" disabled/>Siguiente</button>
</fieldset>