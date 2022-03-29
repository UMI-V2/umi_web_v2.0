<?php namespace Tests\Repositories;

use App\Models\SubDistrict;
use App\Repositories\SubDistrictRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class SubDistrictRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var SubDistrictRepository
     */
    protected $subDistrictRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->subDistrictRepo = \App::make(SubDistrictRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_sub_district()
    {
        $subDistrict = SubDistrict::factory()->make()->toArray();

        $createdSubDistrict = $this->subDistrictRepo->create($subDistrict);

        $createdSubDistrict = $createdSubDistrict->toArray();
        $this->assertArrayHasKey('id', $createdSubDistrict);
        $this->assertNotNull($createdSubDistrict['id'], 'Created SubDistrict must have id specified');
        $this->assertNotNull(SubDistrict::find($createdSubDistrict['id']), 'SubDistrict with given id must be in DB');
        $this->assertModelData($subDistrict, $createdSubDistrict);
    }

    /**
     * @test read
     */
    public function test_read_sub_district()
    {
        $subDistrict = SubDistrict::factory()->create();

        $dbSubDistrict = $this->subDistrictRepo->find($subDistrict->id);

        $dbSubDistrict = $dbSubDistrict->toArray();
        $this->assertModelData($subDistrict->toArray(), $dbSubDistrict);
    }

    /**
     * @test update
     */
    public function test_update_sub_district()
    {
        $subDistrict = SubDistrict::factory()->create();
        $fakeSubDistrict = SubDistrict::factory()->make()->toArray();

        $updatedSubDistrict = $this->subDistrictRepo->update($fakeSubDistrict, $subDistrict->id);

        $this->assertModelData($fakeSubDistrict, $updatedSubDistrict->toArray());
        $dbSubDistrict = $this->subDistrictRepo->find($subDistrict->id);
        $this->assertModelData($fakeSubDistrict, $dbSubDistrict->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_sub_district()
    {
        $subDistrict = SubDistrict::factory()->create();

        $resp = $this->subDistrictRepo->delete($subDistrict->id);

        $this->assertTrue($resp);
        $this->assertNull(SubDistrict::find($subDistrict->id), 'SubDistrict should not exist in DB');
    }
}
