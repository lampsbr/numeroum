<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Pagamento'), ['action' => 'edit', $pagamento->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Pagamento'), ['action' => 'delete', $pagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagamento->id)]) ?> </li>
<li><?= $this->Html->link(__('List Pagamentos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Pagamento'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Pagamento'), ['action' => 'edit', $pagamento->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Pagamento'), ['action' => 'delete', $pagamento->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagamento->id)]) ?> </li>
<li><?= $this->Html->link(__('List Pagamentos'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Pagamento'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($pagamento->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($pagamento->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Meio Pagamento') ?></td>
            <td><?= h($pagamento->meio_pagamento) ?></td>
        </tr>
        <tr>
            <td><?= __('Cliente') ?></td>
            <td><?= $pagamento->has('cliente') ? $this->Html->link($pagamento->cliente->id, ['controller' => 'Clientes', 'action' => 'view', $pagamento->cliente->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Valor') ?></td>
            <td><?= $this->Number->format($pagamento->valor) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($pagamento->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($pagamento->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($pagamento->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Observacao') ?></td>
            <td><?= $this->Text->autoParagraph(h($pagamento->observacao)); ?></td>
        </tr>
    </table>
</div>

