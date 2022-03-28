<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterProductCategory;

class MasterProductCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterProductCategory()
    {
        $masterProductCategory = MasterProductCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_product_categories', $masterProductCategory
        );

        $this->assertApiResponse($masterProductCategory);
    }

    /**
     * @test
     */
    public function test_read_MasterProductCategory()
    {
        $masterProductCategory = MasterProductCategory::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_product_categories/'.$masterProductCategory->id
        );

        $this->assertApiResponse($masterProductCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterProductCategory()
    {
        $masterProductCategory = MasterProductCategory::factory()->create();
        $editedMasterProductCategory = MasterProductCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_product_categories/'.$masterProductCategory->id,
            $editedMasterProductCategory
        );

        $this->assertApiResponse($editedMasterProductCategory);
    }

    /**
     * @test
     */
    public function test_delete_MasterProductCategory()
    {
        $masterProductCategory = MasterProductCategory::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_product_categories/'.$masterProductCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_product_categories/'.$masterProductCategory->id
        );

        $this->response->assertStatus(404);
    }
}
