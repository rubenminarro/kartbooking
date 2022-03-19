<fieldset>
  <div class="form-card">
		<div class="row">
			<div class="col-7">
				<h2 class="fs-title">Datos de contacto:</h2>
			</div>
			<div class="col-5">
				<h2 class="steps">Paso 3 - 5</h2>
			</div>
		</div>

		<div class="row">
			<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
				<div id="alert-registro" class="alert alert-warning fade show" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">Aún no está registrado!</h5>
					<hr>
					<p class="mb-0">Llene los campos requiridos y continue con la reserva.</p>
				</div>
				<div id="alert-buscar-piloto" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">Lo sentimos!</h5>
					<hr>
					<p class="mb-0">Ingrese el número de documento para poder continuar con el registro.</p>
				</div>
				<div id="alert-error-registrar-piloto" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">Lo sentimos!</h5>
					<hr>
					<p class="mb-0">Pero hubo un error durante el registro, por favor intente de nuevo.</p>
				</div>
				<div id="alert-registrar-piloto" class="alert alert-success alert-dismissible" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">El piloto se ha registrado correctamente!</h5>
					<hr>
					<p class="mb-0">LLene los datos de los demas pilotos para continuar con la reserva.</p>
				</div>
				<div id="alert-piloto-resgistrado" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">El piloto ya está registrado!</h5>
					<hr>
					<p class="mb-0">Vuelve a llenar los datos correctamente para continuar con la reserva.</p>
				</div>
				<div id="alert-piloto-duplicado" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">El piloto ya se encuentra registrado parrilla!</h5>
					<hr>
					<p class="mb-0">Por favor utilice otro número de cédula.</p>
				</div>
				<div id="alert-inputs-vacios" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
					<button type="button" class="close" data-dismiss="alert" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
					<h5 class="alert-heading">Existen datos mal cargados!</h5>
					<hr>
					<p class="mb-0">Por favor verifique los datos de cada piloto.</p>
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

		<div class="row">
			
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb">
				<label for="cedula-responsable">Cédula de identidad</label>
				<div class="input-group">
					<input id="id-piloto" name='id-piloto' type="hidden" class="form-control" placeholder="Id piloto" required>
					<input id="cedula-piloto" name='cedula-piloto' type="number" class="form-control" placeholder="Cédula de identidad" required>
					<div class="invalid-feedback"></div>
					<div class="input-group-append">
						<button id="btn-buscar-piloto" onclick="buscarPiloto();" class="btn btn-outline-warning" type="button" data-toggle="tooltip" data-placement="top" title="Buscar piloto"><i class="fas fa-search-plus"></i></button>
						<button onclick="limpiar();" class="btn btn-outline-danger" type="button" data-toggle="tooltip" data-placement="top" title="Limpiar"><i class="fas fa-trash-alt"></i></button>
					</div>
				</div>
			</div>
			
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb">
				<label for="nombre-piloto">Nombre</label>
				<input id="nombre-piloto" type="text" class="form-control" placeholder="Nombre" required readonly>
				<div class="invalid-feedback"></div>
			</div>
			
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">
				<label for="apellido-piloto">Apellidos</label>
				<input id="apellido-piloto" type="text" class="form-control" placeholder="Apellidos" required readonly>
				<div class="invalid-feedback"></div>
			</div>
			
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">
				<label for="correo-piloto">Correo</label>
				<input id="correo-piloto" type="text" class="form-control" placeholder="Correo" required readonly>
				<div class="invalid-feedback"></div>
			</div>
			
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">
				<label for="telefono-piloto">Teléfono</label>
				<input id="telefono-piloto" type="number" class="form-control" placeholder="Teléfono" required readonly>
				<div class="invalid-feedback"></div>
			</div>
			
			<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">
				<label for="cantidad-pilotos">Cant. Pilotos</label>
				<input id="cantidad-pilotos" type="number" class="form-control" placeholder="Cant. Pilotos" required readonly>
			</div>
		
		</div>
	</div>
	<button id="btn-atras-horarios" type="button" name="previous" class="previous action-button-previous btn btn-secondary"/>Anterior</button>
	<button id="pt3" type="button" name="next" class="next action-button btn btn-danger" disabled/>Siguiente</button>
	<button id="btn-registrar-piloto" onclick="registrarPiloto();" type="button" class="btn btn-info" style="display: none;"/>Registrar</button>
</fieldset>