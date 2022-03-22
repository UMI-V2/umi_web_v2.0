<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\MasterTransactionCategory;

class MasterTransactionCategoryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_MasterTransactionCategory()
    {
        $masterTransactionCategory = MasterTransactionCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/master_transaction_categories', $masterTransactionCategory
        );

        $this->assertApiResponse($masterTransactionCategory);
    }

    /**
     * @test
     */
    public function test_read_MasterTransactionCategory()
    {
        $masterTransactionCategory = MasterTransactionCategory::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/master_transaction_categories/'.$masterTransactionCategory->id
        );

        $this->assertApiResponse($masterTransactionCategory->toArray());
    }

    /**
     * @test
     */
    public function test_update_MasterTransactionCategory()
    {
        $masterTransactionCategory = MasterTransactionCategory::factory()->create();
        $editedMasterTransactionCategory = MasterTransactionCategory::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/master_transaction_categories/'.$masterTransactionCategory->id,
            $editedMasterTransactionCategory
        );

        $this->assertApiResponse($editedMasterTransactionCategory);
    }

    /**
     * @test
     */
    public function test_delete_MasterTransactionCategory()
    {
        $masterTransactionCategory = MasterTransactionCategory::factory()->create();

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
