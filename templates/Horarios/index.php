<main role="main" class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
			<?= $this->Flash->render() ?>
		</div>
	</div>
	<div class="card text-white bg-secondary mb-2">
		<div class="card-header">
			<h4 class="float-left">Horarios</h4>
			<?= $this->Html->link(__('<i class="fas fa-plus-square"></i>'), ['action' => 'add'], ['class'=>'btn btn-outline-light float-right','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Agregar nuevo horario']); ?>
		</div>
	</div>
	<div class="table-responsive mb-4">
		<table id="table-horarios" class="table table-hover">
			<thead>
				<tr>
					<th class="text-center">Horario</th>
					<th>Inicio</th>
					<th>Fin</th>
					<th class="text-center">Estado</th>
					<th class="text-center">Cantidad</th>
					<th class="text-center"></th>
				</tr>
			</thead>
			<tbody>
      <?php foreach ($horarios as $horario): ?>
        <tr>
          <td class="text-center"><b><?= $this->Number->format($horario->id_horario) ?></b></td>
          <td><?= h($horario->inicio) ?></td>
          <td><?= h($horario->fin) ?></td>
					<td class="text-center"><?= h($horario->estado) ?></td>
          <td class="text-center"><?= $this->Number->format($horario->cantidad) ?></td>
          <td class="text-center">
						<?= $this->Html->link(__('<i class="fas fa-pen-square"></i>'), ['action' => 'edit', $horario->id_horario], ['class'=>'btn btn-outline-secondary','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Editar horario']); ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
	</div>
</main>

<script type="text/javascript">
	$(document).ready(function() {
		$('#table-horarios').DataTable({
      "ordering": false,
			"language": {
      	"url": "../js/Spanish.json"
      }
    });
		$('[data-toggle="tooltip"]').tooltip();
  });
</script>