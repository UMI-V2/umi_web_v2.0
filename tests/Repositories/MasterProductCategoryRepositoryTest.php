<?php namespace Tests\Repositories;

use App\Models\MasterProductCategory;
use App\Repositories\MasterProductCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterProductCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterProductCategoryRepository
     */
    protected $masterProductCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterProductCategoryRepo = \App::make(MasterProductCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterProductCategory()
    {
        $masterProductCategory = MasterProductCategory::factory()->make()->toArray();

        $createdMasterProductCategory = $this->masterProductCategoryRepo->create($masterProductCategory);

        $createdMasterProductCategory = $createdMasterProductCategory->toArray();
        $this->assertArrayHasKey('id', $createdMasterProductCategory);
        $this->assertNotNull($createdMasterProductCategory['id'], 'Created MasterProductCategory must have id specified');
        $this->assertNotNull(MasterProductCategory::find($createdMasterProductCategory['id']), 'MasterProductCategory with given id must be in DB');
        $this->assertModelData($masterProductCategory, $createdMasterProductCategory);
    }

    /**
     * @test read
     */
    public function test_read_MasterProductCategory()
    {
        $masterProductCategory = MasterProductCategory::factory()->create();

        $dbMasterProductCategory = $this->masterProductCategoryRepo->find($masterProductCategory->id);

        $dbMasterProductCategory = $dbMasterProductCategory->toArray();
        $this->assertModelData($masterProductCategory->toArray(), $dbMasterProductCategory);
    }

    /**
     * @test update
     */
    public function test_update_MasterProductCategory()
    {
        $masterProductCategory = MasterProductCategory::factory()->create();
        $fakeMasterProductCategory = MasterProductCategory::factory()->make()->toArray();

        $updatedMasterProductCategory = $this->masterProductCategoryRepo->update($fakeMasterProductCategory, $masterProductCategory->id);

        $this->assertModelData($fakeMasterProductCategory, $updatedMasterProductCategory->toArray());
        $dbMasterProductCategory = $this->masterProductCategoryRepo->find($masterProductCategory->id);
        $this->assertModelData($fakeMasterProductCategory, $dbMasterProductCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterProductCategory()
    {
        $masterProductCategory = MasterProductCategory::factory()->create();

        $resp = $this->masterProductCategoryRepo->delete($masterProductCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterProductCategory::find($masterProductCategory->id), 'MasterProductCategory should not exist in DB');
    }
}
