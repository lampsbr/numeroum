<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Item $item
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $item->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
<?php
$this->end();

$this->start('tb_sidebar');
?>
<ul class="nav nav-sidebar">
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $item->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $item->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Items'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Vendas'), ['controller' => 'Vendas', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Venda'), ['controller' => 'Vendas', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($item); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Item']) ?></legend>
    <?php
    echo $this->Form->control('deleted');
    echo $this->Form->control('valor');
    echo $this->Form->control('descricao');
    echo $this->Form->control('venda_id', ['options' => $vendas]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
