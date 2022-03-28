<?php namespace Tests\Repositories;

use App\Models\MasterTransactionCategory;
use App\Repositories\MasterTransactionCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class MasterTransactionCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var MasterTransactionCategoryRepository
     */
    protected $masterTransactionCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterTransactionCategoryRepo = \App::make(MasterTransactionCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_MasterTransactionCategory()
    {
        $masterTransactionCategory = MasterTransactionCategory::factory()->make()->toArray();

        $createdMasterTransactionCategory = $this->masterTransactionCategoryRepo->create($masterTransactionCategory);

        $createdMasterTransactionCategory = $createdMasterTransactionCategory->toArray();
        $this->assertArrayHasKey('id', $createdMasterTransactionCategory);
        $this->assertNotNull($createdMasterTransactionCategory['id'], 'Created MasterTransactionCategory must have id specified');
        $this->assertNotNull(MasterTransactionCategory::find($createdMasterTransactionCategory['id']), 'MasterTransactionCategory with given id must be in DB');
        $this->assertModelData($masterTransactionCategory, $createdMasterTransactionCategory);
    }

    /**
     * @test read
     */
    public function test_read_MasterTransactionCategory()
    {
        $masterTransactionCategory = MasterTransactionCategory::factory()->create();

        $dbMasterTransactionCategory = $this->masterTransactionCategoryRepo->find($masterTransactionCategory->id);

        $dbMasterTransactionCategory = $dbMasterTransactionCategory->toArray();
        $this->assertModelData($masterTransactionCategory->toArray(), $dbMasterTransactionCategory);
    }

    /**
     * @test update
     */
    public function test_update_MasterTransactionCategory()
    {
        $masterTransactionCategory = MasterTransactionCategory::factory()->create();
        $fakeMasterTransactionCategory = MasterTransactionCategory::factory()->make()->toArray();

        $updatedMasterTransactionCategory = $this->masterTransactionCategoryRepo->update($fakeMasterTransactionCategory, $masterTransactionCategory->id);

        $this->assertModelData($fakeMasterTransactionCategory, $updatedMasterTransactionCategory->toArray());
        $dbMasterTransactionCategory = $this->masterTransactionCategoryRepo->find($masterTransactionCategory->id);
        $this->assertModelData($fakeMasterTransactionCategory, $dbMasterTransactionCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_MasterTransactionCategory()
    {
        $masterTransactionCategory = MasterTransactionCategory::factory()->create();

        $resp = $this->masterTransactionCategoryRepo->delete($masterTransactionCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(MasterTransactionCategory::find($masterTransactionCategory->id), 'MasterTransactionCategory should not exist in DB');
    }
}
