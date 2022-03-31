<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TransactionProduct;

class TransactionProductApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_transaction_product()
    {
        $transactionProduct = TransactionProduct::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/transaction_products', $transactionProduct
        );

        $this->assertApiResponse($transactionProduct);
    }

    /**
     * @test
     */
    public function test_read_transaction_product()
    {
        $transactionProduct = TransactionProduct::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/transaction_products/'.$transactionProduct->id
        );

        $this->assertApiResponse($transactionProduct->toArray());
    }

    /**
     * @test
     */
    public function test_update_transaction_product()
    {
        $transactionProduct = TransactionProduct::factory()->create();
        $editedTransactionProduct = TransactionProduct::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/transaction_products/'.$transactionProduct->id,
            $editedTransactionProduct
        );

        $this->assertApiResponse($editedTransactionProduct);
    }

    /**
     * @test
     */
    public function test_delete_transaction_product()
    {
        $transactionProduct = TransactionProduct::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/transaction_products/'.$transactionProduct->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/transaction_products/'.$transactionProduct->id
        );

        $this->response->assertStatus(404);
    }
}
