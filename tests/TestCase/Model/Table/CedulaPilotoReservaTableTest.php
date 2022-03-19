<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CedulaPilotoReservaTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CedulaPilotoReservaTable Test Case
 */
class CedulaPilotoReservaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CedulaPilotoReservaTable
     */
    protected $CedulaPilotoReservaTable;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.CedulaPilotoReserva',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('CedulaPilotoReserva') ? [] : ['className' => CedulaPilotoReservaTable::class];
        $this->CedulaPilotoReservaTable = $this->getTableLocator()->get('CedulaPilotoReserva', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->CedulaPilotoReservaTable);

        parent::tearDown();
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
