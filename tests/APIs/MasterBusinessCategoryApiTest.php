<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterBusinessCategory;

class MasterBusinessCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterBusinessCategory()
    {
        $masterBusinessCategory = MasterBusinessCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_business_categories', $masterBusinessCategory
        );

        $this->assertApiResponse($masterBusinessCategory);
    }

    /**
     * @test
     */
    public function test_read_MasterBusinessCategory()
    {
        $masterBusinessCategory = MasterBusinessCategory::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_business_categories/'.$masterBusinessCategory->id
        );

        $this->assertApiResponse($masterBusinessCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterBusinessCategory()
    {
        $masterBusinessCategory = MasterBusinessCategory::factory()->create();
        $editedMasterBusinessCategory = MasterBusinessCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_business_categories/'.$masterBusinessCategory->id,
            $editedMasterBusinessCategory
        );

        $this->assertApiResponse($editedMasterBusinessCategory);
    }

    /**
     * @test
     */
    public function test_delete_MasterBusinessCategory()
    {
        $masterBusinessCategory = MasterBusinessCategory::factory()->create();

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
