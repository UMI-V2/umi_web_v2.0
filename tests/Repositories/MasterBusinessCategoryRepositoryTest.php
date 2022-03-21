<?php namespace Tests\Repositories;

use App\Models\MasterBusinessCategory;
use App\Repositories\MasterBusinessCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterBusinessCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterBusinessCategoryRepository
     */
    protected $masterBusinessCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterBusinessCategoryRepo = \App::make(MasterBusinessCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterBusinessCategory()
    {
        $masterBusinessCategory = MasterBusinessCategory::factory()->make()->toArray();

        $createdMasterBusinessCategory = $this->masterBusinessCategoryRepo->create($masterBusinessCategory);

        $createdMasterBusinessCategory = $createdMasterBusinessCategory->toArray();
        $this->assertArrayHasKey('id', $createdMasterBusinessCategory);
        $this->assertNotNull($createdMasterBusinessCategory['id'], 'Created MasterBusinessCategory must have id specified');
        $this->assertNotNull(MasterBusinessCategory::find($createdMasterBusinessCategory['id']), 'MasterBusinessCategory with given id must be in DB');
        $this->assertModelData($masterBusinessCategory, $createdMasterBusinessCategory);
    }

    /**
     * @test read
     */
    public function test_read_MasterBusinessCategory()
    {
        $masterBusinessCategory = MasterBusinessCategory::factory()->create();

        $dbMasterBusinessCategory = $this->masterBusinessCategoryRepo->find($masterBusinessCategory->id);

        $dbMasterBusinessCategory = $dbMasterBusinessCategory->toArray();
        $this->assertModelData($masterBusinessCategory->toArray(), $dbMasterBusinessCategory);
    }

    /**
     * @test update
     */
    public function test_update_MasterBusinessCategory()
    {
        $masterBusinessCategory = MasterBusinessCategory::factory()->create();
        $fakeMasterBusinessCategory = MasterBusinessCategory::factory()->make()->toArray();

        $updatedMasterBusinessCategory = $this->masterBusinessCategoryRepo->update($fakeMasterBusinessCategory, $masterBusinessCategory->id);

        $this->assertModelData($fakeMasterBusinessCategory, $updatedMasterBusinessCategory->toArray());
        $dbMasterBusinessCategory = $this->masterBusinessCategoryRepo->find($masterBusinessCategory->id);
        $this->assertModelData($fakeMasterBusinessCategory, $dbMasterBusinessCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterBusinessCategory()
    {
        $masterBusinessCategory = MasterBusinessCategory::factory()->create();

        $resp = $this->masterBusinessCategoryRepo->delete($masterBusinessCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterBusinessCategory::find($masterBusinessCategory->id), 'MasterBusinessCategory should not exist in DB');
    }
}
