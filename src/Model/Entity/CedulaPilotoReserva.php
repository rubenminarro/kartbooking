<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * CedulaPilotoReserva Entity
 *
 * @property int $id_cedula_piloto_reserva
 * @property int $id_reserva
 * @property string|null $ci
 */
class CedulaPilotoReserva extends Entity
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
        'id_reserva' => true,
        'ci' => true,
    ];
}
