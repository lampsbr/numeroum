<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Cliente $cliente
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');

$this->start('titulo');
echo 'Cadastrar cliente';
$this->end();
?>
<?= $this->Form->create($cliente); ?>
<fieldset>
    <?php
    echo $this->Form->control('nome');
    echo $this->Form->control('observacoes');
    echo $this->Form->control('saldo_devedor');
    ?>
</fieldset>
<?= $this->Form->button(__("Cadastrar")); ?>
<?= $this->Form->end() ?>
