<?php namespace Tests\Repositories;

use App\Models\master_delivery_service;
use App\Repositories\master_delivery_serviceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_delivery_serviceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_delivery_serviceRepository
     */
    protected $masterDeliveryServiceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterDeliveryServiceRepo = \App::make(master_delivery_serviceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_delivery_service()
    {
        $masterDeliveryService = master_delivery_service::factory()->make()->toArray();

        $createdmaster_delivery_service = $this->masterDeliveryServiceRepo->create($masterDeliveryService);

        $createdmaster_delivery_service = $createdmaster_delivery_service->toArray();
        $this->assertArrayHasKey('id', $createdmaster_delivery_service);
        $this->assertNotNull($createdmaster_delivery_service['id'], 'Created master_delivery_service must have id specified');
        $this->assertNotNull(master_delivery_service::find($createdmaster_delivery_service['id']), 'master_delivery_service with given id must be in DB');
        $this->assertModelData($masterDeliveryService, $createdmaster_delivery_service);
    }

    /**
     * @test read
     */
    public function test_read_master_delivery_service()
    {
        $masterDeliveryService = master_delivery_service::factory()->create();

        $dbmaster_delivery_service = $this->masterDeliveryServiceRepo->find($masterDeliveryService->id);

        $dbmaster_delivery_service = $dbmaster_delivery_service->toArray();
        $this->assertModelData($masterDeliveryService->toArray(), $dbmaster_delivery_service);
    }

    /**
     * @test update
     */
    public function test_update_master_delivery_service()
    {
        $masterDeliveryService = master_delivery_service::factory()->create();
        $fakemaster_delivery_service = master_delivery_service::factory()->make()->toArray();

        $updatedmaster_delivery_service = $this->masterDeliveryServiceRepo->update($fakemaster_delivery_service, $masterDeliveryService->id);

        $this->assertModelData($fakemaster_delivery_service, $updatedmaster_delivery_service->toArray());
        $dbmaster_delivery_service = $this->masterDeliveryServiceRepo->find($masterDeliveryService->id);
        $this->assertModelData($fakemaster_delivery_service, $dbmaster_delivery_service->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_delivery_service()
    {
        $masterDeliveryService = master_delivery_service::factory()->create();

        $resp = $this->masterDeliveryServiceRepo->delete($masterDeliveryService->id);

        $this->assertTrue($resp);
        $this->assertNull(master_delivery_service::find($masterDeliveryService->id), 'master_delivery_service should not exist in DB');
    }
}
