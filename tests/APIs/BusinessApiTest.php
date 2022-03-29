<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Business;

class BusinessApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_business()
    {
        $business = Business::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/businesses', $business
        );

        $this->assertApiResponse($business);
    }

    /**
     * @test
     */
    public function test_read_business()
    {
        $business = Business::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/businesses/'.$business->id
        );

        $this->assertApiResponse($business->toArray());
    }

    /**
     * @test
     */
    public function test_update_business()
    {
        $business = Business::factory()->create();
        $editedBusiness = Business::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/businesses/'.$business->id,
            $editedBusiness
        );

        $this->assertApiResponse($editedBusiness);
    }

    /**
     * @test
     */
    public function test_delete_business()
    {
        $business = Business::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/businesses/'.$business->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/businesses/'.$business->id
        );

        $this->response->assertStatus(404);
    }
}
