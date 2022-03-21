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

            <!-- Cant Pilotos -->
            <?= $this->element('cant-pilotos'); ?>
                    
            <!-- Fecha -->
            <?= $this->element('fecha-reserva'); ?>
            
            <!-- Registro -->
            <?= $this->element('registro-pilotos'); ?>
            
            <!-- Resumen -->    
            <?= $this->element('resumen'); ?>
                    
            <!-- Finalizar -->
            <?= $this->element('finalizacion'); ?>
            
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
    var nombre_piloto =  $('#nombre-piloto').val();
    var apellido_piloto =  $('#apellido-piloto').val();
    var telefono_piloto =  $('#telefono-piloto').val();
    var fecha_reserva = new Date($('#fecha-reserva').val()+'GMT-3');
    var options = { year: 'numeric', month: 'long', day: 'numeric' };
    var id_horario = $('#id-horario').val();
    var hora = $('#hora-'+id_horario+'.hora-sesion-habilitado.active .hora-sesion-icon').find('strong').html();
    var correo_piloto =  $('#correo-piloto').val();
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
    html += '<button type="button" class="btn btn-sm" style="background-color:var(--orange);color:var(--white);" disabled>Cant. '+cantidad+'</button';

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
  function buscarPiloto(){
    
    var ci = $('#cedula-piloto').val();
    
    if (ci == '' || ci == '0') {
      $('#cedula-piloto').val('');
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
          $('#cedula-piloto').addClass('loading');
        },
        success: function(piloto){
          if (piloto == null) {
            mostrarAlert('alert-registro');
            $('#cedula-piloto').prop('readonly', true);
            $('#nombre-piloto').prop('readonly', false);
            $('#apellido-piloto').prop('readonly', false);
            $('#telefono-piloto').prop('readonly', false);
            $('#correo-piloto').prop('readonly', false);
            $('#btn-registrar-piloto').show('slow');
          }else{
            $('#id-piloto').val(piloto.id_piloto);
            $('#cedula-piloto').prop('readonly', true);
            $('#nombre-piloto').prop('readonly', true).val(piloto.nombre);
            $('#apellido-piloto').prop('readonly', true).val(piloto.apellido);
            $('#telefono-piloto').prop('readonly', true).val(piloto.telefono);
            $('#correo-piloto').prop('readonly', true).val(piloto.correo);
            $("#btn-registrar-piloto").hide('slow');
            $('#pt3').prop('disabled',false);
          }
        },
        complete:function(data){
          $('#cedula-piloto').removeClass('loading');
        },
        error: function(d){
          $('#cedula-piloto').removeClass('loading');
          mostrarAlert('alert-error-sistema');
        }
      });
    }
  };

  /* Registrar piloto */
  function registrarPiloto(){

    var ci = $('#cedula-piloto').val();
    var nombre = $('#nombre-piloto').val();
    var apellido = $('#apellido-piloto').val();
    var telefono = $('#telefono-piloto').val();
    var correo = $('#correo-piloto').val();
    var letras = /^[a-zA-Z\u00C0-\u017F\s]*$/;
    var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;


    if (ci == '') {
      $('#cedula-piloto').addClass('is-invalid');
      $('#cedula-piloto').next().html('');
      $('#cedula-piloto').next().append('Por favor ingrese la cédula de identidad.').show('slow');
      return false;
    }else{
      $('#cedula-piloto').removeClass('is-invalid');
      $('#cedula-piloto').next().hide('slow');
    }

    if (nombre == '') {
      $('#nombre-piloto').addClass('is-invalid');
      $('#nombre-piloto').next().html('');
      $('#nombre-piloto').next().append('Por favor ingrese un nombre.').show('slow');
      return false;
    }else if (!nombre.match(letras)) {
      $('#nombre-piloto').addClass('is-invalid');
      $('#nombre-piloto').next().html('');
      $('#nombre-piloto').next().append('Por favor ingrese solo letras.').show('slow');
      return false;
    }else{
      $('#nombre-piloto').removeClass('is-invalid');
      $('#nombre-piloto').next().hide('slow');
    }

    if (apellido == '') {
      $('#apellido-piloto').addClass('is-invalid');
      $('#apellido-piloto').next().html('');
      $('#apellido-piloto').next().append('Por favor ingrese un apellido.').show('slow');
      return false;
    }else if (!apellido.match(letras)) {
      $('#apellido-piloto').addClass('is-invalid');
      $('#apellido-piloto').next().html('');
      $('#apellido-piloto').next().append('Por favor ingrese solo letras.').show('slow');
      return false;
    }else{
      $('#apellido-piloto').removeClass('is-invalid');
      $('#apellido-piloto').next().hide('slow');
    }

    if (correo == '') {
      $('#correo-piloto').addClass('is-invalid');
      $('#correo-piloto').next().html('');
      $('#correo-piloto').next().append('Por favor ingrese un correo.').show('slow');
      return false;
    }else if (!regex.test(correo)){
      $('#correo-piloto').addClass('is-invalid');
      $('#correo-piloto').next().html('');
      $('#correo-piloto').next().append('Por favor ingrese un formato válido de correo.').show('slow');
      return false;
    }else{
      $('#correo-piloto').removeClass('is-invalid');
      $('#correo-piloto').next().hide('slow');
    }

    if (telefono == '') {
      $('#telefono-piloto').addClass('is-invalid');
      $('#telefono-piloto').next().html('');
      $('#telefono-piloto').next().append('Por favor ingrese un teléfono.').show('slow');
      return false;
    }else{
      $('#telefono-piloto').removeClass('is-invalid');
      $('#telefono-piloto').next().hide('slow');
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
        $('#cedula-piloto').addClass('loading');
      },
      success: function(data){
        $('#cedula-piloto').removeClass('loading');
        if (data.id_piloto == null || data.ci == 0) {
          $('#cedula-piloto').prop('readonly', false);
          $('#nombre-piloto').prop('readonly', false);
          $('#apellido-piloto').prop('readonly', false);
          $('#telefono-piloto').prop('readonly', false);
          $('#correo-piloto').prop('readonly', false);
          limpiar();
          if (data.piloto == 0) {
            mostrarAlert('alert-piloto-resgistrado');
          }else if(data.id_piloto == null){
            mostrarAlert('alert-error-registrar-piloto');
          }
        }else{
          $('#id-piloto').val(data.piloto.id_piloto);
          $('#cedula-piloto').prop('readonly', true);
          $('#nombre-piloto').prop('readonly', true).val(data.piloto.nombre);
          $('#apellido-piloto').prop('readonly', true).val(data.piloto.apellido);
          $('#telefono-piloto').prop('readonly', true).val(data.piloto.telefono);
          $('#correo-piloto').prop('readonly', true).val(data.piloto.correo);
          $("#btn-registrar-piloto").hide('slow');
          $('#pt3').prop('disabled',false);
          mostrarAlert('alert-registrar-piloto');
        }
      },
      complete:function(data){
        $('#cedula-piloto').removeClass('loading');
      },
      error: function(data){
        $('#cedula-piloto').removeClass('loading');
        mostrarAlert('alert-error-sistema');
      }
    });
  };
  
  /* Limpiar responsable */
  function limpiar(){
    $('#btn-registrar-piloto').hide('slow');
    $('#id-piloto').prop('readonly', false).val('');
    $('#cedula-piloto').prop('readonly', false).val('');
    $('#nombre-piloto').prop('readonly', false).val('');
    $('#apellido-piloto').prop('readonly', false).val('');
    $('#telefono-piloto').prop('readonly', false).val('');
    $('#correo-piloto').prop('readonly', false).val('');
  };

  /* Atras horarios */
  $('#btn-atras-horarios').click(function(){
    $('#pt2').prop('disabled',true);
    cargarAscientos($('#fecha-reserva').val());
    limpiar();
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

    /* Buscador de pilotos */
    $('input[name=cedula-piloto]').keydown(function(e) {
      var code = e.keyCode || e.which;
      if (code === 9 || code === 13) {  
          e.preventDefault();
          $("#btn-buscar-piloto").trigger("click");
      }
    });

    /* Bloquea cualquier ENTER en la pantalla */
    $(window).keydown(function(e){
      if(e.keyCode == 13) {
				e.preventDefault();
        return false;
      }
		});

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

      //Cantidad pilotos
      if ($("fieldset").index(next_fs)==2) {
        var cantidad = $('#id-cantidad').val();
        $("#cantidad-pilotos").val(cantidad);  
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
        //console.log(resultado);
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