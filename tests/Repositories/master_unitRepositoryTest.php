<?php namespace Tests\Repositories;

use App\Models\master_unit;
use App\Repositories\master_unitRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_unitRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_unitRepository
     */
    protected $masterUnitRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterUnitRepo = \App::make(master_unitRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_unit()
    {
        $masterUnit = master_unit::factory()->make()->toArray();

        $createdmaster_unit = $this->masterUnitRepo->create($masterUnit);

        $createdmaster_unit = $createdmaster_unit->toArray();
        $this->assertArrayHasKey('id', $createdmaster_unit);
        $this->assertNotNull($createdmaster_unit['id'], 'Created master_unit must have id specified');
        $this->assertNotNull(master_unit::find($createdmaster_unit['id']), 'master_unit with given id must be in DB');
        $this->assertModelData($masterUnit, $createdmaster_unit);
    }

    /**
     * @test read
     */
    public function test_read_master_unit()
    {
        $masterUnit = master_unit::factory()->create();

        $dbmaster_unit = $this->masterUnitRepo->find($masterUnit->id);

        $dbmaster_unit = $dbmaster_unit->toArray();
        $this->assertModelData($masterUnit->toArray(), $dbmaster_unit);
    }

    /**
     * @test update
     */
    public function test_update_master_unit()
    {
        $masterUnit = master_unit::factory()->create();
        $fakemaster_unit = master_unit::factory()->make()->toArray();

        $updatedmaster_unit = $this->masterUnitRepo->update($fakemaster_unit, $masterUnit->id);

        $this->assertModelData($fakemaster_unit, $updatedmaster_unit->toArray());
        $dbmaster_unit = $this->masterUnitRepo->find($masterUnit->id);
        $this->assertModelData($fakemaster_unit, $dbmaster_unit->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_unit()
    {
        $masterUnit = master_unit::factory()->create();

        $resp = $this->masterUnitRepo->delete($masterUnit->id);

        $this->assertTrue($resp);
        $this->assertNull(master_unit::find($masterUnit->id), 'master_unit should not exist in DB');
    }
}
