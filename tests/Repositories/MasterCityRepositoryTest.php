<?php namespace Tests\Repositories;

use App\Models\MasterCity;
use App\Repositories\MasterCityRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterCityRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterCityRepository
     */
    protected $masterCityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterCityRepo = \App::make(MasterCityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_city()
    {
        $masterCity = MasterCity::factory()->make()->toArray();

        $createdMasterCity = $this->masterCityRepo->create($masterCity);

        $createdMasterCity = $createdMasterCity->toArray();
        $this->assertArrayHasKey('id', $createdMasterCity);
        $this->assertNotNull($createdMasterCity['id'], 'Created MasterCity must have id specified');
        $this->assertNotNull(MasterCity::find($createdMasterCity['id']), 'MasterCity with given id must be in DB');
        $this->assertModelData($masterCity, $createdMasterCity);
    }

    /**
     * @test read
     */
    public function test_read_master_city()
    {
        $masterCity = MasterCity::factory()->create();

        $dbMasterCity = $this->masterCityRepo->find($masterCity->id);

        $dbMasterCity = $dbMasterCity->toArray();
        $this->assertModelData($masterCity->toArray(), $dbMasterCity);
    }

    /**
     * @test update
     */
    public function test_update_master_city()
    {
        $masterCity = MasterCity::factory()->create();
        $fakeMasterCity = MasterCity::factory()->make()->toArray();

        $updatedMasterCity = $this->masterCityRepo->update($fakeMasterCity, $masterCity->id);

        $this->assertModelData($fakeMasterCity, $updatedMasterCity->toArray());
        $dbMasterCity = $this->masterCityRepo->find($masterCity->id);
        $this->assertModelData($fakeMasterCity, $dbMasterCity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_city()
    {
        $masterCity = MasterCity::factory()->create();

        $resp = $this->masterCityRepo->delete($masterCity->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterCity::find($masterCity->id), 'MasterCity should not exist in DB');
    }
}
