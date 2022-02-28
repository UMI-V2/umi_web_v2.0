<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_payment_method;

class master_payment_methodApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_payment_method()
    {
        $masterPaymentMethod = master_payment_method::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_payment_methods', $masterPaymentMethod
        );

        $this->assertApiResponse($masterPaymentMethod);
    }

    /**
     * @test
     */
    public function test_read_master_payment_method()
    {
        $masterPaymentMethod = master_payment_method::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_payment_methods/'.$masterPaymentMethod->id
        );

        $this->assertApiResponse($masterPaymentMethod->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_payment_method()
    {
        $masterPaymentMethod = master_payment_method::factory()->create();
        $editedmaster_payment_method = master_payment_method::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_payment_methods/'.$masterPaymentMethod->id,
            $editedmaster_payment_method
        );

        $this->assertApiResponse($editedmaster_payment_method);
    }

    /**
     * @test
     */
    public function test_delete_master_payment_method()
    {
        $masterPaymentMethod = master_payment_method::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_payment_methods/'.$masterPaymentMethod->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_payment_methods/'.$masterPaymentMethod->id
        );

        $this->response->assertStatus(404);
    }
}
