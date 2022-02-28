<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\master_transaction_category;

class master_transaction_categoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_master_transaction_category()
    {
        $masterTransactionCategory = master_transaction_category::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_transaction_categories', $masterTransactionCategory
        );

        $this->assertApiResponse($masterTransactionCategory);
    }

    /**
     * @test
     */
    public function test_read_master_transaction_category()
    {
        $masterTransactionCategory = master_transaction_category::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_transaction_categories/'.$masterTransactionCategory->id
        );

        $this->assertApiResponse($masterTransactionCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_master_transaction_category()
    {
        $masterTransactionCategory = master_transaction_category::factory()->create();
        $editedmaster_transaction_category = master_transaction_category::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_transaction_categories/'.$masterTransactionCategory->id,
            $editedmaster_transaction_category
        );

        $this->assertApiResponse($editedmaster_transaction_category);
    }

    /**
     * @test
     */
    public function test_delete_master_transaction_category()
    {
        $masterTransactionCategory = master_transaction_category::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/master_transaction_categories/'.$masterTransactionCategory->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/master_transaction_categories/'.$masterTransactionCategory->id
        );

        $this->response->assertStatus(404);
    }
}
