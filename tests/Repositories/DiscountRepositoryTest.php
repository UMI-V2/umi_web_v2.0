<?php namespace Tests\Repositories;

use App\Models\Discount;
use App\Repositories\DiscountRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class DiscountRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var DiscountRepository
     */
    protected $discountRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->discountRepo = \App::make(DiscountRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_discount()
    {
        $discount = Discount::factory()->make()->toArray();

        $createdDiscount = $this->discountRepo->create($discount);

        $createdDiscount = $createdDiscount->toArray();
        $this->assertArrayHasKey('id', $createdDiscount);
        $this->assertNotNull($createdDiscount['id'], 'Created Discount must have id specified');
        $this->assertNotNull(Discount::find($createdDiscount['id']), 'Discount with given id must be in DB');
        $this->assertModelData($discount, $createdDiscount);
    }

    /**
     * @test read
     */
    public function test_read_discount()
    {
        $discount = Discount::factory()->create();

        $dbDiscount = $this->discountRepo->find($discount->id);

        $dbDiscount = $dbDiscount->toArray();
        $this->assertModelData($discount->toArray(), $dbDiscount);
    }

    /**
     * @test update
     */
    public function test_update_discount()
    {
        $discount = Discount::factory()->create();
        $fakeDiscount = Discount::factory()->make()->toArray();

        $updatedDiscount = $this->discountRepo->update($fakeDiscount, $discount->id);

        $this->assertModelData($fakeDiscount, $updatedDiscount->toArray());
        $dbDiscount = $this->discountRepo->find($discount->id);
        $this->assertModelData($fakeDiscount, $dbDiscount->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_discount()
    {
        $discount = Discount::factory()->create();

        $resp = $this->discountRepo->delete($discount->id);

        $this->assertTrue($resp);
        $this->assertNull(Discount::find($discount->id), 'Discount should not exist in DB');
    }
}
