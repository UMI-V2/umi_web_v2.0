<?php namespace Tests\Repositories;

use App\Models\BusinessCategory;
use App\Repositories\BusinessCategoryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BusinessCategoryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BusinessCategoryRepository
     */
    protected $businessCategoryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->businessCategoryRepo = \App::make(BusinessCategoryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_business_category()
    {
        $businessCategory = BusinessCategory::factory()->make()->toArray();

        $createdBusinessCategory = $this->businessCategoryRepo->create($businessCategory);

        $createdBusinessCategory = $createdBusinessCategory->toArray();
        $this->assertArrayHasKey('id', $createdBusinessCategory);
        $this->assertNotNull($createdBusinessCategory['id'], 'Created BusinessCategory must have id specified');
        $this->assertNotNull(BusinessCategory::find($createdBusinessCategory['id']), 'BusinessCategory with given id must be in DB');
        $this->assertModelData($businessCategory, $createdBusinessCategory);
    }

    /**
     * @test read
     */
    public function test_read_business_category()
    {
        $businessCategory = BusinessCategory::factory()->create();

        $dbBusinessCategory = $this->businessCategoryRepo->find($businessCategory->id);

        $dbBusinessCategory = $dbBusinessCategory->toArray();
        $this->assertModelData($businessCategory->toArray(), $dbBusinessCategory);
    }

    /**
     * @test update
     */
    public function test_update_business_category()
    {
        $businessCategory = BusinessCategory::factory()->create();
        $fakeBusinessCategory = BusinessCategory::factory()->make()->toArray();

        $updatedBusinessCategory = $this->businessCategoryRepo->update($fakeBusinessCategory, $businessCategory->id);

        $this->assertModelData($fakeBusinessCategory, $updatedBusinessCategory->toArray());
        $dbBusinessCategory = $this->businessCategoryRepo->find($businessCategory->id);
        $this->assertModelData($fakeBusinessCategory, $dbBusinessCategory->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_business_category()
    {
        $businessCategory = BusinessCategory::factory()->create();

        $resp = $this->businessCategoryRepo->delete($businessCategory->id);

        $this->assertTrue($resp);
        $this->assertNull(BusinessCategory::find($businessCategory->id), 'BusinessCategory should not exist in DB');
    }
}
