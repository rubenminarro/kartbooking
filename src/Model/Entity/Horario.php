<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Horario Entity
 *
 * @property int $id_horario
 * @property int $id_estado
 * @property string $inicio
 * @property string $fin
 * @property int $cantidad
 */
class Horario extends Entity
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
        'id_estado' => true,
        'inicio' => true,
        'fin' => true,
        'cantidad' => true,
    ];
}
