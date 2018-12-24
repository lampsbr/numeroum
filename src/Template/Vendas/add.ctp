<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Venda $venda
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('titulo');
echo 'Cadastrar venda';
$this->end();
?>
<?= $this->Form->create($venda); ?>
<fieldset>
    <?php
    echo $this->Form->control('observacao');
    echo $this->Form->hidden('cliente_id');
    echo $this->Form->control('valor');
    ?>
</fieldset>
<?= $this->Form->button(__("Cadastrar")); ?>
<?= $this->Form->end() ?>
