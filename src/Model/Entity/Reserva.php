<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Reserva Entity
 *
 * @property int $id_reserva
 * @property int $id_piloto
 * @property int $id_piloto_responsable
 * @property int $id_horario
 * @property int $id_estado
 * @property int $id_kart
 * @property string $dia
 */
class Reserva extends Entity
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
        'id_piloto' => true,
        'id_piloto_responsable' => true,
        'id_horario' => true,
        'id_estado' => true,
        'id_kart' => true,
        'dia' => true,
    ];
}
