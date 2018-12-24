<?php
/* @var $this \Cake\View\View */
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('tb_actions');
?>
    <li><?= $this->Html->link(__('New Contato'), ['action' => 'add']); ?></li>
    <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']); ?></li>
    <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']); ?></li>
<?php $this->end(); ?>
<?php $this->assign('tb_sidebar', '<ul class="nav nav-sidebar">' . $this->fetch('tb_actions') . '</ul>'); ?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('id'); ?></th>
            <th><?= $this->Paginator->sort('created'); ?></th>
            <th><?= $this->Paginator->sort('modified'); ?></th>
            <th><?= $this->Paginator->sort('deleted'); ?></th>
            <th><?= $this->Paginator->sort('tipo'); ?></th>
            <th><?= $this->Paginator->sort('contato'); ?></th>
            <th><?= $this->Paginator->sort('cliente_id'); ?></th>
            <th class="actions"><?= __('Actions'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($contatos as $contato): ?>
        <tr>
            <td><?= h($contato->id) ?></td>
            <td><?= h($contato->created) ?></td>
            <td><?= h($contato->modified) ?></td>
            <td><?= h($contato->deleted) ?></td>
            <td><?= h($contato->tipo) ?></td>
            <td><?= h($contato->contato) ?></td>
            <td>
                <?= $contato->has('cliente') ? $this->Html->link($contato->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $contato->cliente->id]) : '' ?>
            </td>
            <td class="actions">
                <?= $this->Html->link('', ['action' => 'view', $contato->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                <?= $this->Html->link('', ['action' => 'edit', $contato->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                <?= $this->Form->postLink('', ['action' => 'delete', $contato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contato->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('previous')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('next') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter() ?></p>
</div>
