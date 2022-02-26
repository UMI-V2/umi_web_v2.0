<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_product_category;

class master_product_categoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_product_category()
    {
        $masterProductCategory = master_product_category::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_product_categories', $masterProductCategory
        );

        $this->assertApiResponse($masterProductCategory);
    }

    /**
     * @test
     */
    public function test_read_master_product_category()
    {
        $masterProductCategory = master_product_category::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_product_categories/'.$masterProductCategory->id
        );

        $this->assertApiResponse($masterProductCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_product_category()
    {
        $masterProductCategory = master_product_category::factory()->create();
        $editedmaster_product_category = master_product_category::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_product_categories/'.$masterProductCategory->id,
            $editedmaster_product_category
        );

        $this->assertApiResponse($editedmaster_product_category);
    }

    /**
     * @test
     */
    public function test_delete_master_product_category()
    {
        $masterProductCategory = master_product_category::factory()->create();

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
