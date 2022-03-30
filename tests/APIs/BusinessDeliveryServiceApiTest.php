<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BusinessDeliveryService;

class BusinessDeliveryServiceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_business_delivery_service()
    {
        $businessDeliveryService = BusinessDeliveryService::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/business_delivery_services', $businessDeliveryService
        );

        $this->assertApiResponse($businessDeliveryService);
    }

    /**
     * @test
     */
    public function test_read_business_delivery_service()
    {
        $businessDeliveryService = BusinessDeliveryService::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/business_delivery_services/'.$businessDeliveryService->id
        );

        $this->assertApiResponse($businessDeliveryService->toArray());
    }

    /**
     * @test
     */
    public function test_update_business_delivery_service()
    {
        $businessDeliveryService = BusinessDeliveryService::factory()->create();
        $editedBusinessDeliveryService = BusinessDeliveryService::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/business_delivery_services/'.$businessDeliveryService->id,
            $editedBusinessDeliveryService
        );

        $this->assertApiResponse($editedBusinessDeliveryService);
    }

    /**
     * @test
     */
    public function test_delete_business_delivery_service()
    {
        $businessDeliveryService = BusinessDeliveryService::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/business_delivery_services/'.$businessDeliveryService->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/business_delivery_services/'.$businessDeliveryService->id
        );

        $this->response->assertStatus(404);
    }
}
