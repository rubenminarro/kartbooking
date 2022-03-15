<?php
declare(strict_types=1);

namespace App\Model\Entity;

use Cake\ORM\Entity;

/**
 * Piloto Entity
 *
 * @property int $id_piloto
 * @property string $ci
 * @property string $nombre
 * @property string $apellido
 * @property string $correo
 * @property string $telefono
 */
class Piloto extends Entity
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
        'ci' => true,
        'nombre' => true,
        'apellido' => true,
        'correo' => true,
        'telefono' => true,
    ];
}
