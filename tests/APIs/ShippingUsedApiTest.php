<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ShippingUsed;

class ShippingUsedApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shipping_used()
    {
        $shippingUsed = ShippingUsed::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shipping_useds', $shippingUsed
        );

        $this->assertApiResponse($shippingUsed);
    }

    /**
     * @test
     */
    public function test_read_shipping_used()
    {
        $shippingUsed = ShippingUsed::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shipping_useds/'.$shippingUsed->id
        );

        $this->assertApiResponse($shippingUsed->toArray());
    }

    /**
     * @test
     */
    public function test_update_shipping_used()
    {
        $shippingUsed = ShippingUsed::factory()->create();
        $editedShippingUsed = ShippingUsed::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shipping_useds/'.$shippingUsed->id,
            $editedShippingUsed
        );

        $this->assertApiResponse($editedShippingUsed);
    }

    /**
     * @test
     */
    public function test_delete_shipping_used()
    {
        $shippingUsed = ShippingUsed::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shipping_useds/'.$shippingUsed->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shipping_useds/'.$shippingUsed->id
        );

        $this->response->assertStatus(404);
    }
}
