<?php
/**
 * @var \App\View\AppView $this
 * @var \App\Model\Entity\Contato $contato
 */
?>
<?php
$this->extend('../Layout/TwitterBootstrap/dashboard');
$this->start('titulo');
echo 'Adicionar contato';
$this->end();
?>
<?= $this->Form->create($contato); ?>
<fieldset>
    <?php
    echo $this->Form->label('tipo', 'Tipo de contato');
    echo $this->Form->select('tipo',['telefone' => 'telefone','email' => 'email','pessoa' => 'pessoa'],['value' => 'telefone']);
    echo $this->Form->control('contato');
    echo $this->Form->hidden('cliente_id');
    ?>
</fieldset>
<?= $this->Form->button('Cadastrar'); ?>
<?= $this->Form->end() ?>
