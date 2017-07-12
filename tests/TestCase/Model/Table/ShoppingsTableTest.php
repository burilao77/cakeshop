<?php
namespace App\Test\TestCase\Model\Table;

use App\Model\Table\ShoppingsTable;
use Cake\ORM\TableRegistry;
use Cake\TestSuite\TestCase;

/**
 * App\Model\Table\ShoppingsTable Test Case
 */
class ShoppingsTableTest extends TestCase
{

    /**
     * Test subject
     *
     * @var \App\Model\Table\ShoppingsTable
     */
    public $Shoppings;

    /**
     * Fixtures
     *
     * @var array
     */
    public $fixtures = [
        'app.shoppings',
        'app.products',
        'app.products_shoppings'
    ];

    /**
     * setUp method
     *
     * @return void
     */
    public function setUp()
    {
        parent::setUp();
        $config = TableRegistry::exists('Shoppings') ? [] : ['className' => ShoppingsTable::class];
        $this->Shoppings = TableRegistry::get('Shoppings', $config);
    }

    /**
     * tearDown method
     *
     * @return void
     */
    public function tearDown()
    {
        unset($this->Shoppings);

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
}
