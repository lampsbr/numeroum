<?php 
$this->extend('../Layout/TwitterBootstrap/dashboard'); 
$this->start('titulo');
echo 'Clientes';
echo $this->Html->link('', ['action' => 'add'], ['title' => 'Adicionar cliente', 'class' => 'btn btn-default btn-lg glyphicon glyphicon-plus pull-right']);
$this->end();
?>

<table class="table table-striped" cellpadding="0" cellspacing="0">
    <thead>
        <tr>
            <th><?= $this->Paginator->sort('nome'); ?></th>
            <th><?= $this->Paginator->sort('saldo_devedor'); ?></th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($clientes as $cliente): ?>
        <tr>
            <td>
                <?= $this->Html->link($cliente->nome, ['action' => 'view', $cliente->id]) ?>
            </td>
            <td><?= $this->Number->format($cliente->saldo_devedor) ?></td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>
<div class="paginator">
    <ul class="pagination">
        <?= $this->Paginator->prev('< ' . __('anterior')) ?>
        <?= $this->Paginator->numbers(['before' => '', 'after' => '']) ?>
        <?= $this->Paginator->next(__('próxima') . ' >') ?>
    </ul>
    <p><?= $this->Paginator->counter('página {{page}} de {{pages}}') ?></p>
</div>
