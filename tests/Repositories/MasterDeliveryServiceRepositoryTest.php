<?php namespace Tests\Repositories;

use App\Models\MasterDeliveryService;
use App\Repositories\MasterDeliveryServiceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterDeliveryServiceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterDeliveryServiceRepository
     */
    protected $masterDeliveryServiceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterDeliveryServiceRepo = \App::make(MasterDeliveryServiceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterDeliveryService()
    {
        $masterDeliveryService = MasterDeliveryService::factory()->make()->toArray();

        $createdMasterDeliveryService = $this->masterDeliveryServiceRepo->create($masterDeliveryService);

        $createdMasterDeliveryService = $createdMasterDeliveryService->toArray();
        $this->assertArrayHasKey('id', $createdMasterDeliveryService);
        $this->assertNotNull($createdMasterDeliveryService['id'], 'Created MasterDeliveryService must have id specified');
        $this->assertNotNull(MasterDeliveryService::find($createdMasterDeliveryService['id']), 'MasterDeliveryService with given id must be in DB');
        $this->assertModelData($masterDeliveryService, $createdMasterDeliveryService);
    }

    /**
     * @test read
     */
    public function test_read_MasterDeliveryService()
    {
        $masterDeliveryService = MasterDeliveryService::factory()->create();

        $dbMasterDeliveryService = $this->masterDeliveryServiceRepo->find($masterDeliveryService->id);

        $dbMasterDeliveryService = $dbMasterDeliveryService->toArray();
        $this->assertModelData($masterDeliveryService->toArray(), $dbMasterDeliveryService);
    }

    /**
     * @test update
     */
    public function test_update_MasterDeliveryService()
    {
        $masterDeliveryService = MasterDeliveryService::factory()->create();
        $fakeMasterDeliveryService = MasterDeliveryService::factory()->make()->toArray();

        $updatedMasterDeliveryService = $this->masterDeliveryServiceRepo->update($fakeMasterDeliveryService, $masterDeliveryService->id);

        $this->assertModelData($fakeMasterDeliveryService, $updatedMasterDeliveryService->toArray());
        $dbMasterDeliveryService = $this->masterDeliveryServiceRepo->find($masterDeliveryService->id);
        $this->assertModelData($fakeMasterDeliveryService, $dbMasterDeliveryService->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterDeliveryService()
    {
        $masterDeliveryService = MasterDeliveryService::factory()->create();

        $resp = $this->masterDeliveryServiceRepo->delete($masterDeliveryService->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterDeliveryService::find($masterDeliveryService->id), 'MasterDeliveryService should not exist in DB');
    }
}
