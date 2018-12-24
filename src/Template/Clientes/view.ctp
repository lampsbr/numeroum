<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');


$this->start('tb_actions');
?>
<li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
<li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Contatos'), ['controller' => 'Contatos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contato'), ['controller' => 'Contatos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Pagamentos'), ['controller' => 'Pagamentos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Pagamento'), ['controller' => 'Pagamentos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
<li><?= $this->Html->link(__('Edit Cliente'), ['action' => 'edit', $cliente->id]) ?> </li>
<li><?= $this->Form->postLink(__('Delete Cliente'), ['action' => 'delete', $cliente->id], ['confirm' => __('Are you sure you want to delete # {0}?', $cliente->id)]) ?> </li>
<li><?= $this->Html->link(__('List Clientes'), ['action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Cliente'), ['action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Users'), ['controller' => 'Users', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New User'), ['controller' => 'Users', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Contatos'), ['controller' => 'Contatos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Contato'), ['controller' => 'Contatos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Pagamentos'), ['controller' => 'Pagamentos', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Pagamento'), ['controller' => 'Pagamentos', 'action' => 'add']) ?> </li>
<li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
<li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= h($cliente->id) ?></h3>
    </div>
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Id') ?></td>
            <td><?= h($cliente->id) ?></td>
        </tr>
        <tr>
            <td><?= __('Nome') ?></td>
            <td><?= h($cliente->nome) ?></td>
        </tr>
        <tr>
            <td><?= __('User') ?></td>
            <td><?= $cliente->has('user') ? $this->Html->link($cliente->user->id, ['controller' => 'Users', 'action' => 'view', $cliente->user->id]) : '' ?></td>
        </tr>
        <tr>
            <td><?= __('Saldo Devedor') ?></td>
            <td><?= $this->Number->format($cliente->saldo_devedor) ?></td>
        </tr>
        <tr>
            <td><?= __('Created') ?></td>
            <td><?= h($cliente->created) ?></td>
        </tr>
        <tr>
            <td><?= __('Modified') ?></td>
            <td><?= h($cliente->modified) ?></td>
        </tr>
        <tr>
            <td><?= __('Deleted') ?></td>
            <td><?= h($cliente->deleted) ?></td>
        </tr>
        <tr>
            <td><?= __('Observacoes') ?></td>
            <td><?= $this->Text->autoParagraph(h($cliente->observacoes)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Contatos') ?></h3>
    </div>
    <?php if (!empty($cliente->contatos)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Tipo') ?></th>
                <th><?= __('Contato') ?></th>
                <th><?= __('Cliente Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cliente->contatos as $contatos): ?>
                <tr>
                    <td><?= h($contatos->id) ?></td>
                    <td><?= h($contatos->created) ?></td>
                    <td><?= h($contatos->modified) ?></td>
                    <td><?= h($contatos->deleted) ?></td>
                    <td><?= h($contatos->tipo) ?></td>
                    <td><?= h($contatos->contato) ?></td>
                    <td><?= h($contatos->cliente_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Contatos', 'action' => 'view', $contatos->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Contatos', 'action' => 'edit', $contatos->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Contatos', 'action' => 'delete', $contatos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $contatos->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Contatos</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Pagamentos') ?></h3>
    </div>
    <?php if (!empty($cliente->pagamentos)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Valor') ?></th>
                <th><?= __('Meio Pagamento') ?></th>
                <th><?= __('Observacao') ?></th>
                <th><?= __('Cliente Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cliente->pagamentos as $pagamentos): ?>
                <tr>
                    <td><?= h($pagamentos->id) ?></td>
                    <td><?= h($pagamentos->created) ?></td>
                    <td><?= h($pagamentos->modified) ?></td>
                    <td><?= h($pagamentos->deleted) ?></td>
                    <td><?= h($pagamentos->valor) ?></td>
                    <td><?= h($pagamentos->meio_pagamento) ?></td>
                    <td><?= h($pagamentos->observacao) ?></td>
                    <td><?= h($pagamentos->cliente_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Pagamentos', 'action' => 'view', $pagamentos->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Pagamentos', 'action' => 'edit', $pagamentos->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Pagamentos', 'action' => 'delete', $pagamentos->id], ['confirm' => __('Are you sure you want to delete # {0}?', $pagamentos->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Pagamentos</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <h3 class="panel-title"><?= __('Related Vendas') ?></h3>
    </div>
    <?php if (!empty($cliente->vendas)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Id') ?></th>
                <th><?= __('Created') ?></th>
                <th><?= __('Modified') ?></th>
                <th><?= __('Deleted') ?></th>
                <th><?= __('Observacao') ?></th>
                <th><?= __('Cliente Id') ?></th>
                <th class="actions"><?= __('Actions') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cliente->vendas as $vendas): ?>
                <tr>
                    <td><?= h($vendas->id) ?></td>
                    <td><?= h($vendas->created) ?></td>
                    <td><?= h($vendas->modified) ?></td>
                    <td><?= h($vendas->deleted) ?></td>
                    <td><?= h($vendas->observacao) ?></td>
                    <td><?= h($vendas->cliente_id) ?></td>
                    <td class="actions">
                        <?= $this->Html->link('', ['controller' => 'Vendas', 'action' => 'view', $vendas->id], ['title' => __('View'), 'class' => 'btn btn-default glyphicon glyphicon-eye-open']) ?>
                        <?= $this->Html->link('', ['controller' => 'Vendas', 'action' => 'edit', $vendas->id], ['title' => __('Edit'), 'class' => 'btn btn-default glyphicon glyphicon-pencil']) ?>
                        <?= $this->Form->postLink('', ['controller' => 'Vendas', 'action' => 'delete', $vendas->id], ['confirm' => __('Are you sure you want to delete # {0}?', $vendas->id), 'title' => __('Delete'), 'class' => 'btn btn-default glyphicon glyphicon-trash']) ?>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">no related Vendas</p>
    <?php endif; ?>
</div>
