<main role="main" class="container">
  <h2>Reservas</h2>
  <div class="row mb-3">
    <div class="col-4">
      <div class="input-group">
       <input id="date-input" type="search" placeholder="Ingrese una fecha" class="form-control" readonly>
       <div class="input-group-prepend">
          <div id="fecha-reserva" class="input-group-text"><i class="fas fa-calendar-alt"></i></div>
        </div>
      </div>
    </div>
    <div class="col-4">
      <?= $this->Html->link(__('<i class="fas fa-file-export"></i> Exportar'),
          ['controller'=>'Reservas','action'=>'exportar'],
          [
            'id'=>'btn-exportar',
            'class'=>'btn btn-info',
            'target'=>'_blank',
            'escape'=>false,
            'data-toggle'=>'tooltip', 
            'data-placement'=>'top',
            'title'=>'Exportar reservas'
          ]
        ) 
      ?>
    </div>
  </div>
  
  <!-- Alerts -->
  <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
      <div id="alert-borrar-reserva-piloto" class="alert alert-success fade show" role="alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="alert-heading">El piloto se ha borrado correctamente!</h5>
        <hr>
        <p class="mb-0">Puede continuar con el administración de las sesiones.</p>
      </div>
      <div id="alert-borrar-reserva" class="alert alert-success fade show" role="alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="alert-heading">La reserva se ha borrado correctamente!</h5>
        <hr>
        <p class="mb-0">Puede continuar con el administración de las sesiones.</p>
      </div>
      <div id="alert-cambiar-estado" class="alert alert-success fade show" role="alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="alert-heading">El estado se ha actualizado correctamente!</h5>
        <hr>
        <p class="mb-0">Puede continuar con el administración de las sesiones.</p>
      </div>
      <div id="alert-error-borrar-reserva-piloto" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="alert-heading">Lo sentimos!</h5>
        <hr>
        <p class="mb-0">Pero hubo un error al borrar el piloto. Por favor intente nuevamente.</p>
      </div>
      <div id="alert-error-borrar-reserva" class="alert alert-danger alert-dismissible" role="alert" style="display: none;">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
        <h5 class="alert-heading">Lo sentimos!</h5>
        <hr>
        <p class="mb-0">Pero hubo un error al borrar la reserva. Por favor intente nuevamente.</p>
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
  
  <div class="table-responsive mb-4">
    <?php
      
      echo $this->Form->create([],['url' => ['action' => 'borrarReservaPiloto']]);
      echo $this->Form->end();
      
      echo '<table id="table-reservas" class="table table-hover">';
        echo '<thead>';
          echo '<tr>';
            echo '<th>Día</th>';
            echo '<th>Horario</th>';
            echo '<th>Piloto Responsable</th>';
            echo '<th>Teléfono</th>';
            echo '<th class="text-center">Pilotos</th>';
            echo '<th class="text-center">Estado</th>';
            echo '<th>Tipo Kart</th>';
            echo '<th class="text-center">Total</th>';
            echo '<th class="text-center"></th>';
          echo '</tr>';
        echo '</thead>';
        echo '<tbody>';
        foreach ($dia_reservas as $dia_reserva) {
          foreach ($dia_reserva as $key => $horario_reserva) {
            foreach ($horario_reserva as $key => $reposonble_reserva) {
              foreach ($reposonble_reserva as $key => $reserva) {
                if ($reserva['id_piloto'] == $reserva['id_piloto_responsable']) {
                  $idReserva = $reserva['id_reserva'];
                  echo '<tr class="cabecera" id="cabecera-'.$reserva['id_reserva'].'">';
                    echo '<td>'.$reposonble_reserva[0]['dia'].'</td>';
                    echo '<td>'.$reposonble_reserva[0]['horario'].'</td>';
                    echo '<td>'.$reserva['piloto_nombre'].' '.$reserva['piloto_apellido'].'</td>';
                    echo '<td>'.$reserva['telefono'].'</td>';
                    echo '<td class="text-center"><button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" title="Mostrar pilotos" data-target="#detalle-'.$reserva['id_reserva'].'"><i class="fa" aria-hidden="true"></i></button></td>';
                    echo '<td class="text-center">';
                      echo $this->Form->select(
                        'estado',
                        $estados,
                        ['id'=>$idReserva,'class'=>'custom-select cambiar-estado','value'=>$reserva['id_estado']]
                      );
                    echo '</td>';
                    echo '<td>'.$reserva['tipo_karitng'].'</td>';
                    $dia = "'".$reposonble_reserva[0]['dia']."'";
                    echo '<td id="total-reserva-'.$reserva['id_reserva'].'" class="text-center">'.count($reposonble_reserva).'</td>';
                    echo '<td class="text-center"><button type="button" onclick="borrarReserva('.$reserva['id_piloto'].','.$reserva['id_horario'].','.$dia.');" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Borrar reserva"><i class="fas fa-trash-alt"></i></button></td>';
                  echo '</tr>';
                }
              }
            }
          }
        }
        echo '</tbody>';
      echo '</table>';
      
      foreach ($dia_reservas as $dia_reserva) {
        foreach ($dia_reserva as $key => $horario_reserva) {
          foreach ($horario_reserva as $key => $reposonble_reserva) {
            foreach ($reposonble_reserva as $key => $reserva) {
              if ($reserva['id_piloto'] == $reserva['id_piloto_responsable']) {
                $idReserva = $reserva['id_reserva'];
              }
            }
            if(count($reposonble_reserva)>1){
              echo '<div id="detalle-'.$idReserva.'" class="modal fade">';
                echo '<div class="modal-dialog modal-lg" role="document">';
                  echo '<div class="modal-content">';
                    echo '<div class="modal-header">';
                      echo '<h5 class="modal-title">Pilotos</h5>';
                      echo '<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>';
                    echo '</div>';
                    echo '<div class="modal-body">';
                      echo '<div class="table-responsive mb-4">';
                        echo '<table id="table-detalles" class="table table-hover table-sm">';
                          echo '<thead>';
                            echo '<tr id="cabecera-otro-piloto-'.$reserva['id_piloto'].'">';
                              echo '<th>Piloto</th>';
                              echo '<th>Teléfono</th>';
                              echo '<th>Correo</th>';
                              echo '<th></th>';
                            echo '</tr>';
                          echo '</thead>';
                          echo '<tbody>';
                            foreach ($reposonble_reserva as $key => $piloto) {
                              if ($piloto['id_piloto'] != $piloto['id_piloto_responsable']) {
                                echo '<tr id="detalle-reserva-'.$idReserva.'-'.$piloto['id_piloto'].'">';
                                  echo '<td>'.$piloto['piloto_nombre'].' '.$piloto['piloto_apellido'].'</td>';
                                  echo '<td>'.$piloto['telefono'].'</td>';
                                  echo '<td>'.$piloto['correo'].'</td>';
                                  echo '<td><button type="button" onclick="borrarReservaPiloto('.$piloto['id_reserva'].','.$idReserva.');" class="btn btn-danger btn-sm" data-toggle="tooltip" data-placement="top" title="Borrar piloto"><i class="fas fa-trash-alt"></i></button></td>';
                                echo '</tr>';
                              }
                            }
                          echo '</tbody>';
                        echo '</table>';
                      echo '</div>';
                    echo '</div>';  
                  echo '</div>';
                echo '</div>';
              echo '</div>';
            }
          }
        }
      }
      
    ?>
  </div>
</main>
<style type="text/css">
  [data-toggle="modal"] .fa:before {  
    font-family: Mdi;
    content: "\F1372";
  }
</style>

<script type="text/javascript">

  $(document).ready(function() {

    if (window.location.search.indexOf('msn=1') > -1) {
      mostrarAlert('alert-borrar-reserva-piloto');
    }else if (window.location.search.indexOf('msn=2') > -1) {
      mostrarAlert('alert-error-borrar-reserva-piloto');
    }else if (window.location.search.indexOf('msn=3') > -1) {
      mostrarAlert('alert-error-sistema');
    }else if (window.location.search.indexOf('msn=4') > -1) {
      mostrarAlert('alert-borrar-reserva');
    }else if (window.location.search.indexOf('msn=5') > -1) {
      mostrarAlert('alert-cambiar-estado');
    }else if (window.location.search.indexOf('msn=6') > -1) {
      mostrarAlert('alert-error-cambiar-estado');
    }

    $('[data-toggle="tooltip"]').tooltip({container: 'body'});
    
    $("#date-input").change();
    
    $('#table-detalles').DataTable({
      "paging":   false,
      "ordering": false,
      "info":     false,
      "searching": false,
      "ordering": false
    });
    
    $('#table-reservas').DataTable({
      "paging":   false,
      "ordering": false,
      "info":     false,
      "searching": false,
      "ordering": false
    });

  });

  /* Cambiar de estado */
  $('.cambiar-estado').change(function(){
  
    var idReserva = this.id;
    var idEstado = $(this).val();

    $.ajax({
      url: '<?= $this->Url->build(['controller'=>'Reservas','action'=>'cambiarEstado']) ?>',
      dataType: 'Json',
      data : {idReserva:idReserva,idEstado:idEstado},
      type: 'POST',
      headers: {
        'X-CSRF-Token': $('[name="_csrfToken"]').val()
      },
      cache:false,
      success: function(data){
        if (data == 1) {
          var url = window.location.href;  
          url = url.split('?')[0];
          window.location.href = url+'?msn=5';
        }else{
          var url = window.location.href;  
          url = url.split('?')[0];
          window.location.href = url+'?msn=6';
        }
      },
      error: function(data){
        var url = window.location.href;  
        url = url.split('?')[0];
        window.location.href = url+'?msn=3';
      }
    });
  });
  
  /* Borrar reserva */ 
  function borrarReserva(idReservaResponsalbe,idHorario,dia){

    $.ajax({
      url: '<?= $this->Url->build(['controller'=>'Reservas','action'=>'borrarReserva']) ?>',
      dataType: 'Json',
      data : {idReservaResponsalbe:idReservaResponsalbe,idHorario:idHorario,dia:dia},
      type: 'POST',
      headers: {
        'X-CSRF-Token': $('[name="_csrfToken"]').val()
      },
      cache:false,
      success: function(data){
        if (data == 1) {
          var url = window.location.href;  
          url = url.split('?')[0];
          window.location.href = url+'?msn=4';
        }else{
          var url = window.location.href;  
          url = url.split('?')[0];
          window.location.href = url+'?msn=2';
        }
      },
      error: function(data){
        var url = window.location.href;  
        url = url.split('?')[0];
        window.location.href = url+'?msn=3';
      }
    });
  }

  /* Borrar piloto */ 
  function borrarReservaPiloto(idReservaPiloto,idReservaResponsalbe){

    $.ajax({
      url: '<?= $this->Url->build(['controller'=>'Reservas','action'=>'borrarReservaPiloto']) ?>',
      dataType: 'Json',
      data : {idReserva:idReservaPiloto},
      type: 'POST',
      headers: {
        'X-CSRF-Token': $('[name="_csrfToken"]').val()
      },
      cache:false,
      success: function(data){
        $('#detalle-'+idReservaResponsalbe).modal('hide');
        if (data == 1) {
          var url = window.location.href;  
          url = url.split('?')[0];
          window.location.href = url+'?msn=1';
        }else{
          var url = window.location.href;  
          url = url.split('?')[0];
          window.location.href = url+'?msn=2';
        }
      },
      error: function(data){
        var url = window.location.href;  
        url = url.split('?')[0];
        window.location.href = url+'?msn=3';
      }
    });
  }

  /* Mostrar alerts */
  function mostrarAlert(alertId){
    $('#'+alertId).show('slow').focus();
      $('#'+alertId).delay(4000).slideUp(200, function() {
        $(this).alert('close');
    });
  }
  
  /* Exportar a xls */
  $('#btn-exportar').click(function(e) {
    e.preventDefault();
    var fecha = $("#date-input").val();
    var href = e.target.getAttribute("href");
    href = href+"?fecha="+fecha;
    location.href = href;
  });

  /* Buscador de reservas */
  $("#date-input").on("change", function() {
    var value = $(this).val().toLowerCase();
    $("#table-reservas tr.cabecera").filter(function() {
      $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
    });
  });

  /* Calendario */
  const picker = new Litepicker({ 
    element: document.getElementById('date-input'),
    inlineMode : false,
    format: 'DD/MM/YYYY',
    lang: 'es',
    startDate : Date(),
    setup: (picker) => {
      picker.on('selected', (date1, date2) => {
        $('#date-input').trigger("change");
      });
    }
  });
</script>