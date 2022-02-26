<?php namespace Tests\Repositories;

use App\Models\master_product_category;
use App\Repositories\master_product_categoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_product_categoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_product_categoryRepository
     */
    protected $masterProductCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterProductCategoryRepo = \App::make(master_product_categoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_product_category()
    {
        $masterProductCategory = master_product_category::factory()->make()->toArray();

        $createdmaster_product_category = $this->masterProductCategoryRepo->create($masterProductCategory);

        $createdmaster_product_category = $createdmaster_product_category->toArray();
        $this->assertArrayHasKey('id', $createdmaster_product_category);
        $this->assertNotNull($createdmaster_product_category['id'], 'Created master_product_category must have id specified');
        $this->assertNotNull(master_product_category::find($createdmaster_product_category['id']), 'master_product_category with given id must be in DB');
        $this->assertModelData($masterProductCategory, $createdmaster_product_category);
    }

    /**
     * @test read
     */
    public function test_read_master_product_category()
    {
        $masterProductCategory = master_product_category::factory()->create();

        $dbmaster_product_category = $this->masterProductCategoryRepo->find($masterProductCategory->id);

        $dbmaster_product_category = $dbmaster_product_category->toArray();
        $this->assertModelData($masterProductCategory->toArray(), $dbmaster_product_category);
    }

    /**
     * @test update
     */
    public function test_update_master_product_category()
    {
        $masterProductCategory = master_product_category::factory()->create();
        $fakemaster_product_category = master_product_category::factory()->make()->toArray();

        $updatedmaster_product_category = $this->masterProductCategoryRepo->update($fakemaster_product_category, $masterProductCategory->id);

        $this->assertModelData($fakemaster_product_category, $updatedmaster_product_category->toArray());
        $dbmaster_product_category = $this->masterProductCategoryRepo->find($masterProductCategory->id);
        $this->assertModelData($fakemaster_product_category, $dbmaster_product_category->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_product_category()
    {
        $masterProductCategory = master_product_category::factory()->create();

        $resp = $this->masterProductCategoryRepo->delete($masterProductCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(master_product_category::find($masterProductCategory->id), 'master_product_category should not exist in DB');
    }
}
