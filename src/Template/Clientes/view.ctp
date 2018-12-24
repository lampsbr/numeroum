<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('titulo');
echo $cliente->nome;
echo $this->Form->postLink('', ['action' => 'delete', $cliente->id], ['confirm' => __('Quer mesmo apagar esta cliente?'), 'title' => __('Apagar'), 'class' => 'btn btn-default btn-lg glyphicon glyphicon-trash pull-right']);
echo $this->Html->link('', ['action' => 'edit', $cliente->id], ['title' => __('Editar'), 'class' => 'btn btn-default btn-lg glyphicon glyphicon-pencil pull-right']);
$this->end();
?>
<div class="panel panel-default">
    <table class="table table-striped" cellpadding="0" cellspacing="0">
        <tr>
            <td><?= __('Saldo Devedor') ?></td>
            <td><?= $this->Number->format($cliente->saldo_devedor) ?></td>
        </tr>
        <tr>
            <td><?= __('Cadastrada em') ?></td>
            <td><?= $cliente->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ?></td>
        </tr>
        <tr>
            <td><?= __('Alterada pela última vez em') ?></td>
            <td><?= $cliente->modified?$cliente->modified->i18nFormat('dd-MM-yyyy HH:mm:ss'):'' ?></td>
        </tr>
        <tr>
            <td><?= __('Observações') ?></td>
            <td><?= $this->Text->autoParagraph(h($cliente->observacoes)); ?></td>
        </tr>
    </table>
</div>

<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <p>
            <b>Contatos</b>
            <?php echo $this->Html->link(' Adicionar', ['controller' => 'contatos', 'action' => 'add', $cliente->id], ['title' => 'Adicionar contato', 'class' => 'btn btn-default btn-sm glyphicon glyphicon-plus pull-right']); ?>
        </p>
    </div>
    <?php if (!empty($cliente->contatos)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cliente->contatos as $contatos): ?>
                <tr>
                    <td><?= h($contatos->contato) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">Sem contatos cadastrados até agora</p>
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
