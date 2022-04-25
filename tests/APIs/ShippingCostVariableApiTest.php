<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\ShippingCostVariable;

class ShippingCostVariableApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_shipping_cost_variable()
    {
        $shippingCostVariable = ShippingCostVariable::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/shipping_cost_variables', $shippingCostVariable
        );

        $this->assertApiResponse($shippingCostVariable);
    }

    /**
     * @test
     */
    public function test_read_shipping_cost_variable()
    {
        $shippingCostVariable = ShippingCostVariable::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/shipping_cost_variables/'.$shippingCostVariable->id
        );

        $this->assertApiResponse($shippingCostVariable->toArray());
    }

    /**
     * @test
     */
    public function test_update_shipping_cost_variable()
    {
        $shippingCostVariable = ShippingCostVariable::factory()->create();
        $editedShippingCostVariable = ShippingCostVariable::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/shipping_cost_variables/'.$shippingCostVariable->id,
            $editedShippingCostVariable
        );

        $this->assertApiResponse($editedShippingCostVariable);
    }

    /**
     * @test
     */
    public function test_delete_shipping_cost_variable()
    {
        $shippingCostVariable = ShippingCostVariable::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/shipping_cost_variables/'.$shippingCostVariable->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/shipping_cost_variables/'.$shippingCostVariable->id
        );

        $this->response->assertStatus(404);
    }
}
