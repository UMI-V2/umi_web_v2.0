<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_business_category;

class master_business_categoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_business_category()
    {
        $masterBusinessCategory = master_business_category::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_business_categories', $masterBusinessCategory
        );

        $this->assertApiResponse($masterBusinessCategory);
    }

    /**
     * @test
     */
    public function test_read_master_business_category()
    {
        $masterBusinessCategory = master_business_category::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_business_categories/'.$masterBusinessCategory->id
        );

        $this->assertApiResponse($masterBusinessCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_business_category()
    {
        $masterBusinessCategory = master_business_category::factory()->create();
        $editedmaster_business_category = master_business_category::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_business_categories/'.$masterBusinessCategory->id,
            $editedmaster_business_category
        );

        $this->assertApiResponse($editedmaster_business_category);
    }

    /**
     * @test
     */
    public function test_delete_master_business_category()
    {
        $masterBusinessCategory = master_business_category::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_business_categories/'.$masterBusinessCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_business_categories/'.$masterBusinessCategory->id
        );

        $this->response->assertStatus(404);
    }
}
