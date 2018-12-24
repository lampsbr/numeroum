<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Venda'), ['action' => 'edit', $venda->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Venda'), ['action' => 'delete', $venda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id)]) ?> </li>
<li><?= $this->Html->link(__('List Vendas'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venda'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Venda'), ['action' => 'edit', $venda->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Venda'), ['action' => 'delete', $venda->id], ['confirm' => __('Are you sure you want to delete # {0}?', $venda->id)]) ?> </li>
<li><?= $this->Html->link(__('List Vendas'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venda'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($venda->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($venda->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Cliente') ?></td>
            <td><?= $venda->has('cliente') ? $this->Html->link($venda->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $venda->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Valor') ?></td>
            <td><?= $this->Number->format($venda->valor) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($venda->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($venda->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($venda->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Observacao') ?></td>
            <td><?= $this->Text->autoParagraph(h($venda->observacao)); ?></td>
        </tr>
    </table>
</div>

