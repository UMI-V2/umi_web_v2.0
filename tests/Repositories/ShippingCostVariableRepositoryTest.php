<?php namespace Tests\Repositories;

use App\Models\ShippingCostVariable;
use App\Repositories\ShippingCostVariableRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ShippingCostVariableRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ShippingCostVariableRepository
     */
    protected $shippingCostVariableRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shippingCostVariableRepo = \App::make(ShippingCostVariableRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shipping_cost_variable()
    {
        $shippingCostVariable = ShippingCostVariable::factory()->make()->toArray();

        $createdShippingCostVariable = $this->shippingCostVariableRepo->create($shippingCostVariable);

        $createdShippingCostVariable = $createdShippingCostVariable->toArray();
        $this->assertArrayHasKey('id', $createdShippingCostVariable);
        $this->assertNotNull($createdShippingCostVariable['id'], 'Created ShippingCostVariable must have id specified');
        $this->assertNotNull(ShippingCostVariable::find($createdShippingCostVariable['id']), 'ShippingCostVariable with given id must be in DB');
        $this->assertModelData($shippingCostVariable, $createdShippingCostVariable);
    }

    /**
     * @test read
     */
    public function test_read_shipping_cost_variable()
    {
        $shippingCostVariable = ShippingCostVariable::factory()->create();

        $dbShippingCostVariable = $this->shippingCostVariableRepo->find($shippingCostVariable->id);

        $dbShippingCostVariable = $dbShippingCostVariable->toArray();
        $this->assertModelData($shippingCostVariable->toArray(), $dbShippingCostVariable);
    }

    /**
     * @test update
     */
    public function test_update_shipping_cost_variable()
    {
        $shippingCostVariable = ShippingCostVariable::factory()->create();
        $fakeShippingCostVariable = ShippingCostVariable::factory()->make()->toArray();

        $updatedShippingCostVariable = $this->shippingCostVariableRepo->update($fakeShippingCostVariable, $shippingCostVariable->id);

        $this->assertModelData($fakeShippingCostVariable, $updatedShippingCostVariable->toArray());
        $dbShippingCostVariable = $this->shippingCostVariableRepo->find($shippingCostVariable->id);
        $this->assertModelData($fakeShippingCostVariable, $dbShippingCostVariable->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shipping_cost_variable()
    {
        $shippingCostVariable = ShippingCostVariable::factory()->create();

        $resp = $this->shippingCostVariableRepo->delete($shippingCostVariable->id);

        $this->assertTrue($resp);
        $this->assertNull(ShippingCostVariable::find($shippingCostVariable->id), 'ShippingCostVariable should not exist in DB');
    }
}
