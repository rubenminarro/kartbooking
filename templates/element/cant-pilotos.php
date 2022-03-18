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
          <b>Alquiler Standard Kart:</b>
          <hr style="margin-bottom: 5px;">
          <p class="text-left text-truncate">Una opción perfecta para adultos que quieres divertirse sin prisa.</p>
        </button>
      </div>
    </div>

    <div class="row">
      <div class="col">
        <button id="kart-ninos" type="button" value="2" class="tipo-kart btn btn-block btn-outline-danger text-left mb-2">
          <?= $this->Html->image('kart_ninos.jpg', ['alt' => 'Super Karts', 'class'=>'img-fluid img-kartings']) ?>
          <b>Alquiler Infantil Kart:</b>
          <hr style="margin-bottom: 5px;">
          <p class="text-left text-truncate">Para iniciarse en el mundo de los Karts, un Kart Infantil es un Kart sencillo y divertido.</p>
        </button>
      </div>
    </div>

  </div>
  <button id="pt1" type="button" name="next" class="next action-button text-right btn btn-danger" disabled/>Siguiente</button>
</fieldset>