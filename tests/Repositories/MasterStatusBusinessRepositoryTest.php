<?php namespace Tests\Repositories;

use App\Models\MasterStatusBusiness;
use App\Repositories\MasterStatusBusinessRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterStatusBusinessRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterStatusBusinessRepository
     */
    protected $masterStatusBusinessRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterStatusBusinessRepo = \App::make(MasterStatusBusinessRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterStatusBusiness()
    {
        $masterStatusBusiness = MasterStatusBusiness::factory()->make()->toArray();

        $createdMasterStatusBusiness = $this->masterStatusBusinessRepo->create($masterStatusBusiness);

        $createdMasterStatusBusiness = $createdMasterStatusBusiness->toArray();
        $this->assertArrayHasKey('id', $createdMasterStatusBusiness);
        $this->assertNotNull($createdMasterStatusBusiness['id'], 'Created MasterStatusBusiness must have id specified');
        $this->assertNotNull(MasterStatusBusiness::find($createdMasterStatusBusiness['id']), 'MasterStatusBusiness with given id must be in DB');
        $this->assertModelData($masterStatusBusiness, $createdMasterStatusBusiness);
    }

    /**
     * @test read
     */
    public function test_read_MasterStatusBusiness()
    {
        $masterStatusBusiness = MasterStatusBusiness::factory()->create();

        $dbMasterStatusBusiness = $this->masterStatusBusinessRepo->find($masterStatusBusiness->id);

        $dbMasterStatusBusiness = $dbMasterStatusBusiness->toArray();
        $this->assertModelData($masterStatusBusiness->toArray(), $dbMasterStatusBusiness);
    }

    /**
     * @test update
     */
    public function test_update_MasterStatusBusiness()
    {
        $masterStatusBusiness = MasterStatusBusiness::factory()->create();
        $fakeMasterStatusBusiness = MasterStatusBusiness::factory()->make()->toArray();

        $updatedMasterStatusBusiness = $this->masterStatusBusinessRepo->update($fakeMasterStatusBusiness, $masterStatusBusiness->id);

        $this->assertModelData($fakeMasterStatusBusiness, $updatedMasterStatusBusiness->toArray());
        $dbMasterStatusBusiness = $this->masterStatusBusinessRepo->find($masterStatusBusiness->id);
        $this->assertModelData($fakeMasterStatusBusiness, $dbMasterStatusBusiness->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterStatusBusiness()
    {
        $masterStatusBusiness = MasterStatusBusiness::factory()->create();

        $resp = $this->masterStatusBusinessRepo->delete($masterStatusBusiness->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterStatusBusiness::find($masterStatusBusiness->id), 'MasterStatusBusiness should not exist in DB');
    }
}
