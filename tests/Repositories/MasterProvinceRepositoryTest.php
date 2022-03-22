<?php namespace Tests\Repositories;

use App\Models\MasterProvince;
use App\Repositories\MasterProvinceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterProvinceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterProvinceRepository
     */
    protected $masterProvinceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterProvinceRepo = \App::make(MasterProvinceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterProvince()
    {
        $masterProvince = MasterProvince::factory()->make()->toArray();

        $createdMasterProvince = $this->masterProvinceRepo->create($masterProvince);

        $createdMasterProvince = $createdMasterProvince->toArray();
        $this->assertArrayHasKey('id', $createdMasterProvince);
        $this->assertNotNull($createdMasterProvince['id'], 'Created MasterProvince must have id specified');
        $this->assertNotNull(MasterProvince::find($createdMasterProvince['id']), 'MasterProvince with given id must be in DB');
        $this->assertModelData($masterProvince, $createdMasterProvince);
    }

    /**
     * @test read
     */
    public function test_read_MasterProvince()
    {
        $masterProvince = MasterProvince::factory()->create();

        $dbMasterProvince = $this->masterProvinceRepo->find($masterProvince->id);

        $dbMasterProvince = $dbMasterProvince->toArray();
        $this->assertModelData($masterProvince->toArray(), $dbMasterProvince);
    }

    /**
     * @test update
     */
    public function test_update_MasterProvince()
    {
        $masterProvince = MasterProvince::factory()->create();
        $fakeMasterProvince = MasterProvince::factory()->make()->toArray();

        $updatedMasterProvince = $this->masterProvinceRepo->update($fakeMasterProvince, $masterProvince->id);

        $this->assertModelData($fakeMasterProvince, $updatedMasterProvince->toArray());
        $dbMasterProvince = $this->masterProvinceRepo->find($masterProvince->id);
        $this->assertModelData($fakeMasterProvince, $dbMasterProvince->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterProvince()
    {
        $masterProvince = MasterProvince::factory()->create();

        $resp = $this->masterProvinceRepo->delete($masterProvince->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterProvince::find($masterProvince->id), 'MasterProvince should not exist in DB');
    }
}
