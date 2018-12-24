<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Contato'), ['action' => 'edit', $contato->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contato'), ['action' => 'delete', $contato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contato->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contatos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contato'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Contato'), ['action' => 'edit', $contato->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Contato'), ['action' => 'delete', $contato->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contato->id)]) ?> </li>
<li><?= $this->Html->link(__('List Contatos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contato'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($contato->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($contato->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Tipo') ?></td>
            <td><?= h($contato->tipo) ?></td>
        </tr>
        <tr>
            <td><?= __('Contato') ?></td>
            <td><?= h($contato->contato) ?></td>
        </tr>
        <tr>
            <td><?= __('Cliente') ?></td>
            <td><?= $contato->has('cliente') ? $this->Html->link($contato->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $contato->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($contato->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($contato->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($contato->deleted) ?></td>
        </tr>
    </table>
</div>

