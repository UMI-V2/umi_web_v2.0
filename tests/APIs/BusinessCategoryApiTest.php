<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BusinessCategory;

class BusinessCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_business_category()
    {
        $businessCategory = BusinessCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/business_categories', $businessCategory
        );

        $this->assertApiResponse($businessCategory);
    }

    /**
     * @test
     */
    public function test_read_business_category()
    {
        $businessCategory = BusinessCategory::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/business_categories/'.$businessCategory->id
        );

        $this->assertApiResponse($businessCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_business_category()
    {
        $businessCategory = BusinessCategory::factory()->create();
        $editedBusinessCategory = BusinessCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/business_categories/'.$businessCategory->id,
            $editedBusinessCategory
        );

        $this->assertApiResponse($editedBusinessCategory);
    }

    /**
     * @test
     */
    public function test_delete_business_category()
    {
        $businessCategory = BusinessCategory::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/business_categories/'.$businessCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/business_categories/'.$businessCategory->id
        );

        $this->response->assertStatus(404);
    }
}
