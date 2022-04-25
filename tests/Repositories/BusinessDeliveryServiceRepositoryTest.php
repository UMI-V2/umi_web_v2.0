<?php namespace Tests\Repositories;

use App\Models\BusinessDeliveryService;
use App\Repositories\BusinessDeliveryServiceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BusinessDeliveryServiceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BusinessDeliveryServiceRepository
     */
    protected $businessDeliveryServiceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->businessDeliveryServiceRepo = \App::make(BusinessDeliveryServiceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_business_delivery_service()
    {
        $businessDeliveryService = BusinessDeliveryService::factory()->make()->toArray();

        $createdBusinessDeliveryService = $this->businessDeliveryServiceRepo->create($businessDeliveryService);

        $createdBusinessDeliveryService = $createdBusinessDeliveryService->toArray();
        $this->assertArrayHasKey('id', $createdBusinessDeliveryService);
        $this->assertNotNull($createdBusinessDeliveryService['id'], 'Created BusinessDeliveryService must have id specified');
        $this->assertNotNull(BusinessDeliveryService::find($createdBusinessDeliveryService['id']), 'BusinessDeliveryService with given id must be in DB');
        $this->assertModelData($businessDeliveryService, $createdBusinessDeliveryService);
    }

    /**
     * @test read
     */
    public function test_read_business_delivery_service()
    {
        $businessDeliveryService = BusinessDeliveryService::factory()->create();

        $dbBusinessDeliveryService = $this->businessDeliveryServiceRepo->find($businessDeliveryService->id);

        $dbBusinessDeliveryService = $dbBusinessDeliveryService->toArray();
        $this->assertModelData($businessDeliveryService->toArray(), $dbBusinessDeliveryService);
    }

    /**
     * @test update
     */
    public function test_update_business_delivery_service()
    {
        $businessDeliveryService = BusinessDeliveryService::factory()->create();
        $fakeBusinessDeliveryService = BusinessDeliveryService::factory()->make()->toArray();

        $updatedBusinessDeliveryService = $this->businessDeliveryServiceRepo->update($fakeBusinessDeliveryService, $businessDeliveryService->id);

        $this->assertModelData($fakeBusinessDeliveryService, $updatedBusinessDeliveryService->toArray());
        $dbBusinessDeliveryService = $this->businessDeliveryServiceRepo->find($businessDeliveryService->id);
        $this->assertModelData($fakeBusinessDeliveryService, $dbBusinessDeliveryService->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_business_delivery_service()
    {
        $businessDeliveryService = BusinessDeliveryService::factory()->create();

        $resp = $this->businessDeliveryServiceRepo->delete($businessDeliveryService->id);

        $this->assertTrue($resp);
        $this->assertNull(BusinessDeliveryService::find($businessDeliveryService->id), 'BusinessDeliveryService should not exist in DB');
    }
}
