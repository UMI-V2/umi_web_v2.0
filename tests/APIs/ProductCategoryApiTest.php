<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ProductCategory;

class ProductCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_product_category()
    {
        $productCategory = ProductCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/product_categories', $productCategory
        );

        $this->assertApiResponse($productCategory);
    }

    /**
     * @test
     */
    public function test_read_product_category()
    {
        $productCategory = ProductCategory::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/product_categories/'.$productCategory->id
        );

        $this->assertApiResponse($productCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_product_category()
    {
        $productCategory = ProductCategory::factory()->create();
        $editedProductCategory = ProductCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/product_categories/'.$productCategory->id,
            $editedProductCategory
        );

        $this->assertApiResponse($editedProductCategory);
    }

    /**
     * @test
     */
    public function test_delete_product_category()
    {
        $productCategory = ProductCategory::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/product_categories/'.$productCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/product_categories/'.$productCategory->id
        );

        $this->response->assertStatus(404);
    }
}
