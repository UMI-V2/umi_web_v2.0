<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\BusinessPaymentMethod;

class BusinessPaymentMethodApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_business_payment_method()
    {
        $businessPaymentMethod = BusinessPaymentMethod::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/business_payment_methods', $businessPaymentMethod
        );

        $this->assertApiResponse($businessPaymentMethod);
    }

    /**
     * @test
     */
    public function test_read_business_payment_method()
    {
        $businessPaymentMethod = BusinessPaymentMethod::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/business_payment_methods/'.$businessPaymentMethod->id
        );

        $this->assertApiResponse($businessPaymentMethod->toArray());
    }

    /**
     * @test
     */
    public function test_update_business_payment_method()
    {
        $businessPaymentMethod = BusinessPaymentMethod::factory()->create();
        $editedBusinessPaymentMethod = BusinessPaymentMethod::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/business_payment_methods/'.$businessPaymentMethod->id,
            $editedBusinessPaymentMethod
        );

        $this->assertApiResponse($editedBusinessPaymentMethod);
    }

    /**
     * @test
     */
    public function test_delete_business_payment_method()
    {
        $businessPaymentMethod = BusinessPaymentMethod::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/business_payment_methods/'.$businessPaymentMethod->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/business_payment_methods/'.$businessPaymentMethod->id
        );

        $this->response->assertStatus(404);
    }
}
