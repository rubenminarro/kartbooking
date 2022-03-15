<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Piloto $piloto
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Piloto'), ['action' => 'edit', $piloto->id_piloto], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Piloto'), ['action' => 'delete', $piloto->id_piloto], ['confirm' => __('Are you sure you want to delete # {0}?', $piloto->id_piloto), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Pilotos'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Piloto'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="pilotos view content">
            <h3><?= h($piloto->id_piloto) ?></h3>
            <table>
                <tr>
                    <th><?= __('Ci') ?></th>
                    <td><?= h($piloto->ci) ?></td>
                </tr>
                <tr>
                    <th><?= __('Nombre') ?></th>
                    <td><?= h($piloto->nombre) ?></td>
                </tr>
                <tr>
                    <th><?= __('Apellido') ?></th>
                    <td><?= h($piloto->apellido) ?></td>
                </tr>
                <tr>
                    <th><?= __('Correo') ?></th>
                    <td><?= h($piloto->correo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Telefono') ?></th>
                    <td><?= h($piloto->telefono) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Piloto') ?></th>
                    <td><?= $this->Number->format($piloto->id_piloto) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
