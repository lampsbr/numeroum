<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contato $contato
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('tb_actions');
?>
    <li><?=
    $this->Form->postLink(
        __('Delete'),
        ['action' => 'delete', $contato->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $contato->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Contatos'), ['action' => 'index']) ?></li>
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
        ['action' => 'delete', $contato->id],
        ['confirm' => __('Are you sure you want to delete # {0}?', $contato->id)]
    )
    ?>
    </li>
    <li><?= $this->Html->link(__('List Contatos'), ['action' => 'index']) ?></li>
    <li><?= $this->Html->link(__('List Clientes'), ['controller' => 'Clientes', 'action' => 'index']) ?> </li>
    <li><?= $this->Html->link(__('New Cliente'), ['controller' => 'Clientes', 'action' => 'add']) ?> </li>
</ul>
<?php
$this->end();
?>
<?= $this->Form->create($contato); ?>
<fieldset>
    <legend><?= __('Edit {0}', ['Contato']) ?></legend>
    <?php
    echo $this->Form->control('deleted');
    echo $this->Form->control('tipo');
    echo $this->Form->control('contato');
    echo $this->Form->control('cliente_id', ['options' => $clientes]);
    ?>
</fieldset>
<?= $this->Form->button(__("Save")); ?>
<?= $this->Form->end() ?>
