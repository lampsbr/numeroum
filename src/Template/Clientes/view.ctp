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
            <td><?= $this->Number->currency($cliente->saldo_devedor) ?></td>
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
        <p>
            <b>Pagamentos (10 mais recentes)</b>
            <?php echo $this->Html->link(' Adicionar', ['controller' => 'pagamentos', 'action' => 'add', $cliente->id], ['title' => 'Adicionar contato', 'class' => 'btn btn-default btn-sm glyphicon glyphicon-plus pull-right']); ?>
        </p>
    </div>
    <?php if (!empty($cliente->pagamentos)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Data') ?></th>
                <th><?= __('Valor') ?></th>
                <th><?= __('Meio de Pagamento') ?></th>
                <th><?= __('Observacao') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cliente->pagamentos as $pagamentos): ?>
                <tr>
                    <td><?= $pagamentos->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ?></td>
                    <td><?= $this->Number->currency($pagamentos->valor) ?></td>
                    <td><?= h($pagamentos->meio_pagamento) ?></td>
                    <td><?= h($pagamentos->observacao) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">Nenhum pagamento cadastrado</p>
    <?php endif; ?>
</div>
<div class="panel panel-default">
    <!-- Panel header -->
    <div class="panel-heading">
        <p>
            <b>Vendas (10 mais recentes)</b>
            <?php echo $this->Html->link(' Adicionar', ['controller' => 'vendas', 'action' => 'add', $cliente->id], ['title' => 'Adicionar venda', 'class' => 'btn btn-default btn-sm glyphicon glyphicon-plus pull-right']); ?>
        </p>
    </div>
    <?php if (!empty($cliente->vendas)): ?>
        <table class="table table-striped">
            <thead>
            <tr>
                <th><?= __('Data') ?></th>
                <th><?= __('Observacao') ?></th>
                <th><?= __('Valor') ?></th>
            </tr>
            </thead>
            <tbody>
            <?php foreach ($cliente->vendas as $vendas): ?>
                <tr>
                    <td><?= $vendas->created->i18nFormat('dd-MM-yyyy HH:mm:ss') ?></td>
                    <td><?= h($vendas->observacao) ?></td>
                    <td><?= h($vendas->valor) ?></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    <?php else: ?>
        <p class="panel-body">Nenhuma venda cadastrada</p>
    <?php endif; ?>
</div>
