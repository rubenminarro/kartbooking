<fieldset>
	<div class="form-card">
		<div class="row">
			<div class="col-7">
				<h2 class="fs-title">Comprueba que los detalles sean correctos:</h2>
			</div>
			<div class="col-5">
				<h2 class="steps">Paso 4 - 5</h2>
			</div>
		</div>
		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
				<div id="alert-guardar-reserva" class="alert alert-danger fade show" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">Existe un piloto ya registrado en el mismo horario!</h5>
					<hr>
					<p class="mb-0">Vuelva a llenar el formulario con un horario distinto.</p>
				</div>
				<div id="alert-error-guardar-reserva" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">Lo Sentimos!</h5>
					<hr>
					<p class="mb-0">Pero hubo un error durante la reserva, por favor intente de nuevo.</p>
				</div>
				<div id="alert-error-sistema" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">Cuidado!</h5>
					<hr>
					<p class="mb-0">Existe un error por favor comunicarse con las oficinas de SuperKarts.</p>
				</div>
			</div>
		</div>
		<div class="row mb-3">
			<div class="col">
				<div class="card" style="box-shadow: 0 0 15px -5px rgb(0 0 0 / 26%); border: 1px solid rgba(0, 0, 0, 0.125)">
					<div class="card-body">
						<div class="row">
							<div class="col text-left" style="color:gray;">
								<h6 class="card-title resumen-texto">Tipo de Karting:</h6>
								<h6 class="card-title resumen-texto">Datos:</h6>
								<h6 class="card-title resumen-texto">Teléfono:</h6>
								<h6 class="card-title resumen-texto">Fecha:</h6>
								<h6 class="card-title resumen-texto">Hora:</h6>
								<h6 class="card-title resumen-texto">E-mail:</h6>
								<h6 class="card-title resumen-texto">Cantidad:</h6>
							</div>
							<div id="resumen-datos" class="col text-right mb-2"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<button type="button" name="previous" class="previous action-button-previous btn btn-secondary"/>Anterior</button>
	<button id="pt4" type="button" name="next" style="background-color:var(--orange);color:var(--white);" class="next action-button text-right btn" disabled/>Reservar</button>
</fieldset>