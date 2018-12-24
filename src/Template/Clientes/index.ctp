<?php 
$this->extend('../Layout/TwitterBootstrap/dashboard'); 
$this->start('titulo');
?>
<div class="row">
    <div class="col-xs-12 col-md-3">
        <?='Clientes'?>
    </div>
    <div class="col-xs-9 col-md-7">
        <?php echo $this->Form->create(''); ?>
            <div class="input-group">
                <input type="text" name="busca" class="form-control input-lg" placeholder="Buscar" value="<?=($busca?$busca:'')?>" />
                <span class="input-group-btn">
                    <button class="btn btn-info btn-lg" type="submit">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
            </div>
        <?php echo $this->Form->end(); ?>
    </div>
    <div class="col-xs-3 col-md-2">
        <?php echo $this->Html->link('', ['action' => 'add'], ['title' => 'Adicionar cliente', 'class' => 'btn btn-default btn-lg glyphicon glyphicon-plus pull-right']); ?>
    </div>
</div>
<?php $this->end(); ?>
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
