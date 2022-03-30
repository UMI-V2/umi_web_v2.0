<?php namespace Tests\Repositories;

use App\Models\ShippingUsed;
use App\Repositories\ShippingUsedRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class ShippingUsedRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var ShippingUsedRepository
     */
    protected $shippingUsedRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->shippingUsedRepo = \App::make(ShippingUsedRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_shipping_used()
    {
        $shippingUsed = ShippingUsed::factory()->make()->toArray();

        $createdShippingUsed = $this->shippingUsedRepo->create($shippingUsed);

        $createdShippingUsed = $createdShippingUsed->toArray();
        $this->assertArrayHasKey('id', $createdShippingUsed);
        $this->assertNotNull($createdShippingUsed['id'], 'Created ShippingUsed must have id specified');
        $this->assertNotNull(ShippingUsed::find($createdShippingUsed['id']), 'ShippingUsed with given id must be in DB');
        $this->assertModelData($shippingUsed, $createdShippingUsed);
    }

    /**
     * @test read
     */
    public function test_read_shipping_used()
    {
        $shippingUsed = ShippingUsed::factory()->create();

        $dbShippingUsed = $this->shippingUsedRepo->find($shippingUsed->id);

        $dbShippingUsed = $dbShippingUsed->toArray();
        $this->assertModelData($shippingUsed->toArray(), $dbShippingUsed);
    }

    /**
     * @test update
     */
    public function test_update_shipping_used()
    {
        $shippingUsed = ShippingUsed::factory()->create();
        $fakeShippingUsed = ShippingUsed::factory()->make()->toArray();

        $updatedShippingUsed = $this->shippingUsedRepo->update($fakeShippingUsed, $shippingUsed->id);

        $this->assertModelData($fakeShippingUsed, $updatedShippingUsed->toArray());
        $dbShippingUsed = $this->shippingUsedRepo->find($shippingUsed->id);
        $this->assertModelData($fakeShippingUsed, $dbShippingUsed->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_shipping_used()
    {
        $shippingUsed = ShippingUsed::factory()->create();

        $resp = $this->shippingUsedRepo->delete($shippingUsed->id);

        $this->assertTrue($resp);
        $this->assertNull(ShippingUsed::find($shippingUsed->id), 'ShippingUsed should not exist in DB');
    }
}
