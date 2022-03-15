<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\PilotosTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\PilotosTable Test Case
 */
class PilotosTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\PilotosTable
     */
    protected $Pilotos;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Pilotos',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Pilotos') ? [] : ['className' => PilotosTable::class];
        $this->Pilotos = $this->getTableLocator()->get('Pilotos', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Pilotos);

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

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules(): void
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
