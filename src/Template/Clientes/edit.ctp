<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('titulo');
echo 'Editar cliente';
$this->end();
?>
<?= $this->Form->create($cliente); ?>
<fieldset>
    <?php
    echo $this->Form->control('nome');
    echo $this->Form->control('observacoes');
    echo $this->Form->control('saldo_devedor');
    echo $this->Form->hidden('user_id');
    ?>
</fieldset>
<?= $this->Form->button(__("Alterar")); ?>
<?= $this->Form->end() ?>
