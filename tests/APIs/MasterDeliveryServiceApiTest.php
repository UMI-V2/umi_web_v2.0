<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterDeliveryService;

class MasterDeliveryServiceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterDeliveryService()
    {
        $masterDeliveryService = MasterDeliveryService::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_delivery_services', $masterDeliveryService
        );

        $this->assertApiResponse($masterDeliveryService);
    }

    /**
     * @test
     */
    public function test_read_MasterDeliveryService()
    {
        $masterDeliveryService = MasterDeliveryService::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_delivery_services/'.$masterDeliveryService->id
        );

        $this->assertApiResponse($masterDeliveryService->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterDeliveryService()
    {
        $masterDeliveryService = MasterDeliveryService::factory()->create();
        $editedMasterDeliveryService = MasterDeliveryService::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_delivery_services/'.$masterDeliveryService->id,
            $editedMasterDeliveryService
        );

        $this->assertApiResponse($editedMasterDeliveryService);
    }

    /**
     * @test
     */
    public function test_delete_MasterDeliveryService()
    {
        $masterDeliveryService = MasterDeliveryService::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_delivery_services/'.$masterDeliveryService->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_delivery_services/'.$masterDeliveryService->id
        );

        $this->response->assertStatus(404);
    }
}
