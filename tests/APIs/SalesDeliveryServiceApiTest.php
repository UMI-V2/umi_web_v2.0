<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SalesDeliveryService;

class SalesDeliveryServiceApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sales_delivery_service()
    {
        $salesDeliveryService = SalesDeliveryService::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sales_delivery_services', $salesDeliveryService
        );

        $this->assertApiResponse($salesDeliveryService);
    }

    /**
     * @test
     */
    public function test_read_sales_delivery_service()
    {
        $salesDeliveryService = SalesDeliveryService::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/sales_delivery_services/'.$salesDeliveryService->id
        );

        $this->assertApiResponse($salesDeliveryService->toArray());
    }

    /**
     * @test
     */
    public function test_update_sales_delivery_service()
    {
        $salesDeliveryService = SalesDeliveryService::factory()->create();
        $editedSalesDeliveryService = SalesDeliveryService::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sales_delivery_services/'.$salesDeliveryService->id,
            $editedSalesDeliveryService
        );

        $this->assertApiResponse($editedSalesDeliveryService);
    }

    /**
     * @test
     */
    public function test_delete_sales_delivery_service()
    {
        $salesDeliveryService = SalesDeliveryService::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sales_delivery_services/'.$salesDeliveryService->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sales_delivery_services/'.$salesDeliveryService->id
        );

        $this->response->assertStatus(404);
    }
}
