<?php namespace Tests\Repositories;

use App\Models\master_province;
use App\Repositories\master_provinceRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_provinceRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_provinceRepository
     */
    protected $masterProvinceRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterProvinceRepo = \App::make(master_provinceRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_province()
    {
        $masterProvince = master_province::factory()->make()->toArray();

        $createdmaster_province = $this->masterProvinceRepo->create($masterProvince);

        $createdmaster_province = $createdmaster_province->toArray();
        $this->assertArrayHasKey('id', $createdmaster_province);
        $this->assertNotNull($createdmaster_province['id'], 'Created master_province must have id specified');
        $this->assertNotNull(master_province::find($createdmaster_province['id']), 'master_province with given id must be in DB');
        $this->assertModelData($masterProvince, $createdmaster_province);
    }

    /**
     * @test read
     */
    public function test_read_master_province()
    {
        $masterProvince = master_province::factory()->create();

        $dbmaster_province = $this->masterProvinceRepo->find($masterProvince->id);

        $dbmaster_province = $dbmaster_province->toArray();
        $this->assertModelData($masterProvince->toArray(), $dbmaster_province);
    }

    /**
     * @test update
     */
    public function test_update_master_province()
    {
        $masterProvince = master_province::factory()->create();
        $fakemaster_province = master_province::factory()->make()->toArray();

        $updatedmaster_province = $this->masterProvinceRepo->update($fakemaster_province, $masterProvince->id);

        $this->assertModelData($fakemaster_province, $updatedmaster_province->toArray());
        $dbmaster_province = $this->masterProvinceRepo->find($masterProvince->id);
        $this->assertModelData($fakemaster_province, $dbmaster_province->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_province()
    {
        $masterProvince = master_province::factory()->create();

        $resp = $this->masterProvinceRepo->delete($masterProvince->id);

        $this->assertTrue($resp);
        $this->assertNull(master_province::find($masterProvince->id), 'master_province should not exist in DB');
    }
}
