<?php
declare(strict_types=1);

namespace App\Test\Fixture;

use Cake\TestSuite\Fixture\TestFixture;

/**
 * CedulaPilotoReservaFixture
 */
class CedulaPilotoReservaFixture extends TestFixture
{
    /**
     * Table name
     *
     * @var string
     */
    public $table = 'cedula_piloto_reserva';
    /**
     * Fields
     *
     * @var array
     */
    // phpcs:disable
    public $fields = [
        'id_cedula_piloto_reserva' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'autoIncrement' => true, 'precision' => null],
        'id_reserva' => ['type' => 'integer', 'length' => null, 'unsigned' => false, 'null' => false, 'default' => null, 'comment' => '', 'precision' => null, 'autoIncrement' => null],
        'ci' => ['type' => 'string', 'length' => 20, 'null' => true, 'default' => null, 'collate' => 'utf8_general_ci', 'comment' => '', 'precision' => null],
        '_indexes' => [
            'fk_id_reserva_idx' => ['type' => 'index', 'columns' => ['id_reserva'], 'length' => []],
        ],
        '_constraints' => [
            'primary' => ['type' => 'primary', 'columns' => ['id_cedula_piloto_reserva'], 'length' => []],
            'fk_id_reserva' => ['type' => 'foreign', 'columns' => ['id_reserva'], 'references' => ['reservas', 'id_reserva'], 'update' => 'noAction', 'delete' => 'noAction', 'length' => []],
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
                'id_cedula_piloto_reserva' => 1,
                'id_reserva' => 1,
                'ci' => 'Lorem ipsum dolor ',
            ],
        ];
        parent::init();
    }
}
