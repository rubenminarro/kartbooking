<main role="main" class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
			<?= $this->Flash->render() ?>
		</div>
	</div>
	<div class="card text-white bg-secondary mb-2">
		<div class="card-header">
			<h4 class="float-left">Estados</h4>
			<?= $this->Html->link(__('<i class="fas fa-plus-square"></i>'), ['action' => 'add'], ['class'=>'btn btn-outline-light float-right','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Agregar nuevo estado']); ?>
		</div>
	</div>
	<div class="table-responsive mb-4">
		<table id="table-estados" class="table table-hover">
			<thead>
				<tr>
					<th class="text-center">Id</th>
					<th>Estado</th>
					<th class="text-center"></th>
				</tr>
			</thead>
			<tbody>
      <?php foreach ($estados as $estado): ?>
        <tr>
          <td class="text-center"><b><?= $this->Number->format($estado->id_estado) ?></b></td>
          <td><?= h($estado->descripcion) ?></td>
          <td class="text-center">
						<?= $this->Html->link(__('<i class="fas fa-pen-square"></i>'), ['action' => 'edit', $estado->id_estado], ['class'=>'btn btn-outline-secondary','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Editar estado']); ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
	</div>
</main>

<script type="text/javascript">
	$(document).ready(function() {
		$('#table-estados').DataTable({
      "ordering": false,
			"language": {
      	"url": "../js/Spanish.json"
      }
    });
		$('[data-toggle="tooltip"]').tooltip();
  });
</script>