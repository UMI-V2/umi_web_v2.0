<?php namespace Tests\Repositories;

use App\Models\master_business_category;
use App\Repositories\master_business_categoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class master_business_categoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var master_business_categoryRepository
     */
    protected $masterBusinessCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->masterBusinessCategoryRepo = \App::make(master_business_categoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_master_business_category()
    {
        $masterBusinessCategory = master_business_category::factory()->make()->toArray();

        $createdmaster_business_category = $this->masterBusinessCategoryRepo->create($masterBusinessCategory);

        $createdmaster_business_category = $createdmaster_business_category->toArray();
        $this->assertArrayHasKey('id', $createdmaster_business_category);
        $this->assertNotNull($createdmaster_business_category['id'], 'Created master_business_category must have id specified');
        $this->assertNotNull(master_business_category::find($createdmaster_business_category['id']), 'master_business_category with given id must be in DB');
        $this->assertModelData($masterBusinessCategory, $createdmaster_business_category);
    }

    /**
     * @test read
     */
    public function test_read_master_business_category()
    {
        $masterBusinessCategory = master_business_category::factory()->create();

        $dbmaster_business_category = $this->masterBusinessCategoryRepo->find($masterBusinessCategory->id);

        $dbmaster_business_category = $dbmaster_business_category->toArray();
        $this->assertModelData($masterBusinessCategory->toArray(), $dbmaster_business_category);
    }

    /**
     * @test update
     */
    public function test_update_master_business_category()
    {
        $masterBusinessCategory = master_business_category::factory()->create();
        $fakemaster_business_category = master_business_category::factory()->make()->toArray();

        $updatedmaster_business_category = $this->masterBusinessCategoryRepo->update($fakemaster_business_category, $masterBusinessCategory->id);

        $this->assertModelData($fakemaster_business_category, $updatedmaster_business_category->toArray());
        $dbmaster_business_category = $this->masterBusinessCategoryRepo->find($masterBusinessCategory->id);
        $this->assertModelData($fakemaster_business_category, $dbmaster_business_category->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_master_business_category()
    {
        $masterBusinessCategory = master_business_category::factory()->create();

        $resp = $this->masterBusinessCategoryRepo->delete($masterBusinessCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(master_business_category::find($masterBusinessCategory->id), 'master_business_category should not exist in DB');
    }
}
