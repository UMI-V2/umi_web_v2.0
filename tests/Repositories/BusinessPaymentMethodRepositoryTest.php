<?php namespace Tests\Repositories;

use App\Models\BusinessPaymentMethod;
use App\Repositories\BusinessPaymentMethodRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BusinessPaymentMethodRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BusinessPaymentMethodRepository
     */
    protected $businessPaymentMethodRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->businessPaymentMethodRepo = \App::make(BusinessPaymentMethodRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_business_payment_method()
    {
        $businessPaymentMethod = BusinessPaymentMethod::factory()->make()->toArray();

        $createdBusinessPaymentMethod = $this->businessPaymentMethodRepo->create($businessPaymentMethod);

        $createdBusinessPaymentMethod = $createdBusinessPaymentMethod->toArray();
        $this->assertArrayHasKey('id', $createdBusinessPaymentMethod);
        $this->assertNotNull($createdBusinessPaymentMethod['id'], 'Created BusinessPaymentMethod must have id specified');
        $this->assertNotNull(BusinessPaymentMethod::find($createdBusinessPaymentMethod['id']), 'BusinessPaymentMethod with given id must be in DB');
        $this->assertModelData($businessPaymentMethod, $createdBusinessPaymentMethod);
    }

    /**
     * @test read
     */
    public function test_read_business_payment_method()
    {
        $businessPaymentMethod = BusinessPaymentMethod::factory()->create();

        $dbBusinessPaymentMethod = $this->businessPaymentMethodRepo->find($businessPaymentMethod->id);

        $dbBusinessPaymentMethod = $dbBusinessPaymentMethod->toArray();
        $this->assertModelData($businessPaymentMethod->toArray(), $dbBusinessPaymentMethod);
    }

    /**
     * @test update
     */
    public function test_update_business_payment_method()
    {
        $businessPaymentMethod = BusinessPaymentMethod::factory()->create();
        $fakeBusinessPaymentMethod = BusinessPaymentMethod::factory()->make()->toArray();

        $updatedBusinessPaymentMethod = $this->businessPaymentMethodRepo->update($fakeBusinessPaymentMethod, $businessPaymentMethod->id);

        $this->assertModelData($fakeBusinessPaymentMethod, $updatedBusinessPaymentMethod->toArray());
        $dbBusinessPaymentMethod = $this->businessPaymentMethodRepo->find($businessPaymentMethod->id);
        $this->assertModelData($fakeBusinessPaymentMethod, $dbBusinessPaymentMethod->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_business_payment_method()
    {
        $businessPaymentMethod = BusinessPaymentMethod::factory()->create();

        $resp = $this->businessPaymentMethodRepo->delete($businessPaymentMethod->id);

        $this->assertTrue($resp);
        $this->assertNull(BusinessPaymentMethod::find($businessPaymentMethod->id), 'BusinessPaymentMethod should not exist in DB');
    }
}
