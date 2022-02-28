<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_status_business;

class master_status_businessApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_status_business()
    {
        $masterStatusBusiness = master_status_business::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_status_businesses', $masterStatusBusiness
        );

        $this->assertApiResponse($masterStatusBusiness);
    }

    /**
     * @test
     */
    public function test_read_master_status_business()
    {
        $masterStatusBusiness = master_status_business::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_status_businesses/'.$masterStatusBusiness->id
        );

        $this->assertApiResponse($masterStatusBusiness->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_status_business()
    {
        $masterStatusBusiness = master_status_business::factory()->create();
        $editedmaster_status_business = master_status_business::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_status_businesses/'.$masterStatusBusiness->id,
            $editedmaster_status_business
        );

        $this->assertApiResponse($editedmaster_status_business);
    }

    /**
     * @test
     */
    public function test_delete_master_status_business()
    {
        $masterStatusBusiness = master_status_business::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_status_businesses/'.$masterStatusBusiness->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_status_businesses/'.$masterStatusBusiness->id
        );

        $this->response->assertStatus(404);
    }
}
