<?php namespace Tests\Repositories;

use App\Models\SalesDeliveryService;
use App\Repositories\SalesDeliveryServiceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SalesDeliveryServiceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SalesDeliveryServiceRepository
     */
    protected $salesDeliveryServiceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->salesDeliveryServiceRepo = \App::make(SalesDeliveryServiceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sales_delivery_service()
    {
        $salesDeliveryService = SalesDeliveryService::factory()->make()->toArray();

        $createdSalesDeliveryService = $this->salesDeliveryServiceRepo->create($salesDeliveryService);

        $createdSalesDeliveryService = $createdSalesDeliveryService->toArray();
        $this->assertArrayHasKey('id', $createdSalesDeliveryService);
        $this->assertNotNull($createdSalesDeliveryService['id'], 'Created SalesDeliveryService must have id specified');
        $this->assertNotNull(SalesDeliveryService::find($createdSalesDeliveryService['id']), 'SalesDeliveryService with given id must be in DB');
        $this->assertModelData($salesDeliveryService, $createdSalesDeliveryService);
    }

    /**
     * @test read
     */
    public function test_read_sales_delivery_service()
    {
        $salesDeliveryService = SalesDeliveryService::factory()->create();

        $dbSalesDeliveryService = $this->salesDeliveryServiceRepo->find($salesDeliveryService->id);

        $dbSalesDeliveryService = $dbSalesDeliveryService->toArray();
        $this->assertModelData($salesDeliveryService->toArray(), $dbSalesDeliveryService);
    }

    /**
     * @test update
     */
    public function test_update_sales_delivery_service()
    {
        $salesDeliveryService = SalesDeliveryService::factory()->create();
        $fakeSalesDeliveryService = SalesDeliveryService::factory()->make()->toArray();

        $updatedSalesDeliveryService = $this->salesDeliveryServiceRepo->update($fakeSalesDeliveryService, $salesDeliveryService->id);

        $this->assertModelData($fakeSalesDeliveryService, $updatedSalesDeliveryService->toArray());
        $dbSalesDeliveryService = $this->salesDeliveryServiceRepo->find($salesDeliveryService->id);
        $this->assertModelData($fakeSalesDeliveryService, $dbSalesDeliveryService->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sales_delivery_service()
    {
        $salesDeliveryService = SalesDeliveryService::factory()->create();

        $resp = $this->salesDeliveryServiceRepo->delete($salesDeliveryService->id);

        $this->assertTrue($resp);
        $this->assertNull(SalesDeliveryService::find($salesDeliveryService->id), 'SalesDeliveryService should not exist in DB');
    }
}
