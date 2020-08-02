<?php
namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Movimiento Entity
 *
 * @property int $id
 * @property string $concepto
 * @property string $conceptoAmpliado
 * @property float $importe
 * @property \Cake\I18n\FrozenDate $fechaCtble
 * @property int $categorias_id
 *
 * @property \App\Model\Entity\Categoria $categoria
 */
class Movimiento extends Entity
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
        'concepto' => true,
        'conceptoAmpliado' => true,
        'importe' => true,
        'fechaCtble' => true,
        'categorias_id' => true,
        'categoria' => true,
        'archivo' => true,
    ];
}
