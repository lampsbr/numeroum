<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Pagamento $pagamento
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('titulo');
echo 'Cadastrar pagamento';
$this->end();
?>
<?= $this->Form->create($pagamento); ?>
<fieldset>
    <?php
    echo $this->Form->control('valor');
    echo $this->Form->label('meio_pagamento', 'Meio de pagamento');
    echo $this->Form->select('meio_pagamento',['dinheiro' => 'dinheiro', 'débito' => 'débito', 'crédito' => 'crédito'],['value' => 'dinheiro']);
    echo $this->Form->control('observacao');
    echo $this->Form->hidden('cliente_id');
    ?>
</fieldset>
<?= $this->Form->button(__("Cadastrar")); ?>
<?= $this->Form->end() ?>
