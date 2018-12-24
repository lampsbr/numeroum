<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
<li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Item'), ['action' => 'edit', $item->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Item'), ['action' => 'delete', $item->id], ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]) ?> </li>
<li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Item'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($item->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($item->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Descricao') ?></td>
            <td><?= h($item->descricao) ?></td>
        </tr>
        <tr>
            <td><?= __('Venda') ?></td>
            <td><?= $item->has('venda') ? $this->Html->link($item->venda->id, ['controller' => 'Vendas', 'action' => 'view', $item->venda->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Valor') ?></td>
            <td><?= $this->Number->format($item->valor) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($item->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($item->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($item->deleted) ?></td>
        </tr>
    </table>
</div>

