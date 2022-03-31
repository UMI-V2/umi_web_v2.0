<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\SalesTransaction;

class SalesTransactionApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sales_transaction()
    {
        $salesTransaction = SalesTransaction::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sales_transactions', $salesTransaction
        );

        $this->assertApiResponse($salesTransaction);
    }

    /**
     * @test
     */
    public function test_read_sales_transaction()
    {
        $salesTransaction = SalesTransaction::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/sales_transactions/'.$salesTransaction->id
        );

        $this->assertApiResponse($salesTransaction->toArray());
    }

    /**
     * @test
     */
    public function test_update_sales_transaction()
    {
        $salesTransaction = SalesTransaction::factory()->create();
        $editedSalesTransaction = SalesTransaction::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sales_transactions/'.$salesTransaction->id,
            $editedSalesTransaction
        );

        $this->assertApiResponse($editedSalesTransaction);
    }

    /**
     * @test
     */
    public function test_delete_sales_transaction()
    {
        $salesTransaction = SalesTransaction::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sales_transactions/'.$salesTransaction->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sales_transactions/'.$salesTransaction->id
        );

        $this->response->assertStatus(404);
    }
}
