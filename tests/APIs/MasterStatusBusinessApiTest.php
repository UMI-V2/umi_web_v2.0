<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterStatusBusiness;

class MasterStatusBusinessApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterStatusBusiness()
    {
        $masterStatusBusiness = MasterStatusBusiness::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_status_businesses', $masterStatusBusiness
        );

        $this->assertApiResponse($masterStatusBusiness);
    }

    /**
     * @test
     */
    public function test_read_MasterStatusBusiness()
    {
        $masterStatusBusiness = MasterStatusBusiness::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_status_businesses/'.$masterStatusBusiness->id
        );

        $this->assertApiResponse($masterStatusBusiness->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterStatusBusiness()
    {
        $masterStatusBusiness = MasterStatusBusiness::factory()->create();
        $editedMasterStatusBusiness = MasterStatusBusiness::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_status_businesses/'.$masterStatusBusiness->id,
            $editedMasterStatusBusiness
        );

        $this->assertApiResponse($editedMasterStatusBusiness);
    }

    /**
     * @test
     */
    public function test_delete_MasterStatusBusiness()
    {
        $masterStatusBusiness = MasterStatusBusiness::factory()->create();

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
