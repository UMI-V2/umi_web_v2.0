<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_delivery_service;

class master_delivery_serviceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_delivery_service()
    {
        $masterDeliveryService = master_delivery_service::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_delivery_services', $masterDeliveryService
        );

        $this->assertApiResponse($masterDeliveryService);
    }

    /**
     * @test
     */
    public function test_read_master_delivery_service()
    {
        $masterDeliveryService = master_delivery_service::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_delivery_services/'.$masterDeliveryService->id
        );

        $this->assertApiResponse($masterDeliveryService->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_delivery_service()
    {
        $masterDeliveryService = master_delivery_service::factory()->create();
        $editedmaster_delivery_service = master_delivery_service::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_delivery_services/'.$masterDeliveryService->id,
            $editedmaster_delivery_service
        );

        $this->assertApiResponse($editedmaster_delivery_service);
    }

    /**
     * @test
     */
    public function test_delete_master_delivery_service()
    {
        $masterDeliveryService = master_delivery_service::factory()->create();

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
