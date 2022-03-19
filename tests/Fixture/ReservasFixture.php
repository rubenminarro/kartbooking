<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * ReservasFixture
 */
class ReservasFixture extends TestFixture
{
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id_reserva' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_piloto' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_horario' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_estado' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'id_kart' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'dia' => ['type' => 'string', 'length' => 10, 'null' => false, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        'cantidad' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        '_indexes' => [
            'fk_id_piloto_idx' => ['type' => 'index', 'columns' => ['id_piloto'], 'length' => []],
            'fk_id_horario_idx' => ['type' => 'index', 'columns' => ['id_horario'], 'length' => []],
            'fk_id__idx' => ['type' => 'index', 'columns' => ['id_estado'], 'length' => []],
            'fk_id_kart_idx' => ['type' => 'index', 'columns' => ['id_kart'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_reserva'], 'length' => []],
            'reservas_UN' => ['type' => 'unique', 'columns' => ['id_piloto', 'id_horario', 'dia'], 'length' => []],
            'fk_id_estado2' => ['type' => 'foreign', 'columns' => ['id_estado'], 'references' => ['estados', 'id_estado'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_id_horario' => ['type' => 'foreign', 'columns' => ['id_horario'], 'references' => ['horarios', 'id_horario'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_id_kart' => ['type' => 'foreign', 'columns' => ['id_kart'], 'references' => ['karts', 'id_kart'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
            'fk_id_piloto' => ['type' => 'foreign', 'columns' => ['id_piloto'], 'references' => ['pilotos', 'id_piloto'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
        ],
        '_options' => [
            'engine' => 'InnoDB',
            'collation' => 'utf8_general_ci'
        ],
    ];
    // phpcs:enable
    /**
     * Init method
     *
     * @return void
     */
    public function init(): void
    {
        $this->records = [
            [
                'id_reserva' => 1,
                'id_piloto' => 1,
                'id_horario' => 1,
                'id_estado' => 1,
                'id_kart' => 1,
                'dia' => 'Lorem ip',
                'cantidad' => 1,
            ],
        ];
        parent::init();
    }
}
