<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\TransactionStatus;

class TransactionStatusApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_transaction_status()
    {
        $transactionStatus = TransactionStatus::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/transaction_statuses', $transactionStatus
        );

        $this->assertApiResponse($transactionStatus);
    }

    /**
     * @test
     */
    public function test_read_transaction_status()
    {
        $transactionStatus = TransactionStatus::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/transaction_statuses/'.$transactionStatus->id
        );

        $this->assertApiResponse($transactionStatus->toArray());
    }

    /**
     * @test
     */
    public function test_update_transaction_status()
    {
        $transactionStatus = TransactionStatus::factory()->create();
        $editedTransactionStatus = TransactionStatus::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/transaction_statuses/'.$transactionStatus->id,
            $editedTransactionStatus
        );

        $this->assertApiResponse($editedTransactionStatus);
    }

    /**
     * @test
     */
    public function test_delete_transaction_status()
    {
        $transactionStatus = TransactionStatus::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/transaction_statuses/'.$transactionStatus->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/transaction_statuses/'.$transactionStatus->id
        );

        $this->response->assertStatus(404);
    }
}
