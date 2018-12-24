<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pagamento $pagamento
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $pagamento->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $pagamento->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Pagamentos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $pagamento->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $pagamento->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Pagamentos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($pagamento); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Pagamento']) ?></legend>
    <?php
    echo $this->Form->control('deleted');
    echo $this->Form->control('valor');
    echo $this->Form->control('meio_pagamento');
    echo $this->Form->control('observacao');
    echo $this->Form->control('cliente_id', ['options' => $clientes]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
