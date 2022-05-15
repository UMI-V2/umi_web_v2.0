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
    protected $cityRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->cityRepo = \App::make(MasterCityRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_city()
    {
        $city = MasterCity::factory()->make()->toArray();

        $createdCity = $this->cityRepo->create($city);

        $createdCity = $createdCity->toArray();
        $this->assertArrayHasKey('id', $createdCity);
        $this->assertNotNull($createdCity['id'], 'Created MasterCity must have id specified');
        $this->assertNotNull(MasterCity::find($createdCity['id']), 'MasterCity with given id must be in DB');
        $this->assertModelData($city, $createdCity);
    }

    /**
     * @test read
     */
    public function test_read_city()
    {
        $city = MasterCity::factory()->create();

        $dbCity = $this->cityRepo->find($city->id);

        $dbCity = $dbCity->toArray();
        $this->assertModelData($city->toArray(), $dbCity);
    }

    /**
     * @test update
     */
    public function test_update_city()
    {
        $city = MasterCity::factory()->create();
        $fakeCity = MasterCity::factory()->make()->toArray();

        $updatedCity = $this->cityRepo->update($fakeCity, $city->id);

        $this->assertModelData($fakeCity, $updatedCity->toArray());
        $dbCity = $this->cityRepo->find($city->id);
        $this->assertModelData($fakeCity, $dbCity->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_city()
    {
        $city = MasterCity::factory()->create();

        $resp = $this->cityRepo->delete($city->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterCity::find($city->id), 'MasterCity should not exist in DB');
    }
}
