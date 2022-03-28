<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterPaymentMethod;

class MasterPaymentMethodApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterPaymentMethod()
    {
        $masterPaymentMethod = MasterPaymentMethod::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_payment_methods', $masterPaymentMethod
        );

        $this->assertApiResponse($masterPaymentMethod);
    }

    /**
     * @test
     */
    public function test_read_MasterPaymentMethod()
    {
        $masterPaymentMethod = MasterPaymentMethod::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_payment_methods/'.$masterPaymentMethod->id
        );

        $this->assertApiResponse($masterPaymentMethod->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterPaymentMethod()
    {
        $masterPaymentMethod = MasterPaymentMethod::factory()->create();
        $editedMasterPaymentMethod = MasterPaymentMethod::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_payment_methods/'.$masterPaymentMethod->id,
            $editedMasterPaymentMethod
        );

        $this->assertApiResponse($editedMasterPaymentMethod);
    }

    /**
     * @test
     */
    public function test_delete_MasterPaymentMethod()
    {
        $masterPaymentMethod = MasterPaymentMethod::factory()->create();

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
