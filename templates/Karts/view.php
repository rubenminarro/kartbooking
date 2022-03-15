<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Kart $kart
 */
?>
<div class="row">
    <aside class="column">
        <div class="side-nav">
            <h4 class="heading"><?= __('Actions') ?></h4>
            <?= $this->Html->link(__('Edit Kart'), ['action' => 'edit', $kart->id_kart], ['class' => 'side-nav-item']) ?>
            <?= $this->Form->postLink(__('Delete Kart'), ['action' => 'delete', $kart->id_kart], ['confirm' => __('Are you sure you want to delete # {0}?', $kart->id_kart), 'class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('List Karts'), ['action' => 'index'], ['class' => 'side-nav-item']) ?>
            <?= $this->Html->link(__('New Kart'), ['action' => 'add'], ['class' => 'side-nav-item']) ?>
        </div>
    </aside>
    <div class="column-responsive column-80">
        <div class="karts view content">
            <h3><?= h($kart->id_kart) ?></h3>
            <table>
                <tr>
                    <th><?= __('Tipo') ?></th>
                    <td><?= h($kart->tipo) ?></td>
                </tr>
                <tr>
                    <th><?= __('Id Kart') ?></th>
                    <td><?= $this->Number->format($kart->id_kart) ?></td>
                </tr>
            </table>
        </div>
    </div>
</div>
