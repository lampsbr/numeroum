<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Pagamento Entity
 *
 * @property string $id
 * @property \Cake\I18n\FrozenTime $created
 * @property \Cake\I18n\FrozenTime|null $modified
 * @property \Cake\I18n\FrozenTime|null $deleted
 * @property float $valor
 * @property string|null $meio_pagamento
 * @property string|null $observacao
 * @property string $cliente_id
 *
 * @property \App\Model\Entity\Cliente $cliente
 */
class Pagamento extends Entity
{

    /**
     * Fields that can be mass assigned using newEntity() or patchEntity().
     *
     * Note that when '*' is set to true, this allows all unspecified fields to
     * be mass assigned. For security purposes, it is advised to set '*' to false
     * (or remove it), and explicitly make individual fields accessible as needed.
     *
     * @var array
     */
    protected $_accessible = [
        'created' => true,
        'modified' => true,
        'deleted' => true,
        'valor' => true,
        'meio_pagamento' => true,
        'observacao' => true,
        'cliente_id' => true,
        'cliente' => true
    ];
}
