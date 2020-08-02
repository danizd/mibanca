<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\CadenasCategoriaTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\CadenasCategoriaTable Test Case
 */
class CadenasCategoriaTableTest extends TestCase
{
    /**
     * Test subject
     *
     * @var \App\Model\Table\CadenasCategoriaTable
     */
    public $CadenasCategoria;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.CadenasCategoria',
        'app.Categorias',
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::getTableLocator()->exists('CadenasCategoria') ? [] : ['className' => CadenasCategoriaTable::class];
        $this->CadenasCategoria = TableRegistry::getTableLocator()->get('CadenasCategoria', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->CadenasCategoria);

        parent::tearDown();
    }

    /**
     * Test initialize method
     *
     * @return void
     */
    public function testInitialize()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test validationDefault method
     *
     * @return void
     */
    public function testValidationDefault()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }

    /**
     * Test buildRules method
     *
     * @return void
     */
    public function testBuildRules()
    {
        $this->markTestIncomplete('Not implemented yet.');
    }
}
