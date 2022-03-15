<main role="main" class="container">
	<div class="row">
		<div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 mx-auto">
			<?= $this->Flash->render() ?>
		</div>
	</div>
	<div class="card text-white bg-secondary mb-2">
		<div class="card-header">
			<h4 class="float-left">Usuarios</h4>
			<?= $this->Html->link(__('<i class="fas fa-plus-square"></i>'), ['action' => 'add'], ['class'=>'btn btn-outline-light float-right','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Agregar nuevo usuario']); ?>
		</div>
	</div>
	<div class="table-responsive mb-4">
		<table id="table-usuarios" class="table table-hover">
			<thead>
				<tr>
					<th class="text-center">Usuario</th>
					<th>Username</th>
					<th>Correo</th>
					<th class="text-center">Estado</th>
					<th class="text-center"></th>
				</tr>
			</thead>
			<tbody>
      <?php foreach ($usuarios as $usuario): ?>
        <tr>
          <td class="text-center"><b><?= $this->Number->format($usuario->id_user) ?></b></td>
          <td><?= h($usuario->username) ?></td>
          <td><?= h($usuario->email) ?></td>
					<td class="text-center"><?= h($usuario->estado) ?></td>
          <td class="text-center">
						<?= $this->Html->link(__('<i class="fas fa-pen-square"></i>'), ['action' => 'edit', $usuario->id_user], ['class'=>'btn btn-outline-secondary','type'=>'button','escape'=>false,'data-toggle'=>'tooltip','data-placement'=>'top','title'=>'Editar usuario']); ?>
          </td>
        </tr>
      <?php endforeach; ?>
      </tbody>
    </table>
	</div>
</main>

<script type="text/javascript">
	$(document).ready(function() {
		$('#table-usuarios').DataTable({
      "ordering": false,
			"language": {
      	"url": "../js/Spanish.json"
      }
    });
		$('[data-toggle="tooltip"]').tooltip();
  });
</script>