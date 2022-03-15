<main role="main" class="container">
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-11 col-sm-9 col-md-7 col-lg-6 col-xl-8 text-center p-0 mb-2" style="margin-top: 4em;">
        
        <div class="card px-0 pt-4 pb-0 mt-3 mb-3">
          
          <h2 id="heading">LLene los campos para hacer la reserva</h2>
          <p>Llene correctamente los campos para continuar con el siguiente paso</p>
          <?= $this->Form->create([],['id'=>'formReserva']) ?>
            <!-- progressbar -->
            <ul id="progressbar">
              <li class="active" id="pilotos"><strong>Pilotos</strong></li>
              <li id="fecha"><strong>Fecha</strong></li>
              <li id="registro"><strong>Registro</strong></li>
              <li id="resumen"><strong>Resumen</strong></li>
              <li id="confirmar"><strong>Finalizar</strong></li>
            </ul>
            <div class="progress">
              <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
            </div>
            <br> 

            <!-- Pilotos -->
            <fieldset>
              <div class="form-card">
                
                <div class="row">
                  <div class="col-7">
                    <h2 class="fs-title">Seleccione la cantidad de pilotos:</h2>
                  </div>
                  <div class="col-5">
                    <h2 class="steps">Paso 1 - 5</h2>
                  </div>
                </div>
                
                <div class="row text-center">
                  <div class="col-4">
                    <button type="button" class="btn btn-default btn-number" disabled="disabled" data-type="minus" data-field="cantidad_pilotos">
                      <span id="minus_span"></span>
                    </button>
                  </div>
                  <div class="col-4">
                    <input type="text" id="id-cantidad" name="cantidad_pilotos" class="form-control input-number" value="1" min="1" max="10">
                  </div>
                  <div class="col-4">
                    <button type="button" class="btn btn-default btn-number" data-type="plus" data-field="cantidad_pilotos">
                      <span id="plus_span"></span>
                    </button>
                  </div>
                </div>

                <input type="hidden" id="id-kart" name="id_kart">

                <div class="row mt-5">
                  <div class="col">
                    <button id="kart-adultos" type="button" value="1" class="tipo-kart btn btn-block btn-outline-danger text-left mb-2">
                      <?= $this->Html->image('kart_adultos.jpg', ['alt' => 'Super Karts', 'class'=>'img-fluid img-kartings']) ?>
                      <b>Karting Adultos:</b>
                      <hr style="margin-bottom: 5px;">
                      <p class="text-left text-truncate">Vuelta de reconocimiento más diez minutos de carrera</p>
                    </button>
                  </div>
                </div>

                <div class="row">
                  <div class="col">
                    <button id="kart-ninos" type="button" value="2" class="tipo-kart btn btn-block btn-outline-danger text-left mb-2">
                      <?= $this->Html->image('kart_ninos.jpg', ['alt' => 'Super Karts', 'class'=>'img-fluid img-kartings']) ?>
                      <b>Karting Niños:</b>
                      <hr style="margin-bottom: 5px;">
                      <p class="text-left text-truncate">Vuelta de reconocimiento más diez minutos de carrera</p>
                    </button>
                  </div>
                </div>

              </div>
              <button id="pt1" type="button" name="next" class="next action-button text-right btn btn-danger" disabled/>Siguiente</button>
            </fieldset>
                    
            <!-- Fecha -->
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
              <button id="pt2" type="button" name="next" class="next action-button btn btn-danger" disabled/>Siguiente</button>
            </fieldset>
            
            <!-- Registro -->    
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
                  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label for="cedula-responsable">Cédula de identidad</label>
                    <div class="input-group">
                      <input id="id-piloto-1" name='id-piloto-1' type="hidden" class="form-control" placeholder="Id piloto" required>
                      <input id="cedula-piloto-1" name='cedula-piloto-1' type="number" class="form-control" placeholder="Cédula de identidad" required>
                      <div class="invalid-feedback"></div>
                      <div class="input-group-append">
                        <button onclick="buscarPiloto(1);" class="btn btn-outline-warning" type="button" data-toggle="tooltip" data-placement="top" title="Buscar piloto"><i class="fas fa-search-plus"></i></button>
                        <button onclick="limpiar(1);" class="btn btn-outline-danger" type="button" data-toggle="tooltip" data-placement="top" title="Limpiar"><i class="fas fa-trash-alt"></i></button>
                      </div>
                    </div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">
                    <label for="nombre-piloto-1">Nombre</label>
                    <input id="nombre-piloto-1" type="text" class="form-control" placeholder="Nombre" required readonly>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">
                    <label for="apellido-piloto-1">Apellidos</label>
                    <input id="apellido-piloto-1" type="text" class="form-control" placeholder="Apellidos" required readonly>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">
                    <label for="telefono-piloto-1">Teléfono</label>
                    <input id="telefono-piloto-1" type="number" class="form-control" placeholder="Teléfono" required readonly>
                    <div class="invalid-feedback"></div>
                  </div>
                  <div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">
                    <label for="correo-piloto-1">Correo</label>
                    <input id="correo-piloto-1" type="text" class="form-control" placeholder="Correo" required readonly>
                    <div class="invalid-feedback"></div>
                  </div>
                </div>
                <br>
                <div id="otros-pilotos-cont" style="padding: 13px;"></div>
              </div>
              <button id="btn-atras-horarios" type="button" name="previous" class="previous action-button-previous btn btn-secondary"/>Anterior</button>
              <button id="pt3" type="button" name="next" class="next action-button btn btn-danger" disabled/>Siguiente</button>
              <button id="btn-registrar-responsable" onclick="registrarPiloto(1);" type="button" class="btn btn-info" style="display: none;"/>Registrar</button>
            </fieldset>

            <!-- Resumen -->    
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
              <button id="pt4" type="button" name="next" class="next action-button btn btn-danger" disabled/>Reservar</button>
            </fieldset>
                    
             <!-- Finalizar --> 
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
          <?= $this->Form->end(); ?>
        </div>
      </div>
    </div>
  </div>
</main>

<script type="text/javascript">
  
  /*Cargar resumen */
  function cargarResumen(){
    
    var karting_tipo = $('#id-kart').val();
    var karting = '';
    var nombre_piloto =  $('#nombre-piloto-1').val();
    var apellido_piloto =  $('#apellido-piloto-1').val();
    var telefono_piloto =  $('#telefono-piloto-1').val();
    var fecha_reserva = new Date($('#fecha-reserva').val()+'GMT-3');
    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    var id_horario = $('#id-horario').val();
    var hora = $('#hora-'+id_horario+'.hora-sesion-habilitado.active .hora-sesion-icon').find('strong').html();
    var correo_piloto =  $('#correo-piloto-1').val();
    var cantidad = $('#id-cantidad').val();
    var html = '';

    if (karting_tipo == 1) {
      karting = 'Karting Adultos';
    }else{
      karting = 'Karting Niños';
    }

    html += '<h6 class="card-title resumen-texto" style="color:var(--litepicker-is-start-color-bg);">'+karting+'</h6>';
    html += ' <h6 class="card-title resumen-texto">'+nombre_piloto+' '+apellido_piloto+'</h6>';
    html += '<h6 class="card-title resumen-texto">'+telefono_piloto+'</h6>';
    html += '<h6 class="card-title resumen-texto">'+fecha_reserva.toLocaleDateString('es-ES',options)+'</h6>';
    html += '<h6 class="card-title resumen-texto">'+hora+'</h6>';
    html += '<h6 class="card-title resumen-texto">'+correo_piloto+'</h6>';
    html += '<button type="button" class="btn btn-danger btn-sm" disabled>Cant. '+cantidad+'</button';

    $('#resumen-datos').html(html);
    $('#pt4').prop('disabled',false);
  }

  /* Para mostrar varias veces el alert */
  $('.alert').on('close.bs.alert', function (e) {
    e.preventDefault();
    $(this).hide('slow');
  });

  /* Mostrar alerts */
  function mostrarAlert(alertId){
    $('#'+alertId).show('slow').focus();
      $('#'+alertId).delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });
  }

  /* Buscar pilotos */
  function buscarPiloto(cantidad_pilotos){
    
    var ci = $('#cedula-piloto-'+cantidad_pilotos).val();
    var cantidad = Number($('#id-cantidad').val())+1;
    var cis = [];
    var cis_duplicados = [];
    
    for (i = 1; i < cantidad; i++) {
      if ($('#cedula-piloto-'+i).val()) {
        cis.push($('#cedula-piloto-'+i).val());  
      }
    }
    cis.sort();

    for (var i = 0; i < cis.length - 1; i++) {
      if (cis[i + 1] == cis[i]) {
        cis_duplicados.push(cis[i]);
      }
    }

    if (cis_duplicados.length) {
      $('#cedula-piloto-'+cantidad_pilotos).val('');
      mostrarAlert('alert-piloto-duplicado');
    }else{
      if (ci == '' || ci == '0') {
        $('#cedula-piloto-'+cantidad_pilotos).val('');
        mostrarAlert('alert-buscar-piloto');
      }else{
        $.ajax({
          url: '<?= $this->Url->build(['controller'=>'Home','action'=>'buscarPilotos']) ?>',
          dataType: 'Json',
          data : {ci:ci},
          type: 'POST',
          headers: {
            'X-CSRF-Token': $('[name="_csrfToken"]').val()
          },
          cache:false,
          beforeSend: function(){
            $('#cedula-piloto-'+cantidad_pilotos).addClass('loading');
          },
          success: function(piloto){
            if (piloto == null) {
              mostrarAlert('alert-registro');
              $('#cedula-piloto-'+cantidad_pilotos).prop('readonly', true);
              $('#nombre-piloto-'+cantidad_pilotos).prop('readonly', false);
              $('#apellido-piloto-'+cantidad_pilotos).prop('readonly', false);
              $('#telefono-piloto-'+cantidad_pilotos).prop('readonly', false);
              $('#correo-piloto-'+cantidad_pilotos).prop('readonly', false);
              if (cantidad_pilotos == 1) {
                $('#btn-registrar-responsable').show('slow');
              }else{
                $('#btn-registrar-pilotos-'+cantidad_pilotos).show('slow');
              }
            }else{
              $('#id-piloto-'+cantidad_pilotos).val(piloto.id_piloto);
              $('#cedula-piloto-'+cantidad_pilotos).prop('readonly', true);
              $('#nombre-piloto-'+cantidad_pilotos).prop('readonly', true).val(piloto.nombre);
              $('#apellido-piloto-'+cantidad_pilotos).prop('readonly', true).val(piloto.apellido);
              $('#telefono-piloto-'+cantidad_pilotos).prop('readonly', true).val(piloto.telefono);
              $('#correo-piloto-'+cantidad_pilotos).prop('readonly', true).val(piloto.correo);
              $("#btn-registrar-responsable").hide('slow');
              if (cantidad_pilotos == 1) {
                $('#pt3').prop('disabled',false);
                cargarOtrosPilotos($('#id-cantidad').val()-1);
              }
            }
          },
          complete:function(data){
            $('#cedula-piloto-'+cantidad_pilotos).removeClass('loading');
          },
          error: function(d){
            $('#cedula-piloto-'+cantidad_pilotos).removeClass('loading');
            mostrarAlert('alert-error-sistema');
          }
        });
      }
    }
  };

  /* Registrar Responsable */
  function registrarPiloto(cantidad_pilotos){

    var ci = $('#cedula-piloto-'+cantidad_pilotos).val();
    var nombre = $('#nombre-piloto-'+cantidad_pilotos).val();
    var apellido = $('#apellido-piloto-'+cantidad_pilotos).val();
    var telefono = $('#telefono-piloto-'+cantidad_pilotos).val();
    var correo = $('#correo-piloto-'+cantidad_pilotos).val();
    var letras = /^[a-zA-Z\u00C0-\u017F\s]*$/;
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;


    if (ci == '') {
      $('#cedula-piloto-'+cantidad_pilotos).addClass('is-invalid');
      $('#cedula-piloto-'+cantidad_pilotos).next().html('');
      $('#cedula-piloto-'+cantidad_pilotos).next().append('Por favor ingrese la cédula de identidad.').show('slow');
      return false;
    }else{
      $('#cedula-piloto-'+cantidad_pilotos).removeClass('is-invalid');
      $('#cedula-piloto-'+cantidad_pilotos).next().hide('slow');
    }

    if (nombre == '') {
      $('#nombre-piloto-'+cantidad_pilotos).addClass('is-invalid');
      $('#nombre-piloto-'+cantidad_pilotos).next().html('');
      $('#nombre-piloto-'+cantidad_pilotos).next().append('Por favor ingrese un nombre.').show('slow');
      return false;
    }else if (!nombre.match(letras)) {
      $('#nombre-piloto-'+cantidad_pilotos).addClass('is-invalid');
      $('#nombre-piloto-'+cantidad_pilotos).next().html('');
      $('#nombre-piloto-'+cantidad_pilotos).next().append('Por favor ingrese solo letras.').show('slow');
      return false;
    }else{
      $('#nombre-piloto-'+cantidad_pilotos).removeClass('is-invalid');
      $('#nombre-piloto-'+cantidad_pilotos).next().hide('slow');
    }

    if (apellido == '') {
      $('#apellido-piloto-'+cantidad_pilotos).addClass('is-invalid');
      $('#apellido-piloto-'+cantidad_pilotos).next().html('');
      $('#apellido-piloto-'+cantidad_pilotos).next().append('Por favor ingrese un apellido.').show('slow');
      return false;
    }else if (!apellido.match(letras)) {
      $('#apellido-piloto-'+cantidad_pilotos).addClass('is-invalid');
      $('#apellido-piloto-'+cantidad_pilotos).next().html('');
      $('#apellido-piloto-'+cantidad_pilotos).next().append('Por favor ingrese solo letras.').show('slow');
      return false;
    }else{
      $('#apellido-piloto-'+cantidad_pilotos).removeClass('is-invalid');
      $('#apellido-piloto-'+cantidad_pilotos).next().hide('slow');
    }

    if (telefono == '') {
      $('#telefono-piloto-'+cantidad_pilotos).addClass('is-invalid');
      $('#telefono-piloto-'+cantidad_pilotos).next().html('');
      $('#telefono-piloto-'+cantidad_pilotos).next().append('Por favor ingrese un teléfono.').show('slow');
      return false;
    }else{
      $('#telefono-piloto-'+cantidad_pilotos).removeClass('is-invalid');
      $('#telefono-piloto-'+cantidad_pilotos).next().hide('slow');
    }

    if (correo == '') {
      $('#correo-piloto-'+cantidad_pilotos).addClass('is-invalid');
      $('#correo-piloto-'+cantidad_pilotos).next().html('');
      $('#correo-piloto-'+cantidad_pilotos).next().append('Por favor ingrese un correo.').show('slow');
      return false;
    }else if (!regex.test(correo)){
      $('#correo-piloto-'+cantidad_pilotos).addClass('is-invalid');
      $('#correo-piloto-'+cantidad_pilotos).next().html('');
      $('#correo-piloto-'+cantidad_pilotos).next().append('Por favor ingrese un formato válido de correo.').show('slow');
      return false;
    }else{
      $('#correo-piloto-'+cantidad_pilotos).removeClass('is-invalid');
      $('#correo-piloto-'+cantidad_pilotos).next().hide('slow');
    }

    $.ajax({
      url: '<?= $this->Url->build(['controller'=>'Home','action'=>'registrarPiloto']) ?>',
      dataType: 'Json',
      data : {ci:ci,nombre:nombre,apellido:apellido,telefono:telefono,correo,correo},
      type: 'POST',
      headers: {
        'X-CSRF-Token': $('[name="_csrfToken"]').val()
      },
      cache:false,
      beforeSend: function(){
        $('#cedula-piloto-'+cantidad_pilotos).addClass('loading');
      },
      success: function(data){
        $('#cedula-piloto-'+cantidad_pilotos).removeClass('loading');
        if (data.id_piloto == null || data.ci == 0) {
          $('#cedula-piloto-'+cantidad_pilotos).prop('readonly', false);
          $('#nombre-piloto-'+cantidad_pilotos).prop('readonly', false);
          $('#apellido-piloto-'+cantidad_pilotos).prop('readonly', false);
          $('#telefono-piloto-'+cantidad_pilotos).prop('readonly', false);
          $('#correo-piloto-'+cantidad_pilotos).prop('readonly', false);
          limpiar(1);
          if (data.piloto == 0) {
            mostrarAlert('alert-piloto-resgistrado');
          }else if(data.id_piloto == null){
            mostrarAlert('alert-error-registrar-piloto');
          }
        }else{
          $('#id-piloto-'+cantidad_pilotos).val(data.piloto.id_piloto);
          $('#cedula-piloto-'+cantidad_pilotos).prop('readonly', true);
          $('#nombre-piloto-'+cantidad_pilotos).prop('readonly', true).val(data.piloto.nombre);
          $('#apellido-piloto-'+cantidad_pilotos).prop('readonly', true).val(data.piloto.apellido);
          $('#telefono-piloto-'+cantidad_pilotos).prop('readonly', true).val(data.piloto.telefono);
          $('#correo-piloto-'+cantidad_pilotos).prop('readonly', true).val(data.piloto.correo);
          $("#btn-registrar-responsable").hide('slow');
          if (cantidad_pilotos == 1) {
            $('#pt3').prop('disabled',false);
            cargarOtrosPilotos($('#id-cantidad').val()-1);
          }
          mostrarAlert('alert-registrar-piloto');
        }
      },
      complete:function(data){
        $('#cedula-piloto-'+cantidad_pilotos).removeClass('loading');
      },
      error: function(data){
        $('#cedula-piloto-'+cantidad_pilotos).removeClass('loading');
        mostrarAlert('alert-error-sistema');
      }
    });
  };
  
  /* Cargar Otros Pilotos */
  function cargarOtrosPilotos(cantidad_pilotos){
    var i = 0;
    var html = '';
    if (cantidad_pilotos > 0) {
      html += '<div class="row"><div class="col-7"><h2 class="fs-title">Datos otros pilotos:</h2></div></div>';
    }
    while (i <cantidad_pilotos) {
      html += '<div class="row" style="background-color: #f7f0f0;padding: 10px; border: 1px solid #fd0003;border-radius: 5px;">';
          html += '<div class="col-12"><h5>Piloto '+(i+2)+'.</h5></div>';
          html += '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">';
            html += '<label for="cedula-piloto-'+(i+2)+'">Cédula de identidad</label>';
            html += '<div class="input-group">';
              html += '<input id="id-piloto-'+(i+2)+'" name="id-piloto-'+(i+2)+'" type="hidden" class="form-control" placeholder="Id piloto" required>';
              html += '<input id="cedula-piloto-'+(i+2)+'" name="cedula-piloto-'+(i+2)+'" type="number" class="form-control" placeholder="Cédula de identidad" required>';
              html += '<div class="invalid-feedback"></div>';
              html += '<div class="input-group-append">';
                html += '<button onclick="buscarPiloto('+(i+2)+');" class="btn btn-outline-warning" type="button" data-toggle="tooltip" data-placement="top" title="Buscar piloto"><i class="fas fa-search-plus"></i></button>';
                html += '<button id="btn-registrar-pilotos-'+(i+2)+'" onclick="registrarPiloto('+(i+2)+');" class="btn btn-outline-info" type="button" style="display:none;" data-toggle="tooltip" data-placement="top" title="Agregar piloto"><i class="fas fa-user-plus"></i></button>';
                html += '<button onclick="limpiar('+(i+2)+');" class="btn btn-outline-danger" type="button" data-toggle="tooltip" data-placement="top" title="Limpiar"><i class="fas fa-trash-alt"></i></button>';
              html += '</div>';
            html += '</div>';
          html += '</div>';
          html += '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-6 mb-2">';
            html += '<label for="nombre-piloto-'+(i+2)+'">Nombre</label>';
            html += '<input id="nombre-piloto-'+(i+2)+'" type="text" class="form-control" placeholder="Nombre" required readonly>';
            html += '<div class="invalid-feedback"></div>';
          html += '</div>';
          html += '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">';
            html += '<label for="apellido-piloto-'+(i+2)+'">Apellidos</label>';
            html += '<input id="apellido-piloto-'+(i+2)+'" type="text" class="form-control" placeholder="Apellidos" required readonly>';
            html += '<div class="invalid-feedback"></div>';
          html += '</div>';
          html += '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">';
            html += '<label for="telefono-piloto-'+(i+2)+'">Teléfono</label>';
            html += '<input id="telefono-piloto-'+(i+2)+'" type="number" class="form-control" placeholder="Teléfono" required readonly>';
            html += '<div class="invalid-feedback"></div>';
          html += '</div>';
          html += '<div class="col-sm-12 col-md-6 col-lg-6 col-xl-4 mb-2">';
            html += '<label for="correo-piloto-'+(i+2)+'">Correo</label>';
            html += '<input id="correo-piloto-'+(i+2)+'" type="text" class="form-control" placeholder="Correo" required readonly>';
            html += '<div class="invalid-feedback"></div>';
          html += '</div>';
       
      html += '</div>';
      html += '<br>';
      i++;
    }
    $('#otros-pilotos-cont').html(html);
    $('[data-toggle="tooltip"]').tooltip();
  }

  /* Limpiar responsable */
  function limpiar(cantidad_pilotos){
    if (cantidad_pilotos == 1) {
      $('#pt3').prop('disabled',true);
      $('#otros-pilotos-cont').html('');
    }else{
      $('#btn-registrar-responsable').hide('slow');
    }
    $('#id-piloto-'+cantidad_pilotos).prop('readonly', false).val('');
    $('#cedula-piloto-'+cantidad_pilotos).prop('readonly', false).val('');
    $('#nombre-piloto-'+cantidad_pilotos).prop('readonly', false).val('');
    $('#apellido-piloto-'+cantidad_pilotos).prop('readonly', false).val('');
    $('#telefono-piloto-'+cantidad_pilotos).prop('readonly', false).val('');
    $('#correo-piloto-'+cantidad_pilotos).prop('readonly', false).val('');
  };

  /* Atras horarios */
  $('#btn-atras-horarios').click(function(){
    $('#pt2').prop('disabled',true);
    cargarAscientos($('#fecha-reserva').val());
    limpiar(1);
  });

  /* Calendario */
  const picker = new Litepicker({ 
    element: document.getElementById('fecha-reserva'),
    inlineMode : true,
    format: 'YYYY-MM-DD',
    lang: 'es',
    minDate: Date(),
    startDate : Date(),
    lockDays : <?= json_encode($diasBloqueados); ?>,
    setup: (picker) => {
      picker.on('selected', (date1, date2) => {
        cargarAscientos($('#fecha-reserva').val());
      });
    }
  });

  /* Tipo Kart */
  $('.tipo-kart').click(function(){
    if ($(this).attr("id") == 'kart-adultos') {
      $(this).addClass("active");
      $('#kart-ninos').removeClass('active');
      $('#id-kart').val($(this).attr('value'));
      $('#pt1').removeAttr('disabled');
    }else if ($(this).attr('id') == 'kart-ninos') {
      $(this).addClass("active");
      $('#kart-adultos').removeClass('active');
      $('#id-kart').val($(this).attr('value'));
      $('#pt1').removeAttr('disabled');
    }else{
      $('#id-kart').val('');
      $('#pt1').removeAttr('disabled');
    }
  });

  /* Ascientos libres */ 
  function cargarAscientos(fecha){
    var fecha_str = "'"+fecha+"'";
    var dias_bloqueados = <?= json_encode($diasBloqueados); ?>;
    var fecha_bloqueada = $.inArray(fecha,dias_bloqueados);
    $("#asientos-libres-contenedor").empty();
    if(fecha_bloqueada != -1){
      var i = 1;
      var html = '';
      html += '<div class="row">';
        html += '<div class="col text-center">';
          while (i < 11) {
            html += '<button type="button" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mr-2 mb-2 p-0 btn btn-danger" disabled>';
              html += '<div class="sesion-contenedor">';
                html += '<div class="hora-sesion-inhabilitado">';
                  html += '<div class="hora-sesion-icon"><strong>00:00</strong></div>';
                html += '</div>';
                html += '<div class="lugares-sesion-inhabilitadon">';
                  html += '<div class="cantidad-sesion-icon"><strong>0/0</strong></div>';
                html += '</div>';  
              html += '</div>';
            html += '</button>';
            i++;
          }
        html += '</div>';
      html += '</div>';
      $("#loader").hide();
      $('#asientos-libres-contenedor').html(html);
    }else{
      $.ajax({
        url: '<?= $this->Url->build(['controller'=>'Home','action'=>'cantidadReservas']) ?>',
        dataType: 'Json',
        data : {fecha:fecha},
        type: 'POST',
        headers: {
          'X-CSRF-Token': $('[name="_csrfToken"]').val()
        },
        cache:false,
        beforeSend: function(){
          $("#loader").show();
        },
        success: function(reservas){
          var html = '';
          html += '<div class="row">';
            html += '<div class="col text-center">';
            $.each(reservas, function(index, value){
              if(value.cantidad_restante > 0) {
                html += '<button id="btn-'+value.id_horario+'" type="button" onclick="seleccionarHorario('+value.id_horario+','+fecha_str+');" class="reservas col-sm-2 col-md-2 col-lg-2 col-xl-2 mr-2 mb-2 p-0 btn btn-success">';
                  html += '<div class="sesion-contenedor">';
                    html += '<div id="hora-'+value.id_horario+'" class="hora-sesion-habilitado">';
                      html += '<div class="hora-sesion-icon"><strong>'+value.horario+'</strong></div>';
                    html += '</div>';
                    html += '<div id="lugares-'+value.id_horario+'" class="lugares-sesion-habilitado">';
                      html += '<div class="cantidad-sesion-icon"><strong>'+value.cantidad_reservas+'/'+value.cantidad_total+'</strong></div>';
                    html += '</div>';
                  html += '</div>';
                html += '</button>';
              }else{
                html += '<button type="button" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mr-2 mb-2 p-0 btn btn-danger" disabled>';
                  html += '<div class="sesion-contenedor">';
                    html += '<div class="hora-sesion-inhabilitado">';
                      html += '<div class="hora-sesion-icon"><strong>'+value.horario+'</strong></div>';
                    html += '</div>';
                    html += '<div class="lugares-sesion-inhabilitadon">';
                      html += '<div class="cantidad-sesion-icon"><strong>'+value.cantidad_reservas+'/'+value.cantidad_total+'</strong></div>';
                    html += '</div>';  
                  html += '</div>';
                html += '</button>';
              }
            });
            html += '</div>';
          html += '</div>';
          $("#loader").hide();
          $('#asientos-libres-contenedor').html(html);
        },
        complete:function(data){
          $("#loader").hide();
        },
        error: function(d){
          $("#loader").hide();
          mostrarAlert('alert-error-sistema');
        }
      });
    }
  }

  /* Seleccion de horario */ 
  function seleccionarHorario(idHorario,fecha){

    var cantidadPilotos = $('#id-cantidad').val();
    $(".hora-sesion-habilitado, .lugares-sesion-habilitado").removeClass("active");
    var fecha_str = "'"+fecha+"'";
    $('#asientos-libres-contenedor').html('');
    var todoOk = true;

    $.ajax({
      url: '<?= $this->Url->build(['controller'=>'Home','action'=>'seleccionarHorarioDisponible']) ?>',
      dataType: 'Json',
      data : {fecha:fecha,id_horario:idHorario,cantidad_pilotos:cantidadPilotos},
      type: 'POST',
      headers: {
        'X-CSRF-Token': $('[name="_csrfToken"]').val()
      },
      cache:false,
      beforeSend: function(){
        $("#loader").show();
      },
      success: function(reservas){
        $('#id-horario').val(idHorario);
        var html = '';
        html += '<div class="row">';
          html += '<div class="col text-center">';
          $.each(reservas, function(index, value){
            if(value.cantidad_restante > 0) {
              html += '<button id="btn-'+value.id_horario+'" type="button" onclick="seleccionarHorario('+value.id_horario+','+fecha_str+');" class="reservas col-sm-2 col-md-2 col-lg-2 col-xl-2 mr-2 mb-2 p-0 btn btn-success">';
                html += '<div class="sesion-contenedor">';
                  html += '<div id="hora-'+value.id_horario+'" class="hora-sesion-habilitado">';
                    html += '<div class="hora-sesion-icon"><strong>'+value.horario+'</strong></div>';
                  html += '</div>';
                  html += '<div id="lugares-'+value.id_horario+'" class="lugares-sesion-habilitado">';
                    html += '<div class="cantidad-sesion-icon"><strong>'+value.cantidad_reservas+'/'+value.cantidad_total+'</strong></div>';
                  html += '</div>';
                html += '</div>';
              html += '</button>';
            }else if(value.cantidad_restante < 0){
              html += '<button type="button" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mr-2 mb-2 p-0 btn btn-danger" disabled>';
                html += '<div class="sesion-contenedor">';
                  html += '<div class="hora-sesion-inhabilitado">';
                    html += '<div class="hora-sesion-icon"><strong>'+value.horario+'</strong></div>';
                  html += '</div>';
                  html += '<div class="lugares-sesion-inhabilitadon">';
                    html += '<div class="cantidad-sesion-icon"><strong>'+value.cantidad_reservas+'/'+value.cantidad_total+'</strong></div>';
                  html += '</div>';  
                html += '</div>';
              html += '</button>';
              todoOk = false;
            }else if(value.cantidad_restante == 0){
              html += '<button type="button" class="col-sm-2 col-md-2 col-lg-2 col-xl-2 mr-2 mb-2 p-0 btn btn-danger" disabled>';
                html += '<div class="sesion-contenedor">';
                  html += '<div class="hora-sesion-inhabilitado">';
                    html += '<div class="hora-sesion-icon"><strong>'+value.horario+'</strong></div>';
                  html += '</div>';
                  html += '<div class="lugares-sesion-inhabilitadon">';
                    html += '<div class="cantidad-sesion-icon"><strong>'+value.cantidad_reservas+'/'+value.cantidad_total+'</strong></div>';
                  html += '</div>';  
                html += '</div>';
              html += '</button>';
            }
          });
          html += '</div>';
        html += '</div>';
        $("#loader").hide();
        $('#asientos-libres-contenedor').html(html);
        $("#hora-"+idHorario+","+"#lugares-"+idHorario).addClass("active");
        if(todoOk){
          $('#pt2').removeAttr('disabled');
        }else{
          mostrarAlert('alert-horarios');
        }
      },
      complete:function(data){
        $("#loader").hide();
      },
      error: function(d){
        $('#id-cantidad').val('');
        $("#loader").hide();
        mostrarAlert('alert-error-sistema');
      }
    });
  }

  $(function () {
    $('[data-toggle="tooltip"]').tooltip()
  });

  $(document).ready(function(){

    /* Ascientos libres de hoy */ 
    var today = new Date();
    var dd = String(today.getDate()).padStart(2, '0');
    var mm = String(today.getMonth() + 1).padStart(2, '0');
    var yyyy = today.getFullYear();
    cargarAscientos(yyyy+'-'+mm+'-'+dd);
    

    /* cantidad ascientos  */ 
    $('.btn-number').click(function(e){
      
      e.preventDefault();
    
      fieldName = $(this).attr('data-field');
      type = $(this).attr('data-type');
      var input = $("input[name='"+fieldName+"']");
      var currentVal = parseInt(input.val());
      
      if (!isNaN(currentVal)) {
        if(type == 'minus') {
            
          if(currentVal > input.attr('min')) {
            input.val(currentVal - 1).change();
          } 
          if(parseInt(input.val()) == input.attr('min')) {
            $(this).attr('disabled', true);
          }

        }else if(type == 'plus') {

          if(currentVal < input.attr('max')) {
            input.val(currentVal + 1).change();
          }
          if(parseInt(input.val()) == input.attr('max')) {
            $(this).attr('disabled', true);
          }
        }
      }else{
        input.val(0);
      }
    });

    $('.input-number').focusin(function(){
      $(this).data('oldValue', $(this).val());
    });

    $('.input-number').change(function() {
      minValue =  parseInt($(this).attr('min'));
      maxValue =  parseInt($(this).attr('max'));
      valueCurrent = parseInt($(this).val());
      name = $(this).attr('name');
      if(valueCurrent >= minValue) {
        $(".btn-number[data-type='minus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
        $(this).val($(this).data('oldValue'));
      }
      if(valueCurrent <= maxValue) {
        $(".btn-number[data-type='plus'][data-field='"+name+"']").removeAttr('disabled')
      } else {
        $(this).val($(this).data('oldValue'));
      }
    });

    $(".input-number").keydown(function (e) {
      if ($.inArray(e.keyCode, [46, 8, 9, 27, 13, 190]) !== -1 ||
        (e.keyCode == 65 && e.ctrlKey === true) || 
        (e.keyCode >= 35 && e.keyCode <= 39)) {
        return;
      }
      if ((e.shiftKey || (e.keyCode < 48 || e.keyCode > 57)) && (e.keyCode < 96 || e.keyCode > 105)) {
        e.preventDefault();
      }
    });

    
    /* seleccion de pasos */
    var current_fs, next_fs, previous_fs;
    var opacity;
    var current = 1;
    var steps = $("fieldset").length;
    
    setProgressBar(current);

    $(".next").click(function(){

      current_fs = $(this).parent();
      next_fs = $(this).parent().next();

      //Verificacion de pilotos
      var inputs_vacios = 0;
      if ($("fieldset").index(next_fs)==3) {
        $('input').each(function() {
          if(!$(this).val()){
            inputs_vacios += 1;
          }
        });
      }
      if (inputs_vacios > 0) {
        $('#alert-inputs-vacios').show('slow');
        return false;
      }

      //Carga de resumen
      if ($("fieldset").index(next_fs)==3) {
        cargarResumen();
      }

      //Reservar
      if ($("fieldset").index(next_fs)==4) {
        datos = {};
        var resultado = 0;
        
        $('input').each(function() {
          if ($(this).attr('id')) {
            datos[$(this).attr('id')] = $(this).val();
          }
        });

        $.ajax({
          url: '<?= $this->Url->build(['controller'=>'Home','action'=>'guardarReserva']) ?>',
          dataType: 'Json',
          data : datos,
          type: 'POST',
          headers: {
            'X-CSRF-Token': $('[name="_csrfToken"]').val()
          },
          cache:false,
          async: false,
          success: function(reserva){
            resultado = reserva;
          },
          error: function(reserva){
            mostrarAlert('alert-error-sistema');
          }
        });
        console.log(resultado);
        if (resultado == 0) {
          mostrarAlert('alert-error-guardar-reserva');
          return false;
        }else if(resultado == 2){
          mostrarAlert('alert-guardar-reserva');
          return false;
        }
      }

      //Add Class Active
      $("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

      //show the next fieldset
      next_fs.show();
      //hide the current fieldset with style
      current_fs.animate({opacity: 0}, {
        step: function(now) {
          // for making fielset appear animation
          opacity = 1 - now;
          current_fs.css({
            'display': 'none',
            'position': 'relative'
          });
          next_fs.css({'opacity': opacity});
        },
        duration: 500
      });
      setProgressBar(++current);
    });

    $(".previous").click(function(){

      current_fs = $(this).parent();
      previous_fs = $(this).parent().prev();

      //Remove class active
      $("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

      //show the previous fieldset
      previous_fs.show();

      //hide the current fieldset with style
      current_fs.animate({opacity: 0}, {
      step: function(now) {
      // for making fielset appear animation
      opacity = 1 - now;

      current_fs.css({
      'display': 'none',
      'position': 'relative'
      });
      previous_fs.css({'opacity': opacity});
      },
      duration: 500
      });
      setProgressBar(--current);
    });

    function setProgressBar(curStep){
      var percent = parseFloat(100 / steps) * curStep;
      percent = percent.toFixed();
      $(".progress-bar")
      .css("width",percent+"%")
    }
  });
</script>