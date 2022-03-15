<?php
declare(strict_types=1);

namespace App\Test\TestCase\Model\Table;

use App\Model\Table\KartsTable;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\KartsTable Test Case
 */
class KartsTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\KartsTable
     */
    protected $Karts;

    /**
     * Fixtures
     *
     * @var array
     */
    protected $fixtures = [
        'app.Karts',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp(): void
    {
        parent::setUp();
        $config = $this->getTableLocator()->exists('Karts') ? [] : ['className' => KartsTable::class];
        $this->Karts = $this->getTableLocator()->get('Karts', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown(): void
    {
        unset($this->Karts);

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
