<?php namespace Tests\Repositories;

use App\Models\MasterUnit;
use App\Repositories\MasterUnitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterUnitRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterUnitRepository
     */
    protected $masterUnitRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterUnitRepo = \App::make(MasterUnitRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterUnit()
    {
        $masterUnit = MasterUnit::factory()->make()->toArray();

        $createdMasterUnit = $this->masterUnitRepo->create($masterUnit);

        $createdMasterUnit = $createdMasterUnit->toArray();
        $this->assertArrayHasKey('id', $createdMasterUnit);
        $this->assertNotNull($createdMasterUnit['id'], 'Created MasterUnit must have id specified');
        $this->assertNotNull(MasterUnit::find($createdMasterUnit['id']), 'MasterUnit with given id must be in DB');
        $this->assertModelData($masterUnit, $createdMasterUnit);
    }

    /**
     * @test read
     */
    public function test_read_MasterUnit()
    {
        $masterUnit = MasterUnit::factory()->create();

        $dbMasterUnit = $this->masterUnitRepo->find($masterUnit->id);

        $dbMasterUnit = $dbMasterUnit->toArray();
        $this->assertModelData($masterUnit->toArray(), $dbMasterUnit);
    }

    /**
     * @test update
     */
    public function test_update_MasterUnit()
    {
        $masterUnit = MasterUnit::factory()->create();
        $fakeMasterUnit = MasterUnit::factory()->make()->toArray();

        $updatedMasterUnit = $this->masterUnitRepo->update($fakeMasterUnit, $masterUnit->id);

        $this->assertModelData($fakeMasterUnit, $updatedMasterUnit->toArray());
        $dbMasterUnit = $this->masterUnitRepo->find($masterUnit->id);
        $this->assertModelData($fakeMasterUnit, $dbMasterUnit->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterUnit()
    {
        $masterUnit = MasterUnit::factory()->create();

        $resp = $this->masterUnitRepo->delete($masterUnit->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterUnit::find($masterUnit->id), 'MasterUnit should not exist in DB');
    }
}
