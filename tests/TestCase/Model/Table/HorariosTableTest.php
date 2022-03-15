<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\HorariosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\HorariosTable Test Case
 */
class HorariosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\HorariosTable
     */
    protected $Horarios;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Horarios',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Horarios') ? [] : ['className' => HorariosTable::class];
        $this->Horarios = $this->getTableLocator()->get('Horarios', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Horarios);

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
